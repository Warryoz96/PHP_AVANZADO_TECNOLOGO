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

//Ruta de prueba
Route::get('hola' , function(){
    return view('layouts.master');
});


//Ruta de arreglo
Route::get('arreglo', function(){

    //definir arreglo
    $estudiantes=["AN"=>"Ana",
                  "BR"=> "Brenda",
                  "SO"=> "Sofia",
                  "ELI"=> "Elizabeth"];
    //ciclos foreach: recorres arreglo
    foreach($estudiantes as $indice=> $estu){
        echo"$estu  tiene el indice: $indice <br/>";
    }
});

//Ruta de paises
Route::get('paises', function(){
    
    $paises= [
        "Colombia" =>[
                        "Capital" =>"Bogotá",
                        "Moneda" =>"Peso",
                        "Población" =>50372424,
                        "Ciudades"=>["Medellín", "Cali", "Santa Marta"]

                     ],
        "Peru"     =>[
                        "Capital" =>"Lima",
                        "Moneda" =>"Sol",
                        "Población" =>33050325,
                        "Ciudades"=>["Cuzco", "Arequipa", "Trujillo"]
                     ],
        "Ecuador"  =>[
                        "Capital" =>"Quito",
                        "Moneda" =>"Dólar",
                        "Población" =>17517141,
                        "Ciudades"=>["Guataquil", "Manta", "Tulcán"]
                     ],
        "Brasil"   =>[
                        "Capital" =>"Brasilia",
                        "Moneda" =>"Real",
                        "Población" =>212216052,
                        "Ciudades"=>["Rio de Janeiro", "Recife", "Sao Pablo"]
                     ] 
    ];
    //Enviar datos de paises a una vista
    //con la función view
    return view('paises')->with("paises", $paises);
});

//Rutas de controlador 
Route::get('artistas', "ArtistaController@index");
Route::get('artistas/create', 'ArtistaController@create');
Route::post('artistas/store', 'ArtistaController@store');

Route::resource('empleados', 'EmpleadoController');
Route::get('empleados/create', 'EmpleadoController@create');
Route::post('empleados/store', 'EmpleadoController@store');
Route::post('empleados/update/{id}', ['as' => 'empleados/update', 'uses' => 'EmpleadoController@update']);

