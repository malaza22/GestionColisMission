<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Mouvement;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $mouvements = Mouvement::count('date_receive');
        // $mouvement = Mouvement::all()->where(['agenciesexpe_id'=>Auth()->user()->agencies_id]);
        // return view('home')->with(['mouvement'=>$mouvement,'mouvements'=>$mouvements]);
        return view('home');
    }
    public function show(){
        $number = 1;
        return view('auth.edite')->with('number',$number);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->update($request->all());
        return back()->with('success', 'user update successfully !');
        // dd($request->all());
    }

}
