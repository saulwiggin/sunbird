@extends(layoutExtend())

@section('title')
    {{ adminTrans('setting' , 'setting') }}    {{ adminTrans('curd' , 'view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('setting' , 'setting')  , 'model' => 'setting' , 'action' => adminTrans('curd' , 'view') ])

        <table class="table table-bordered table-responsive table-striped">
            @php
                $fields = rename_keys(
                     removeFromArray($data['fields'] , ['id' , 'created_at' , 'updated_at']) ,
                     [
                        adminTrans('setting' , 'name'),
                        adminTrans('setting' , 'type'),
                        adminTrans('setting' , 'body'),
                     ]);
            @endphp
                 @foreach($fields as $key =>  $field)
                        <tr>
                            <th>{{ $key }}</th>
                            @php $type =  getFileType($field , $item[$field]) @endphp
                            @if($type == 'File')
                                <td> <a href="{{ url(env('UPLOAD_PATH').'/'.$item[$field]) }}">{{ $item[$field] }}</a></td>
                            @elseif($type == 'Image')
                                <td> <img src="{{ url(env('UPLOAD_PATH').'/'.$item[$field]) }}" /></td>
                            @else
                                 <td>{!!  nl2br($item[$field])  !!}</td>
                            @endif
                        </tr>
                    @endforeach
        </table>

        @include('admin.setting.buttons.delete' , ['id' => $item->id])
        @include('admin.setting.buttons.edit' , ['id' => $item->id])

    @endcomponent
@endsection
