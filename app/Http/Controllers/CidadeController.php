<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Grupo;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $cidades = Cidade::with('grupo')->get();

            return response(
                    [
                    'status' => 'success',
                    'cidades' => $cidades
                    ]
                    , 200);

        } catch (\Throwable $th) {
            return response(
                [
                  'status' => 'error',
                  'messege'=> $th->getMessage()
                ]

          ,500);
        }

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $date = $this->validate($request,[
                'grupo_id' => 'required|numeric',
                'nome'  => 'required|max:255'
            ]);

            $grupo =  Grupo::find($request->grupo_id);

            if(!$grupo){
                return response(
                           [
                             'status' => 'error',
                             'messege'=>"o Grupo não existe"
                           ]
                           , 400);
            }

            $cidade = Cidade::query()->firstOrCreate($date);

            return response(
                [
                  'status' => 'success',
                  'cidade'=> $cidade
                ]
                , 201);


        } catch (\Throwable $th) {

            return response(
                      [
                        'status' => 'error',
                        'messege'=> $th->getMessage()
                      ]

                ,500);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {




    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
