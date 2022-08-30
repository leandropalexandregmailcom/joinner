<?php

namespace App\Http\Controllers;

use App\Dao\PaisDao;
use Illuminate\Http\Request;
use App\Http\Resources\PaisResource;
use App\Http\Requests\CreatePaisFormRequest;

class PaisController extends Controller
{
    public function getAll()
    {
        $paisDao = new PaisDao();
        return PaisResource::collection($paisDao->getAll());
    }
}
