<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
    }

    public function dashboardPage (Request $request)
    {
        $user = $request->user();
        if ($user->hasRole('Admin'))
        {
            return redirect ('/admin');
        }
        else if ($user->hasRole('Pembeli'))
        {
            return redirect ('/');
        }
    }
}
