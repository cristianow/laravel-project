<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
$this->post('auth','Auth\AuthApiController@authenticate');
$this->group(['prefix'=>'/'],function(){
    $this->group(['middleware'=>'jwt.auth'],function(){
        $this->get('/catraca','Modulos\Config\CatracaController@indexJ');
    });
    
});