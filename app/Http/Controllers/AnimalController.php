<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\models\Animal;
use App\models\Especie;


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

    public function edit($id)
    {
        $animal = Animal::Find($id);
        $animais = Animal::All();
        return view ("animal.index", [
            "animal" => $animal,
            "animais" => $animais
        ]);
    }

    public function destroy($id, Request $request)
    {
        Animal::Destroy($id);
        $request->section()->flash("status", "excluido");
        return redirect ("/animal");
    }
}
