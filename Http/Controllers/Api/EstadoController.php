<?php

namespace Modules\Geografia\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Geografia\Entities\Estado;

class EstadoController extends Controller
{

    public function index()
    {
        // return Estado::with('cidades')->get();
        return Estado::all();
    }


    public function show(Estado $estado)
    {
        return $estado;
    }

    
}
