<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdotanteController extends Controller
{

    public function index(){
        // Busca os pets que possuem adotantes (nome_adotante não é NULL)
        $adotantes = DB::table('adotantes')
        ->leftJoin('pets', 'adotantes.pet_id', '=', 'pets.id')
        ->select(
            'adotantes.id',
            'adotantes.nome_adotante',
            'adotantes.email_adotante',
            'adotantes.telefone_adotante',
            'adotantes.created_at as data_adocao',
            'pets.nome as nome',
            'pets.raca as raca',
            'pets.idade as idade',
            'pets.caminho_imagem'
        )
        ->get();

        // Retorna a view Cadastro.index com os dados das adoções
        return view('Adotantes.index', compact('adotantes'));
    }

    // Método para exibir o formulário de adoção
    public function create(Request $request){
        $petId = $request->query('pet');
        $pet = $petId ? DB::table('pets')->where('id', $petId)->first() : null;

        if (!$pet) {
            return redirect()->route('Pets.index')->with('error', 'Pet não encontrado.');
        }

        return view('Adotantes.create', compact('pet'));
    }

    // Método para salvar os dados da solicitação de adoção
    public function db(Request $request){
        //dd($request);
        $request->validate([
            'nome_adotante' => 'required|string|max:255',
            'email_adotante' => 'required|email|max:255',
            'telefone_adotante' => 'required|string|max:20',
            'id' => 'required|string|max:255',
        ]);

        $data = [
            'nome_adotante' => $request->input('nome_adotante'),
            'email_adotante' => $request->input('email_adotante'),
            'telefone_adotante' => $request->input('telefone_adotante'),
        ];

        $data['created_at'] = now();
        $data['pet_id'] = $request->input('id');
        DB::table('adotantes')->insert($data);

        return redirect()->route('Pets.index')->with('success', 'Solicitação de adoção enviada com sucesso!');
    }
}
