<?php

namespace App\Http\Controllers;

use App\Notify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return Notify::where("email", $request->email)->get();   
    
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
    public function store(Request $request, Notify $notify)
    {
        $notify->symbol  = $request->symbol;
        $notify->preico  = $request->preico;
        $notify->email   = Auth::user()->email;
        $notify->user_id = Auth::id();
        $notify->source  = $request->source;
        $notify->email   = $request->email;
        $notify->notes   = $request->notes;
        $notify->notify  = true;
        $notify->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
        return Notify::where("email", $request->email)->get();
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $notify = Notify::for($request->email, $request->symbol)->pluck('notify')->first();
        $notify = (!$notify) ? 1 : 0;
        Notify::for($request->email, $request->symbol)->update(['notify' => $notify]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        Notify::for($request->email, $request->symbol)->delete();

    }

}
