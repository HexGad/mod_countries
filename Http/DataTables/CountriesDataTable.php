<?php

namespace HexGad\Countries\Http\DataTables;

use HexGad\Countries\Models\Country;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CountriesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->rawColumns(['iso', 'has_access'])
            ->editColumn('iso', fn(Country $country) => '<code>'.$country->iso.'</code>')
            ->editColumn('has_access', fn(Country $country) => '<i class="fa fa-'.($country->has_access ? 'check text-success':'times text-danger').'"></i>');
    }

    /**
     * Get query source of dataTable.
     *
     * @param Countries $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Country $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('countries-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->className('text-start text-muted fw-bold fs-7 text-uppercase gs-0 fw-bolder'),
            Column::make('name')->className('text-start text-muted fw-bold fs-7 text-uppercase gs-0 fw-bolder'),
            Column::make('iso')->className('text-start text-muted fw-bold fs-7 text-uppercase gs-0 fw-bolder'),
            Column::make('has_access')->className('text-start text-muted fw-bold fs-7 text-uppercase gs-0 fw-bolder'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Countries_' . date('YmdHis');
    }
}
