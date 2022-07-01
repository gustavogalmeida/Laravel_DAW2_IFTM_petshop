<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\models\Animal;
use App\models\Especie;


class AnimalController extends Controller
{   
    public function index(){
    $animal = new Animal();
		$animais = DB::table("animal AS a")
						->join("especie AS e", "a.especie_id", "=", "e.id")
						->select("a.id", "a.nomeanimal", "a.idade", "e.especie AS especie")
						->get();
		$especies = Especie::All();
        return view("animal.index", [
			"animal" => $animal,
			"animais" => $animais,
			"especies" => $especies
    ]);
    }
    /*
    public function index()
    {
        $animal =  new Animal();
        $animais = Animal::All();
        return view ("animal.index", [
            "animal" => $animal,
            "animais" => $animais
        ]);
    } */

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

        $hoje = \Carbon\Carbon::now();
		$nascimento = \Carbon\Carbon::Parse($animal->datanascimento);
		$animal->idade = $hoje->diffInYears($nascimento);

        $animal->especie_id = $request->get("especie");
        $animal->save();
        $request->session()->flash("status", "salvo");
        return redirect("/animal");
    }

    public function edit($id)
    {
        $animal = Animal::Find($id);
		$animais = DB::table("animal AS a")
						->join("especie AS e", "a.especie_id", "=", "e.id")
						->select("a.id", "a.nomeanimal", "a.idade", "e.especie AS especie")
						->get();
		$especies = Especie::All();
        return view("animal.index", [
			"animal" => $animal,
			"animais" => $animais,
			"especies" => $especies
		]);
        /*
        $animal = Animal::Find($id);
        $animais = Animal::All();
        return view ("animal.index", [
            "animal" => $animal,
            "animais" => $animais
        ]);
        */
    }

    public function destroy($id, Request $request)
    {
        Animal::Destroy($id);
        $request->session()->flash("status", "excluido");
        return redirect ("/animal");
    }
}
