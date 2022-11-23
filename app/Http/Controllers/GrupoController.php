<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $grupos = Grupo::with('cidades' , 'campanhas')->get();
            return response(
                    [
                     'status' => 'success',
                     'grupos' => $grupos
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
                'nome' => 'required|max:255',
                'descricao' => 'required|max:255'
            ]);

            $grupo = Grupo::query()->firstOrCreate($date);

            return response(
                [
                 'status' => 'success',
                 'grupo' => $grupo
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
    public function show(Grupo $grupo)
    {
        try {
            return response(
                [
                 'status' => 'success',
                 'grupo' => $grupo->with('cidades')
                ]
            , 202);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {

            try {

                $date = $this->validate($request,[
                    'nome' => 'required|max:255',
                    'descricao' => 'required|max:255'
                ]);

                $update = $grupo->update($date);

                return $update
                        ?

                        response(
                        [
                        'status' => 'success',
                        'grupo' => $grupo
                        ], 202)

                        : response(
                        [
                         'status ' => 'error',
                         'messege' => 'Error ao Alterar'
                        ]
                        ,400);

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {

      try {

            $grupo->delete();
            return response(
                    [
                    'status'=>'success',
                    'message'=> 'Excluido com sucesso!'
                    ]
                , 204);

        } catch (\Throwable $th) {
            return response(
                [
                  'status' => 'error',
                  'messege'=> $th->getMessage()
                ]

            ,500);
        }

    }
}
