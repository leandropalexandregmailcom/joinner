<?php

namespace App\Http\Controllers;

use App\Dao\PessoaDao;
use App\Classes\Pessoa;
use Illuminate\Http\Request;
use App\Http\Resources\PessoaResource;
use App\Http\Requests\CreatePessoaFormRequest;
use App\Http\Requests\DeletePessoaFormRequest;
use App\Http\Requests\EditPessoaFormRequest;
use App\Http\Requests\UpdatePessoaFormRequest;

class PessoaController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getAll()
    {
        $pessoaDao = new PessoaDao();
        return PessoaResource::collection($pessoaDao->getAll());
    }

    public function store(CreatePessoaFormRequest $request) {
        $pessoa = new Pessoa();
        $pessoaDao = new PessoaDao();
        $data = array(
            'message' => 'Erro ao cadastrar pessoa',
            'status'  => 400,
            'success' => false
        );

        $pessoa->setNome($request->nome);
        $pessoa->setGenero($request->genero ? $request->genero : null);
        $pessoa->setNascimento($request->nascimento);
        $pessoa->setPais_id(intval($request->pais));

        if($pessoaDao->create($pessoa)) {
            $data['message'] = 'Pessoa cadastrada com sucesso';
            $data['status']  = 200;
            $data['success'] = true;
        }

        return response()->json($data);
    }

    public function edit(EditPessoaFormRequest $request) {
        $pessoa = new Pessoa();
        $pessoaDao = new PessoaDao();
        $pessoa->setId(intval($request->id));
        return response()->json($pessoaDao->getById($pessoa));
    }

    public function update(UpdatePessoaFormRequest $request) {
        $pessoa = new Pessoa();
        $pessoaDao = new PessoaDao();
        $data = array(
            'message' => 'Erro ao atualizar pessoa',
            'status'  => 400,
            'success' => false
        );

        $pessoa->setId(intval($request->id));
        $pessoa->setNome(strval($request->nome));
        $pessoa->setGenero($request->genero);
        $pessoa->setNascimento($request->nascimento);
        $pessoa->setPais_id(intval($request->pais));

        if($pessoaDao->update($pessoa)) {
            $data['message'] = 'Pessoa atualizada com sucesso';
            $data['status']  = 200;
            $data['success'] = true;
        }

        return response()->json($data);
    }

    public function delete(DeletePessoaFormRequest $request) {
        $pessoa = new Pessoa();
        $pessoaDao = new PessoaDao();
        $data = array(
            'message' => 'Erro ao deletar pessoa',
            'status'  => 400,
            'success' => false
        );
        $pessoa->setId(intval($request->id));

        if($pessoaDao->delete($pessoa)) {
            $data['message'] = 'Pessoa deletada com sucesso';
            $data['status']  = 200;
            $data['success'] = true;
        }
        return response()->json($data);
    }
}
