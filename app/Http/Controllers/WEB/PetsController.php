<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function index(){
        $pets = Pet::all('id','name');

        return view('pets.index', [
            'pets' => $pets,
        ]);
    }

    public function create(){
        return view('pets.adicionar');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'especie' => 'required|max:30',
            'color' => 'required',
            'tamanho' => 'required|max:15',
         ]);

        $pet = Pet::create([
            'name' => $request['name'],
            'especie' => $request['especie'],
            'color' => $request['color'],
            'tamanho' => $request['tamanho'],
        ]);

        return view('pets.show', [
            'pet' => $pet
        ]);
    }

    public function show(Pet $pet ){
        return view('pets.show', [
            'pet' => $pet
        ]);
    }


}
