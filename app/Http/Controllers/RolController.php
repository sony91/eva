<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Http\Requests\RolCreateRequest;
use Cinema\Role;
use Redirect;
use Session;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::All();
        return view ('rol.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolCreateRequest $request)
    {
      Role::create([
        'nameRol' => $request['nameRol'],
      ]);

      Session::flash('message','Rol creado Correctamente');

      return redirect('/rol');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol=Role::find($id);
        return view('rol.edit',['rol'=>$rol]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolCreateRequest $request, $id)
    {
      $rol = Role::find($id);
      $rol->fill($request->all());
      $rol->save();
      Session::flash('message','Rol actualizado Correctamente');
      return Redirect::to('/rol');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Role::destroy($id);
      Session::flash('message','Rol eliminado correctamente');
      return Redirect::to('/rol');
    }
}
