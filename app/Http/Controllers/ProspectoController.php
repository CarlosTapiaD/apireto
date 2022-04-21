<?php

namespace App\Http\Controllers;

use App\Models\Prospecto;
use Illuminate\Http\Request;

class ProspectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospecto=Prospecto::all();
        return $prospecto;
        //
    }
    public function buscar(Request $request)
    {
        $prospecto=Prospecto::where('name',"=","{$request->name}")->get();
        
        return $prospecto;
        //
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
     * @param  \App\Http\Requests\StoreProspectoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       try {
        $prospecto =new Prospecto();
        $prospecto->name=$request->name;
        $prospecto->linkedin=$request->linkedin;
        $prospecto->puesto=$request->puesto;
        $prospecto->numero=$request->numero;
        $prospecto->email=$request->email;
        $prospecto->save();
       } catch (\Throwable $th) {
           return $th;
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prospecto  $prospecto
     * @return \Illuminate\Http\Response
     */
    public function show( )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prospecto  $prospecto
     * @return \Illuminate\Http\Response
     */
    public function edit( )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProspectoRequest  $request
     * @param  \App\Models\Prospecto  $prospecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $prospecto=Prospecto::where('name',"=","{$request->name}")->firstOrFail()-get();
        $prospecto=Prospecto::findOrFail($request->id);
        $prospecto->name=$request->name;
        $prospecto->linkedin=$request->linkedin;
        $prospecto->puesto=$request->puesto;
        $prospecto->numero=$request->numero;
        $prospecto->email=$request->email;
        $prospecto->save();
        // return $prospecto;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prospecto  $prospecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request )
    {
        $prospecto=Prospecto::destroy($request->id);
    }
}
