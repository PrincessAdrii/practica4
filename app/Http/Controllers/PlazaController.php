<?php

namespace App\Http\Controllers;

use App\Models\plaza;
use Illuminate\Http\Request;

class PlazaController extends Controller
{
    public $val;

    public function __construct(){
        $this->val=[
            'idPlaza'    =>['required'],
            'nombrePlaza'    =>['required']
        ];
    }
    
    public function index()
    {
        $plazas= plaza::paginate(5);
        return view("Plazas/index",compact("plazas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plazas= plaza::paginate(5); 
        $plaza=new plaza;
        $accion='C';
        $txtbtn='Guardar';
        $des='';
        return view("Plazas/form", compact("plazas","plaza","accion",'txtbtn','des'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val= $request->validate($this->val);
        plaza::create($val);
        return redirect()->route('plazas.index')->with("mensaje",'se inserto correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(plaza $plaza)
    {
        $plazas=plaza::Paginate(5);
        $accion='D';
        $txtbtn='confirmar la eliminacion';
        $des='disabled';
        return view("Plazas/form",compact('plazas','plaza','accion','txtbtn','des'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(plaza $plaza)
    {
        $plazas=plaza::Paginate(5);
        $accion='E';
        $txtbtn='actualizar';
        $des='';
        return view("Plazas.form",compact('plazas','plaza','accion','txtbtn','des'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, plaza $plaza)
    {
        $val= $request->validate($this->val);
        $plaza->update($val);
        return redirect()->route('plazas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(plaza $plaza)
    {
        $plaza->delete();
        return redirect()->route("plazas.index");
    }
}