<?php

namespace App\Dao;

use App\Classes\Pessoa;
use App\Models\PessoaModel;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PessoaDao {

    public function getAll(): Collection {
        try {
            $model = new PessoaModel();
            return $model->with('pais')->orderBy('nome', 'asc')->get();
        } catch(Exception $e) {
            throw new Exception("Erro ao buscar Pessoas");
        }
    }

    public function getById(Pessoa $pessoa): PessoaModel {
        try {
            $model = new PessoaModel();
            return $model->where(['id' => $pessoa->getId()])->with('pais')->first();
        } catch(Exception $e) {
            throw new Exception("Erro ao buscar Pessoa: $e->getMessage()");
        }
    }

    public function create(Pessoa $pessoa): bool {

        try {
            DB::beginTransaction();

            $model = new PessoaModel();
            $model->nome = $pessoa->getNome();
            $model->genero = $pessoa->getGenero();
            $model->nascimento = $pessoa->getNascimento();
            $model->pais_id = $pessoa->getPais_id();
            $model->save();
            Db::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function update(Pessoa $pessoa): bool {

        try {
            DB::beginTransaction();
            $model = new PessoaModel();
            $update = $model->where(['id' => $pessoa->getId()])->first();

            $update->nome = $pessoa->getNome();
            $update->genero = $pessoa->getGenero();
            $update->nascimento = $pessoa->getNascimento();
            $update->pais_id = $pessoa->getPais_id();
            $update->save();
            Db::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }

    public function delete(Pessoa $pessoa): bool {

        try {
            DB::beginTransaction();
                $model = new PessoaModel();
                $model->where(['id' => $pessoa->getId()])->delete();
            Db::commit();

            return true;
        } catch (Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}
