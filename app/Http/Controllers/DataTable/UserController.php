<?php

namespace App\Http\Controllers\DataTable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends DataTableController
{
    public function builder()
    {
        return User::query();
    }
}
