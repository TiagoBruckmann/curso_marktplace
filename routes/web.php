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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

//rotas do carrinho de compra
Route::prefix('cart')->name('cart.')->group(function(){

    Route::get('/', 'CartController@index')->name('index');
    Route::post('add', 'CartController@add')->name('add');
    Route::get('remove{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');


});

//rotas de checkout para finalização de compras
Route::prefix('checkout')->name('checkout.')->group(function(){
    Route::get('/', 'CheckoutController@index')->name('index');
});

Route::group([ 'middleware' => ['auth'] ], function(){
    Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    
        /*
        Route::prefix('stores')->name('stores.')->group(function(){
            Route::get('/', 'StoreController@index')->name('index');
            Route::get('/create', 'StoreController@create')->name('create');
            Route::post('/store', 'StoreController@store')->name('store');
            Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
            Route::post('/update/{store}', 'StoreController@update')->name('update');
            Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        });
        */
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');


        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
     });
});
 
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

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

    //pegar a loja de um usuario
    // $user = \App\User::find(4);
    // dd($user->store()-count());

    //pegar os produtos de uma loja
   // $loja = \App\Store::find(1);
   // dd($loja->products());

   //criar uma loja para um usuario
   /*
   $user = \App\User::find(10);
   $store = $user->store()->create([
       'name' => 'loja teste',
       'description' => 'loja teste para produtos de informatica',
       'mobile_phone' => 'XX-XXXXX-XXXX',
       'phone' => 'XX-XXXX-XXXX',
       'slug' => 'loja-teste'
   ]);

   dd($store);
   */

   //criar um produto para uma loja

   /* 
   $store = \App\Store::find(42);
   $product = $store->products()->create([
       'name' => 'notebook Dell',
       'description' => 'Core i7, 8GB Ram, placa de video AMD 2GB',
       'body' => 'Qualquer coisa...',
       'price' => 5000.90,
       'slug' => 'notebook-dell',
   ]);

   dd($product);
   */

   //criar uma categoria

   /*
   \App\Category::create([
       'name' => 'Games',
       'Description' => null,
       'slug' => 'games',
   ]);

   \App\Category::create([
        'name' => 'Notebooks',
        'Description' => null,
        'slug' => 'notebooks',
    ]);    

    return \App\Category::all();

    */

   //adicionar um produto para uma serie categoria ou vice-versa

   /*
   $product = \App\Product::find(41);
   dd($product->categories()->attach([4]));

    return \App\User::all();
    */
});