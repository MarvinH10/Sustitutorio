<?php

namespace App\Http\Controllers;

use App\Models\Prenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PrendaController extends Controller
{
    public function mostrar(){
        $prendas = Prenda::orderBy('id')->paginate(7);
        return view('prenda.mostrar')->with('prendas',$prendas);
    }
    public function formulario(){
        return view('prenda.guardar');
    }
    public function guardar(Request $request){
        $request->validate([
            "nombre"=> "required",
            "fecha"=> "required",
            "cantidad"=> "required",
            "precio"=> "required",
        ]);
        $citas = new Prenda();
        $citas->nombre=$request->input('nombre');
        $citas->fecha=$request->input('fecha');
        $citas->cantidad=$request->input('cantidad');
        $citas->precio=$request->input('precio');
        $citas->tipo=$request->input('tipo');
        $citas->idCliente=$request->input('idCliente');
        $citas->save();
        return redirect("prenda/mostrar");
    }
    public function destoy($id){
        Cita::destroy($id);
        return redirect("prenda/mostrar")->with('destroy','Datos eliminados');
    }
}
