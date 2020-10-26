<?php

namespace App\DataTables;

use App\Product;
use Yajra\DataTables\Services\DataTable;

class ProductsDatatables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('checkbox', 'admin.products.btn.checkbox')
            ->addColumn('edit', 'admin.products.btn.edit')
            ->addColumn('delete', 'admin.products.btn.delete')

            ->rawColumns([
                'edit','delete','checkbox',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return Product::query()->with('department_id')->with('currency_id')->with('trademark_id')
            ->with('manufact_id')->with('color_id')->with('size_id')->with('weight_id')
            ->select('products.*');

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            //  ->addAction(['width' => '80px'])
            // ->parameters($this->getBuilderParameters());
            ->parameters([
                'dom'=>'Blfrtip',
                'lengthMenu'=>[[10,25,50,100,-1],[10,25,50,100,'All Admins']],
                'buttons'=>[
                    ['extend'=>'print','className'=>'btn btn-primary','text'=>'<i class="fa fa-print"></i>'],
                    ['extend'=>'csv','className'=>'btn btn-info','text'=>'<i class="fa fa-file"></i> Export CSV'],
                    ['extend'=>'excel','className'=>'btn btn-success','text'=>'<i class="fa fa-file"></i> Export Excel'],
                    ['extend'=>'reload','className'=>'btn btn-defaults','text'=>'<i class="fa fa-refresh"></i>'],
                    ['text'=>'<i class="fa fa-plus"></i> create Product','className'=>'btn btn-success', "action"=>
                        "
                        function(){ window.location.href= '".\URL::current()."/create';   }
                   "],
                    ['text'=>'<i class="fa fa-trash"></i> Delete All','className'=>'btn btn-danger delBtn' ],
                ],
                'initComplete'=>'function(){
                   this.api().columns([]).every(function(){
                   var column=this;
                   var input =document.createElement("input");
                   $(input).appendTo($(column.footer()).empty()).on("keyup",function(){
                   column.search($(this).val(),false,false,true).draw();
                   });
                   });}
                   ',
            ]);
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
                'name'=>'checkbox',
                'data'=>'checkbox',
                'title'=>'<input type ="checkbox" class="selectAll" onclick="selectAll()">',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,
            ],
            [
                'name'=>'id',
                'data'=>'id',
                'title'=>'ID'
            ],[
                'name'=>'title',
                'data'=>'title',
                'title'=>'Title'
            ],[
                'name'=>'content',
                'data'=>'content',
                'title'=>'Content'
            ],[
                'name'=>'weight',
                'data'=>'weight',
                'title'=>'Weight'
            ],[
                'name'=>'stock',
                'data'=>'stock',
                'title'=>'Stock'
            ],[
                'name'=>'price',
                'data'=>'price',
                'title'=>'Price'
            ],[
                'name'=>'price_offer',
                'data'=>'price_offer',
                'title'=>'Price Offer'
            ],[
                'name'=>'status',
                'data'=>'status',
                'title'=>'Status'
            ],[
                'name'=>'reason',
                'data'=>'reason',
                'title'=>'Reason'
            ],[
                'name'=>'start_at',
                'data'=>'start_at',
                'title'=>'Start At'
            ],[
                'name'=>'end_at',
                'data'=>'end_at',
                'title'=>'End At'
            ],[
                'name'=>'edit',
                'data'=>'edit',
                'title'=>'Edit',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,

            ],[
                'name'=>'delete',
                'data'=>'delete',
                'title'=>'Delete',
                'exportable'=>false,
                'printable'=>false,
                'orderable'=>false,
                'searchable'=>false,

            ]

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'products' . date('YmdHis');
    }
}
