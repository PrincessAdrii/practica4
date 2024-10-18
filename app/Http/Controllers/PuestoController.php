<?php

namespace App\Http\Controllers;

use App\Models\puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public $val;

    public function __construct(){
        $this->val=[
            'idPuesto' =>['required'],
            'nombrePuesto'    =>['required','min:3'],
            'tipo' =>['required'],
        ];
    }

    public function index()
    {
        $puestos= puesto::paginate(5);
        return view("Puestos/index",compact("puestos"));

    }


    public function create()
    {
        $puestos= puesto::paginate(5); 
        $puesto=new puesto;
        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Puestos/form",compact("puestos",'puesto',"accion",'txtbtn','des'));
    }

 
    public function store(Request $request)
    {
        $val= $request->validate($this->val);
        Puesto::create($val);
        return redirect()->route('puestos.index')->with("mensaje",'se inserto correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(puesto $puesto)
    {
        $puestos=puesto::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $des='disabled';
        return view("Puestos/form",compact('puestos','puesto','accion','txtbtn','des'));
    }

   
    public function edit(puesto $puesto)
    {
        $puestos=puesto::Paginate(5);
        $accion='E';
        $txtbtn='actualizar';
        $des='';
        return view("Puestos.form",compact('puestos','puesto','accion','txtbtn','des'));
    }

    
    public function update(Request $request, puesto $puesto)
    {
        $puesto->update($request->all());
        return redirect()->route('puestos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(puesto $puesto)
    {
        $puesto->delete();
        return redirect()->route('puestos.index');
    }
}
