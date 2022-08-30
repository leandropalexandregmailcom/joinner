<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaisModel extends Model
{
    use HasFactory;

    protected $table = 'paises';
    public $timestamps = false;

    protected $fillable = ['id', 'nome'];

    public function pessoas() {
        return $this->hasMany(PessoaModel::class);
    }
}
