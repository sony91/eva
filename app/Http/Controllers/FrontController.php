<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Proyecto;
class FrontController extends Controller
{
   public function index(){
        return view('index');
   }

   public function contacto(){
        return view('contacto');
   }

   public function reviews(){
      $proyectos = Proyecto::all();
        return view('reviews', compact('proyectos'));
   }

   public function admin(){
        return view('admin.index');
   }
}
