<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

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
    }

    public function index()
    {
        //
    }

}
