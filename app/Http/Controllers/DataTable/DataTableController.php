<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Support\Facades\Schema;

abstract class DataTableController extends Controller
{
    protected $builder;

    abstract public function builder();

    public function __construct()
    {
        $builder = $this->builder();

        if (!$builder instanceof Builder) {
            throw new Exception('Instance of Illuminate\Database\Eloquent\Builder required');
        }

        $this->builder = $builder;
    }

    public function index()
    {
        return response()->json([
            'data' => [
                'displayable' => $this->getDisplayableColumns(),
                'records' => $this->getRecords(),
            ]
        ]);
    }

    public function getDisplayableColumns()
    {
        return Schema::getColumnListing($this->builder->getModel()->getTable());
    }

    protected function getRecords()
    {
        return $this->builder->get();
    }

}
