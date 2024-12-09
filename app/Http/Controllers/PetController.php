<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetController extends Controller
{
    // Método para listar todos os pets no sistema
    public function index(){
        $pets = DB::table('pets')->get(); // Recupera todos os pets do banco de dados
        return view('Pets.index', compact('pets')); // Retorna a view com a lista de pets
    }

    // Método para exibir o formulário de criação ou edição de um pet
    public function create(Request $request){
        $id = $request->query('pet'); // Verifica se foi enviado um ID de pet
        $pet = $id ? DB::table('pets')->where('id', $id)->first() : null; // Busca o pet pelo ID, se existir
        return view('Pets.create', compact('pet')); // Retorna a view com os dados do pet (ou vazio para cadastro)
    }

    // Método para salvar ou atualizar os dados de um pet no banco de dados
    public function db(Request $request){
        // Validação dos dados obrigatórios do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|string|max:255',
            'raca' => 'required|string|max:255',
        ]);

        // Lógica para upload da imagem, caso tenha sido enviada
        $imagePath = "";
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $image = $request->file('foto');
            $destinationPath = public_path('image'); 
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->move($destinationPath, $fileName);
            $imagePath = 'image/' . $fileName;
        }

        // Insere os dados do pet no banco de dados
        DB::table('pets')->insert([
            'nome' => $request->input('nome'),
            'idade' => $request->input('idade'),
            'raca' => $request->input('raca'),
            'caminho_imagem' => $imagePath,
        ]);
        
        // Redireciona para a lista de pets com uma mensagem de sucesso
        return redirect()->route('Pets.index')->with('success', 'Pet cadastrado com sucesso!');
    }

    //Metodo para resposta via API - getPets
    public function getPets() {
        // Recupera todos os pets do banco de dados
        $pets = DB::table('pets')->get();
    
        // Retorna a resposta JSON com status 200 e os dados dos pets
        return response()->json([
            'status' => 'success',  // Indica que a requisição foi bem-sucedida
            'data' => $pets         // Dados dos pets recuperados
        ], 200);  // Status HTTP 200
    }
    
}
