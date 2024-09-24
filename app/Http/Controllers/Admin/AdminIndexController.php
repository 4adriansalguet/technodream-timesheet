<?php

namespace App\Http\Controllers\Admin;

use App\Events\AuthenticationEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_admin']);
    }

    public function index(){
        return view('admin.index');
    }
}
