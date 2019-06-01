<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {

        $roles = Role::all();
        


        return view('admin.index', compact('roles'));
    }
}
