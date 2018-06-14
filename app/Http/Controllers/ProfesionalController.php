<?php

namespace Cinema\Http\Controllers;

use Cinema\AreaProfesional;
use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\ProfCreateRequest;
use Cinema\Http\Requests\ProfUpdateRequest;
use Cinema\Http\Controllers\Controller;
use Cinema\Profesional;
use Cinema\Area;
use Cinema\Carrera;
use Session;
use Redirect;
use DB;
use Illuminate\Routing\Route;

class ProfesionalController extends Controller
{
    public function __construct(){
        //  $this->middleware('auth');
        //  $this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function find(Route $route){
        $this->profesional = Profesional::find($route->getParameter('profesional'));
    }

     public function index()
     {
        $profesionals=Profesional::paginate($this->PAGE_SIZE);

        return view('profesional.index',compact('profesionals'));
     }
    
    public function create()
    {
        $areas=Area::getAreas();
        $carreras=Carrera::lists('namecarre','id');
        return view('profesional.create', compact('areas','carreras'));

    }

    public function store(ProfCreateRequest $request){
        DB::transaction(function () use ($request) {
            $profesional = Profesional::create($request->all());
            foreach ($request->get("nameare_id") as $area) {
                AreaProfesional::create(['area_id'=> $area, 'profesional_id'=> $profesional->id]);
            }
        });
        return redirect('/profesional')->with('message','Creado exitosamente');
    }

    
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $areas=Area::all();
        $carreras = Carrera::lists('namecarre','id');
        return view('profesional.edit',['profesional'=>$this->profesional,'areas'=>$areas,'carreras'=>$carreras]);
    }

    
     public function update(ProfUpdateRequest $request, $id)
     {
        $this->profesional->fill($request->all());
        $this->profesional->save();
        Session::flash('message','Profesional Actualizado Correctamente');
        return Redirect::to('/profesional');
     }

    
     public function destroy($id)
     {
        Profesional::destroy($id);
        Session::flash('message','Profesional Eliminado Correctamente');
        return Redirect::to('/usuario');
     }
}
