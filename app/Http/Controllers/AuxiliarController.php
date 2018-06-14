<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Auxi;
use Session;
use Redirect;
use Cinema\Http\Requests\AuxiCreateRequest;
use Cinema\Http\Requests\AuxiUpdateRequest;

class AuxiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $aux= Auxi::paginate(2);
     //  return $users;
     // $users = User::all();
     return view('auxiliar.index',compact('aux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auxiliar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuxiCreateRequest $request)
    {
      Auxi::create([
          'name' => $request['name'],
          'email' => $request['email'],
          'password' => $request['password'],
          'surname' => $request['surname'],
          'phone' => $request['phone'],

      ]);
      Session::flash('message','Usuario creado Correctamente');
      return redirect('/auxiliar');
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
      $aux = Auxi::find($id);
      return view('auxiliar.edit',['aux'=>$aux]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuxiUpdateRequest $request, $id)
    {
      $aux = Auxi::find($id);
      $aux->fill($request->all());
      $aux->save();
      Session::flash('message','Auxiliar actualizado Correctamente');
      return Redirect::to('/auxiliar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Auxi::destroy($id);
      Session::flash('message','Auxiliar eliminado Correctamente');
      return Redirect::to('/auxiliar');
    }
}
