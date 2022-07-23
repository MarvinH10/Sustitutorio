<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function mostrar(){
        $detalle_ventas = DetalleVenta::orderBy('id')->paginate(7);
        return view('detalleventa.mostrar')->with('detalle_ventas',$detalle_ventas);
    }
    public function formulario(){
        return view('detalleventa.guardar');
    }
    public function guardar(Request $request){
        $request->validate([
            "cantidad"=> "required",
            "precio"=> "required",
            "idPrenda"=> "required",
            "idVenta"=> "required",
        ]);
        $detalle_ventas = new DetalleVenta();
        $detalle_ventas->cantidad=$request->input('cantidad');
        $detalle_ventas->precio=$request->input('precio');
        $detalle_ventas->idPrenda=$request->input('idPrenda');
        $detalle_ventas->idVenta=$request->input('idVenta');
        $detalle_ventas->save();
        return redirect("detalleventa/mostrar");
    }
    public function destoy($id){
        Cita::destroy($id);
        return redirect("detalleventa/mostrar")->with('destroy','Datos eliminados');
    }
}
