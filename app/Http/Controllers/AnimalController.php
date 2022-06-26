<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Animal;

class AnimalController extends Controller
{
    /* 
    *   Aqui no metodo Index do controller eu instancio as classes e crio
    *   uma instancia recebendo todos da classe
    */
    public function index()
    {
        $animal =  new Animal();
        $animais = Animal::All();
        return view ("animal.index", [
            "animal" => $animal,
            "animais" => $animais
        ]);
    }

    public function create()
    {
        
    }

    /*
    *   Metodo store para verficar se tem um id (editando), se não tiver
    *   se não tiver id ele criara nova instancia da Classe animal        
    */
    public function store(Request $request)
    {
        if ($request->get("id") != ""){
            $animal = Animal::Find($request->get("id"));
        } else {
            $animal = new Animal();
        }
        $animal->nomeanimal = $request->get("nomeanimal");
        $animal->nomedono = $request->get("nomedono");
        $animal->raca = $request->get("raca");
        $animal->datanascimento = $request->get("datanascimento");
        $animal->save();
        $request->section()->flash("status", "salvo");
        return redirect("/animal");
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}
