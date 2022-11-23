<?php

namespace App\Http\Controllers;

use App\Models\Campanha;
use App\Models\CampanhaProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use Throwable;

class CampanhaProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Campanha $campanha , Produto $produto)
    {
        try {

            $campanhaProduto = new CampanhaProduto();
            $campanhaProduto->campanha_id = $produto->id;
            $campanhaProduto->produto_id = $produto->id;
            $campanhaProduto->preco = $produto->preco - ($produto->preco / 100 * $campanha->desconto);
            $campanhaProduto->save();

            return response([
                'status' => 'success',
                'message' => 'Produto vinculado',
                'preço_desconto' => $campanhaProduto->preco
               ] , 201);

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
    public function show($id)
    {
        //
    }

    /**
     * Show produtos por campanha
     *
     * @param  Campanha
     * @return \Illuminate\Http\Response
     */
    public function produtosPorCampanha(Campanha $campanha)
    {

        try {
            return response([
                'status' => 'success',
                'Campanha_id' => $campanha->id,
                'Nome' => $campanha->nome,
                'Desconto' => $campanha->desconto,
                'Produtos' => $campanha->campanhaProdutos()->get(),

               ] , 201);

        } catch (\Throwable $th) {

            return response(
                [
                  'status' => 'error',
                  'messege' => $th->getMessage()
                ]

          ,500);

        }

    }


    public function campanhasPorProduto(Produto $produto)
    {

        try {
            return response([
                'status' => 'success',
                'Campanha_id' => $produto->id,
                'Nome' => $produto->nome,
                'Preco' => $produto->preco,
                'Campanhas' => $produto->produtoCampanhas()->get(),

               ] , 201);

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
