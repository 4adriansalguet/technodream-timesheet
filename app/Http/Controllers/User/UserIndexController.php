<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'is_user']);
    }

    public function index(){
        return view('user.index');
    }
}
