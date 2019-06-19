<?php

namespace App\Http\Controllers;

use App\Pledge;
use Session;
use Illuminate\Http\Request;

class PledgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pledges = Pledge::orderBy('created_at','desc')->get();
        return view('welcome')->withPledges($pledges);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'      => 'required|max:255',
            'email'	    => 'max:255',
            'savings'   => 'required|max:255',
            'date'      => 'required|max:255'
        ));

        $pledge = new Pledge;
        $pledge->name       = $request->name;
        $pledge->email      = $request->email;
        $pledge->savings    = $request->savings;
        $pledge->date       = $request->date;
        $pledge->save();
        
        Session::flash('success', 'Your pledge was saved, welcome to a healthier and richer you!');
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pledge  $pledge
     * @return \Illuminate\Http\Response
     */
    public function show(Pledge $pledge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pledge  $pledge
     * @return \Illuminate\Http\Response
     */
    public function edit(Pledge $pledge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pledge  $pledge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pledge $pledge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pledge  $pledge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pledge $pledge)
    {
        //
    }
}
