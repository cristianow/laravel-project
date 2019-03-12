<?php

namespace App\Http\Controllers\Modulos\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\StandardController;
use App\Models\Modulos\Config\Catraca;

class CatracaController extends StandardController
{
    protected $catraca,$request;
    public function __construct(Request $request,Catraca $catraca){
        $this->request=$request;
        $this->model=$catraca;
    }

   
}
