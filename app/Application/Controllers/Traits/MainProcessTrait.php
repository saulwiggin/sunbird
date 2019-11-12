<?php

namespace  App\Application\Controllers\Traits;

use Illuminate\Http\Request;
use Alert;

trait MainProcessTrait {

    public function GetAll($view , $with = [] , $paginate = 30){
        $items = $this->model->with($with)->paginate($paginate);
        return view($view , compact('items'));
    }
    public function createOrEdit($view , $id = null , $data = ['']){
        if($id == null){
            $this->createLog('Visit Create Page' , 'Success');
            return view($view , compact('data'));
        }
        $this->createLog('Visit Edit Page' , 'Success' , json_encode(['Edit Id' => [$id]]));
        $item = $this->model->where('id' , $id)->first();
        return view($view , compact('item' , 'data'));
    }
    public function storeOrUpdate(Request $request , $id = null , $callback = true){
        try{
            $field = checkIfFiledFile($request->all());
            if(count($field) > 0 && $field !== false){
                foreach($field as $key => $f){
                    $data = $this->uploadFile($request , $f);
                }
                if(!$data){
                    $data = $request->all();
                }
            }else{
                $data = $request->all();
            }
            if($id == null){
                return $this->storeItem($data , $callback);
            }
            $item =  $this->model->where('id' , $id)->first();
            return $this->updateItem($data , $item , $callback , $id);
        }catch(\Exception $e){
            return $this->catchExceptions($e);
        }
    }
    public function storeItem($array  , $callback){
        $encodeArray = transformArray($array);
        $new = $this->model->create($encodeArray);
        if($this->model->getTable() != 'logs') {
            $dataLog = [
                'New id' => [$new->id]
            ];
            $this->createLog('Create', 'Success', json_encode($dataLog));
        }
        $this->saveRolePermission($array , $new);
        $this->doneMessage(adminTrans('messages' , 'storeMessageSuccess') , adminTrans('messages', 'success'));
        if($callback !== true){
            return redirect($callback);
        }
        return $new;
    }
    public function updateItem($array , $item , $callback , $id){
        $encodeArray = transformArray($array);
        $update = $item->update($encodeArray);
        if($this->model->getTable() != 'logs') {
            $this->createLog('Update', 'Success', json_encode(['Updated id' => [$id]]));
        }
        $this->saveRolePermission($array , null , $id);
        if($update){
            $this->doneMessage(adminTrans('messages' , 'updateMessageSuccess') , adminTrans('messages', 'success'));
            if($callback !== true){
                return redirect($callback);
            }
            return redirect()->back();
        }
        $this->errorMessage(adminTrans('messages' , 'updateMessageError') , adminTrans('messages', 'error'));
        return redirect(404);
    }
    public function deleteItem($id , $callBack = null){
        try{
            $item = $this->model->find($id);
            $item = $item ? $item : null;
            if($item == null){
                if($this->model->getTable() != 'logs') {
                    $this->createLog('Delete', 'Error', json_encode(['Updated id' => [$id]]));
                }
                return redirect(404);
            }
            if($item->delete()){
                $this->doneMessage(adminTrans('messages' , 'deleteMessageSuccess') , adminTrans('messages', 'success'));
                if($this->model->getTable() != 'logs'){
                    $this->createLog('Delete' , 'Success' , json_encode(['Updated id' => [$id]]));
                }
                if($callBack != null){
                    return redirect($callBack);
                }
                return redirect()->back();
            }
            $this->errorMessage(adminTrans('messages' , 'deleteMessageError') , adminTrans('messages', 'error'));
            return redirect('404');
        }catch(\Exception $e){
            return $this->catchExceptions($e);
        }
    }
}