<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function mostrar(){
        $clientes = Cliente::orderBy('id')->paginate(7);
        return view('cliente.mostrar')->with('clientes',$clientes);
    }
    public function formulario(){
        return view('cliente.guardar');
    }
    public function guardar(Request $request){
        $request->validate([
            "nombres"=> "required",
            "apellidos"=> "required",
            "dni"=> "required",
            "direccion"=> "required",
            "telefono"=> "required",
        ]);
        $clientes = new Cliente();
        $clientes->nombres=$request->input('nombres');
        $clientes->apellidos=$request->input('apellidos');
        $clientes->dni=$request->input('dni');
        $clientes->direccion=$request->input('direccion');
        $clientes->telefono=$request->input('telefono');
        $clientes->save();
        return redirect("cliente/mostrar");
    }
    public function destoy($id){
        Cita::destroy($id);
        return redirect("cliente/mostrar")->with('destroy','Datos eliminados');
    }
}
