<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pet::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return $pet;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return $pet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        $request->validate([
            'name' => 'required',
            'especie' => 'required|max:30',
            'color' => 'required',
            'tamanho' => 'required|max:15',
        ]);

        $pet->update([
            'name' => $request['name'],
            'especie' => $request['especie'],
            'color' => $request['color'],
            'tamanho' => $request['tamanho'],
        ]);

        return $pet;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();
    }

    /**
     * Altera valores antigos do campo especie do banco de dados para a nova forma.
     *
     * @return void
     */
    public function alteraValoresAntigosCampoEspecie()
    {
        $pets = Pet::whereIn('especie', ['bunny', 'dog', 'dragao de komodo', 'mamba'])->get();

        foreach ($pets as $pet) {
            switch ($pet->especie) {
                case 'bunny':
                    $pet->especie = 'Coelho';
                    break;

                case 'dog':
                    $pet->especie = 'Cachorro';
                    break;

                case 'dragao de komodo':
                    $pet->especie = 'Dragao de Komodo';
                    break;

                case 'mamba':
                    $pet->especie = 'Mamba';
                    break;

                default:
                    break;
            }

            $pet->save();
        }
    }

    /**
     * Altera valores antigos do campo tamanho do banco de dados para a nova forma.
     *
     * @return void
     */
    public function alteraValoresAntigosCampoTamanho()
    {
        $pets = Pet::whereIn('tamanho', ['xs', 'sm', 'm', 'l', 'xl', 'XS', 'SM', 'M', 'L', 'XL'])->get();

        foreach ($pets as $pet) {
            switch (strtolower($pet->tamanho)) {
                case 'xs':
                    $pet->tamanho = 'Extra pequeno';
                    break;

                case 'sm':
                    $pet->tamanho = 'Pequeno';
                    break;

                case 'm':
                    $pet->tamanho = 'Medio';
                    break;

                case 'l':
                    $pet->tamanho = 'Grande';
                    break;

                case 'xl':
                    $pet->tamanho = 'Extra grande';
                    break;

                default:
                    break;
            }

            $pet->save();
        }
    }
}
