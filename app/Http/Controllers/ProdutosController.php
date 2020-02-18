<?php

namespace App\Http\Controllers;

use App\produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produto = Produtos::latest()->paginate(5);
        return view('produtos.index',compact('produto'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        Produtos::create($request->all());
        return redirect()->route('produtos.index')
        ->with('success','Product created successfully.');      

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show(produtos $produto)
    {
        //
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit(produtos $produto)
    {
        //
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produtos $produto)
    {
        //
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        $produto->update($request->all());
        return redirect()->route('produtos.index')
        ->with('success','Product created successfully.');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy(produtos $produto)
    {
        //
        $produto->delete();
        return redirect()->route('produtos.index')
                        ->with('success','Product deleted successfully');
    }
}
