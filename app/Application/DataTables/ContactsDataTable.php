<?php

namespace App\Application\DataTables;

use App\Application\Model\Contact;
use Yajra\Datatables\Services\DataTable;

class ContactsDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
             ->eloquent($this->query())
             ->addColumn('edit', 'admin.contact.buttons.edit')
             ->addColumn('delete', 'admin.contact.buttons.delete')
             ->addColumn('view', 'admin.contact.buttons.view')
            ->addColumn('user_id', 'admin.contact.buttons.langcol')
             ->make(true);
    }
    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query2 = Contact::query();
        return $this->applyScopes($query2);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters(dataTableConfig());
    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
              [
                  'name' => "id",
                  'data' => 'id',
                  'title' => adminTrans('curd' , 'id'),
             ],
             [
                'name' => "name",
                'data' => 'name',
                'title' => adminTrans('contact' , 'name'),
             ],
            [
                'name' => "email",
                'data' => 'email',
                'title' => adminTrans('contact' , 'email'),
            ],
            [
                'name' => "subject",
                'data' => 'subject',
                'title' => adminTrans('contact' , 'subject'),
            ],
            [
                'name' => "user_id",
                'data' => 'user_id',
                'title' => adminTrans('contact' , 'user_id'),
            ],
             [
                  'name' => 'view',
                  'data' => 'view',
                  'title' => adminTrans('curd' , 'view'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
             [
                  'name' => 'edit',
                  'data' => 'edit',
                  'title' =>  adminTrans('curd' , 'edit'),
                  'exportable' => false,
                  'printable' => false,
                  'searchable' => false,
                  'orderable' => false,
             ],
             [
                   'name' => 'delete',
                   'data' => 'delete',
                   'title' => adminTrans('curd' , 'delete'),
                   'exportable' => false,
                   'printable' => false,
                   'searchable' => false,
                   'orderable' => false,
             ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Contactdatatables_' . time();
    }
}