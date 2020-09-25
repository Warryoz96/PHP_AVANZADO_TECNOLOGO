<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artista;
use Illuminate\Support\Facades\Validator;

class ArtistaController extends Controller
{
    //Los controladores estan compuestos
    //por acciones: metodos de la controller 
    //debe haber una ruta para cada accion

    public function index(){

        //capturar datos con los modelos
        $artistas = Artista::all();
        //retornar vista que se muestre los artistas
       return view('artistas.index')
                   ->with('artistas', $artistas);

    }

    public function create(){
        //mostrar el formulario para registrar artista
        return view('artistas.new');
    }
    public function store(Request $r){
        //validacion paso 1:establacer reglas de vaidacion
       $reglas=[
            "nombre_artista"=>['required', 'alpha', 'min:3', 'max:6', 'unique:artists,Name' ] 
       ]; 

       //Validacion paso 1b: poner mensajes personalizados
       $mensajes=[
           'required'=>"El nombre del artista es obligatorio",
           'alpha'=> "Solo letras papu",
           'min'=>"El attribute debe tener :val caracteres como minimo"
       ];
       //validacion paso 2: crear el objeto de validacion
       
       $validador= Validator::make($r->all(), $reglas, $mensajes);

       //validacion paso 3: Validar-Comparar input-data vs reglas 
       if($validador->fails()){
           //validacion fallida
           /* var_dump ($validador->errors()->first("nombre_artista"));
           die("");*/
           //Redirigir a la ruta anterior: pero con mensajes de error
           return redirect('artistas/create')->withErrors($validador);
       }      
       //crear el objeto artista
       $nuevo_artista = new Artista();
       //Asignar Atributos
       $nuevo_artista->Name= $r->input('nombre_artista');
       //grabar
       $nuevo_artista->save();
        /*echo "Artista Registrado";*/

       //redireccionar a la vista de nuevo
       //redirect: una ruta que exista en el web.php(de get)
       //with del redirect: crea una variable de session flash, para portar
       return redirect('artistas/')->with('exito', "Artista Registrado existosamente");
    }
    
       
}
