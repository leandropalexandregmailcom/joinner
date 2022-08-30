<?php

namespace App\Dao;

use App\Models\PaisModel;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class PaisDao {

    public function getAll(): Collection {
        try {
            $model = new PaisModel();
            return $model->orderBy('nome', 'asc')->get();
        } catch(Exception $e) {
            throw new Exception("Erro ao buscar Países: $e->getMessage()");
        }
    }
}
