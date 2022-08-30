<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PessoaModel extends Model
{
    use HasFactory;
    protected $table = 'pessoas';
    public $timestamps = false;

    protected $fillable = ['id', 'nome', 'genero', 'nascimento', 'pais_id'];

    public function pais() {
        return $this->belongsTo(PaisModel::class);
    }
}
