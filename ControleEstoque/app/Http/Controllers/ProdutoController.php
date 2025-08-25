<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Exibe a lista de todas as produtos.
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
    }

    /**
     * Mostra o formulário para criar uma nova Produto.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Armazena uma nova Produto no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255|unique:produtos']);
        Produto::create(['nome' => $request->nome]);
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Mostra o formulário para editar uma Produto existente.
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Atualiza uma Produto no banco de dados.
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate(['nome' => 'required|string|max:255|unique:produtos,nome,' . $produto->id]);
        $produto->update(['nome' => $request->nome]);
        return redirect()->route('produtos.index')->with('success', 'Produto atualizada com sucesso!');
    }

    /**
     * Remove uma Produto do banco de dados.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');
    }
}