<?php

namespace App\Http\Controllers;

use App\Keep;
use App\Http\Requests;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keeps = Keep::orderBy('id', 'DESC')
                ->where('user_id', $request->user()->id)
                ->get();
        return view('home', compact('keeps'));
    }
}
