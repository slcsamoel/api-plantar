<?php

namespace App\Http\Controllers;

use App\Models\Campanha;
use Illuminate\Http\Request;
use App\Models\Grupo;

class CampanhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {

            $campanhas = Campanha::with('grupo', 'campanhaProdutos')->get();

            return response(
                    [
                    'status' => 'success',
                    'campanhas' => $campanhas
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
                'nome'  => 'required|max:255',
                'descricao'  => 'required|max:255',
                'desconto'  => 'required|numeric',
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

            if($grupo){
                    if($request->status == 'ativo'){

                        $date['status'] = $request->status;

                        foreach($grupo->campanhas as $camps){
                            $camps->status = 'inativo';
                            $camps->save();
                        }

                    }
            }


            $campanha = Campanha::query()->firstOrCreate($date);

            return response(
                [
                  'status' => 'success',
                  'campanha'=> $campanha
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
    public function show(Campanha $campanha)
    {

        try {
            return response(
                [
                 'status' => 'success',
                 'campanha' => $campanha->with('grupo', 'campanhaProdutos')
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
    public function update(Request $request, Campanha $campanha)
    {

        try {

            $date = $this->validate($request,[
                'grupo_id' => 'required|numeric',
                'nome'  => 'required|max:255',
                'descricao'  => 'required|max:255',
                'desconto'  => 'required|numeric',
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

            if($grupo){
                if($request->status == 'ativo'){

                    $date['status'] = $request->status;

                    foreach($grupo->campanhas as $camps){
                        $camps->status = 'inativo';
                        $camps->save();
                    }

                }
            }

            $update = $campanha->update($date);

            return $update
                        ?

                        response(
                        [
                        'status' => 'success',
                        'campanha' => $campanha
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
    public function destroy(Campanha $campanha)
    {

        try {

            $campanha->delete();

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
