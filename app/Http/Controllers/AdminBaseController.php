<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AdminBaseController extends Controller
{
    public function __construct()
    {

        // $permission = Permission::get();
        // foreach($permission as $per)
        // {
        //     echo "<pre>";
        //     print_r($per->name);    
        // }
        // die;
        // $this->middleware('permission:pages-list|pages-create|pages-edit|pages-delete', ['only' => ['index','store']]);
        // $this->middleware('permission:pages-create', ['only' => ['create','store']]);
        // $this->middleware('permission:pages-edit', ['only' => ['edit','update']]);
        // $this->middleware('permission:pages-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:pages-show', ['only' => ['show']]);
    }
}
