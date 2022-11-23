<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {

            $produtos = Produto::with('produtoCampanhas')->get();

            return response(
                [
                 'status' => 'success',
                 'produtos' => $produtos
                ]
                , 200);


        }catch (\Throwable $th) {
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
                'descricao' => 'required|max:255',
                'preco' => 'required|numeric'
            ]);

            $produto = Produto::query()->firstOrCreate($date);

            return response(
                [
                 'status' => 'success',
                 'produtos' => $produto
                ]
                , 201);

        } catch (\Throwable $th) {

            return response(
                [
                  'status' => 'error',
                  'messege' => $th->getMessage()
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
    public function show(Produto $produto)
    {
        try {

            return response(
                [
                 'status' => 'success',
                 'produtos' => $produto
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
          try {

            $date = $this->validate($request,[
                'nome' => 'required|max:255',
                'descricao' => 'required|max:255',
                'preco' => 'required|numeric'
            ]);

            $update = $produto->update($date);

            return $update
                ?
                 response(
                    [
                    'status' => 'success',
                    'produtos' => $produto
                    ]
                , 200)
                :
                response(
                    [
                        'status' => 'error',
                        'message' => 'erro ao altera'
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
    public function destroy(Produto $produto)
    {

        try {

            $produto->delete();
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
