<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LarTemporarioController extends Controller
{
    //Exibe a lista de lares temporários
    public function index() {
        // Busca todos os registros da tabela 'lartemporarios' no banco de dados
        $lares = DB::table('lartemporarios')->get();

        // Retorna a view 'larTemporario.index' com os dados dos lares
        return view('larTemporario.index', compact('lares'));
    }

    
     //Exibe o formulário para criar um novo lar temporário.
    public function create() {
        // Retorna a view 'larTemporario.create' para exibição do formulário
        return view('larTemporario.create');
    }

    
    //Grava um novo lar temporário no banco de dados.
    public function db(Request $request) {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255', 
            'endereco' => 'required|string|max:255', 
            'telefone' => 'required|string|max:20', 
            'email' => 'required|email|max:255', 
            'capacidade' => 'required|integer|min:1', 
            'descricao' => 'nullable|string', 
        ]);

        // Insere os dados validados no banco de dados
        DB::table('lartemporarios')->insert([
            'nome' => $request->input('nome'), 
            'endereco' => $request->input('endereco'), 
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email'),
            'capacidade' => $request->input('capacidade'),
            'descricao' => $request->input('descricao'),
            'data_criacao' => now(),
        ]);

        // Redireciona para a lista de lares temporários com mensagem de sucesso
        return redirect()->route('LarTemporarios.index')
                         ->with('success', 'Lar temporário cadastrado com sucesso!');
    }
}
