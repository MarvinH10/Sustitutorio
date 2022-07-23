<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function mostrar(){
        $ventas = Venta::orderBy('id')->paginate(7);
        return view('venta.mostrar')->with('ventas',$ventas);
    }
    public function formulario(){
        return view('venta.guardar');
    }
    public function guardar(Request $request){
        $request->validate([
            "nombre_venta"=> "required",
            "descripcion"=> "required",
            "idCliente"=> "required",
        ]);
        $ventas = new Venta();
        $ventas->nombre_venta=$request->input('nombre_venta');
        $ventas->descripcion=$request->input('descripcion');
        $ventas->fecha=now();
        $ventas->idCliente=$request->input('idCliente');
        $ventas->save();
        return redirect("venta/mostrar");
    }
    public function destoy($id){
        Cita::destroy($id);
        return redirect("venta/mostrar")->with('destroy','Datos eliminados');
    }
}
