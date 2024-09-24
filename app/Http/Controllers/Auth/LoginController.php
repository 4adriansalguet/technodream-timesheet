<?php

namespace App\Http\Controllers\Auth;

use App\Events\AuthenticationEvent;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated()
    {
        if(Auth::user()->role == 'Admin' || Auth::user()->role == 'HR'){
            event(new AuthenticationEvent(Auth::user()->name . 'is now loged in.'));
            return redirect('/admin');
        }elseif(Auth::user()->role == 'Employee'){
            event(new AuthenticationEvent(Auth::user()->name . 'is now loged in.'));
            return redirect('/dashboard');
        }
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
