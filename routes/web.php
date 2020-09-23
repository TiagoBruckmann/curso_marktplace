<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/model', function(){
    // $products = \App\Product::all();  //select * from products
    // return $products;

    /*
    $user = new \App\User();
    $user = \App\User::find(1);
    $user->name = 'usuario teste editado';
    $user->save();
    return $user->save();
    */

    // \App\User::all(); - retorna todos os usuarios
    // \App\User::find(3); - retorna o usuario de acordo com seu id
    // \App\User::where('name', 'nome a ser pesquisado')->get(); - retorna o usuario de acordo a pesquisa feita
    // return \App\User::paginate(10); paginar dados por pagina

    return \App\User::all();
    
});