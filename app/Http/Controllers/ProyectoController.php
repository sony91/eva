<?php

namespace Cinema\Http\Controllers;

use Cinema\Gestion;
use Cinema\Profesional;
use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Requests\ProyCreateRequest;
use Cinema\Http\Requests\ProyUpdateRequest;
use Cinema\Http\Controllers\Controller;
use Cinema\Proyecto;
use Cinema\Modalidad;
use Cinema\Carrera;
use Cinema\Area;
use Session;
use Redirect;
use Illuminate\Routing\Route;
use Carbon\Carbon;
use PDF;
use Dompdf\Dompdf;

class ProyectoController extends Controller
{   
    public function __construct(){
        //  $this->middleware('auth');
        //  $this->middleware('admin');
        $this->beforeFilter('@find',['only' => ['edit','update','destroy']]);
    }

    public function reportePDF()
    {
        $pdf = PDF::loadView('proyecto.reporte');
       //return $pdf->download('reports/reporte.pdf');  //descarga directamente
        return $pdf->stream(); //muestra
    }

    public function find(Route $route){
        $this->proyecto = Proyecto::find($route->getParameter('proyecto'));
    }
    public function index()
    {
        $proyectos = Proyecto::Proyectos();
        return view('proyecto.index',compact('proyectos'));

    }
    public function searchProjetCriteria(){
        $carreras = Carrera::all();
        $gestiones = Gestion::all();
        $modalidades = Modalidad::all();
        //$proyectos = Proyecto::proyectosGroupByCreatedAt();
        return view('proyecto.filter', compact('carreras', 'modalidades', 'proyectos', 'gestiones'));
    }

    public function filterProjects(Request $request){
        $proyectos = Proyecto::filterProjects($request);
        return view('proyecto.filter-data',compact('proyectos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras=Carrera::lists('namecarre','id');
        $tutores = Profesional::all();
        $areas=Area::getAreas();
        $gestiones = Gestion::all();
        $modalidads=Modalidad::lists('namemodal','id');
        
        return view('proyecto.create',compact('carreras','areas','modalidads', 'tutores', 'gestiones'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyCreateRequest $request){
        $profesional = Profesional::find($request->get("tutor_id"));
        $data = $request->all();
        $data["tutor_data"] = $profesional->name. ' '.$profesional->surname;
        Proyecto::create($data);
        return redirect('/proyecto')->with('message','Creado exitosamente');
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
    public function edit($id){
        $carreras=Carrera::lists('namecarre','id');
        $tutores = Profesional::all();
        $areas=Area::getAreas();
        $modalidads=Modalidad::lists('namemodal','id');
        $gestiones = Gestion::all();
        

        return view('proyecto.edit',['proyecto'=>$this->proyecto,'carreras'=>$carreras,'modalidads'=>$modalidads,'areas'=>$areas, 'tutores'=> $tutores, 'gestiones'=>$gestiones]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProyUpdateRequest $request, $id)
    {

        $this->proyecto->fill($request->all());
        $this->proyecto->save();
        Session::flash('message','Proyecto Actualizado Correctamente');
        return Redirect::to('/proyecto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->proyecto->delete();
        \Storage::delete($this->proyecto->path);
        Session::flash('message','Proyecto Eliminado Correctamente');
        return Redirect::to('/proyecto');
    }
}
