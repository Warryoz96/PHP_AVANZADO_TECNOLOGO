<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado as Empleado;
use  Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\Validator;


class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Recuperar Todos los empleados
        $empleados= \App\Empleado::paginate(6);
        return view('empleados.index')->with("empleados", $empleados);
        // return view('layouts.master');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        //Solicitamos los datos al modelo, en este cas olo managers y les pasamos los parametros un array con las columnas necesarios
        $managers = \App\Empleado::Where('Title', 'like' , '%Manager%')->get(['EmployeeId','LastName', 'FirstName']);
        //Consultamos los cargos apra listarlos
        $cargos = \App\Empleado::select('Title')->distinct()->where('Title','!=','General Manager')->get();
        //Retornamos la vista
        return view('empleados.create')
        ->with("jefes", $managers)
        ->with("cargos",$cargos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //crear el objeto Empleado
        $empleado = new Empleado();
        //Asignar atributos
        $empleado->FirstName= $request->FirstName;
        $empleado->LastName= $request->LastName;
        $empleado->BirthDate= $request->BirthDate;
        $empleado->HireDate= $request->HireDate;
        $empleado->City= $request->City;
        $empleado->Title= $request->Title;
        $empleado->ReportsTo= $request->ReportsTo;

        //Guardar 
        $empleado->save();
        /*echo "Empleado Registrado";*/

        //redireccionar a la vista de nuevo
        //redirect: una ruta que exista en el web.php(de get)
        //with del redirect: crea una variable de session flash, para portar
        return redirect('empleados/create')->with('exito', "Empleado Registrado existosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Hago el namespace para encontrar con el metodo find el empleado con el id pasado
      $empleado =  \App\Empleado::with('subAlternos')
                            ->with('clientes')
                            ->with('jefe_directo')
                            ->find($id);

    //  echo '<pre>'; var_dump($empleados); echo '</pre>';
        // return view('empleados.index')->with("empleados", $empleados); 

        //Enviar el objeto a la vista 
        return view('empleados.show')->with("empleado", $empleado);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Busca el empleado

        $empleado = \App\Empleado::find($id);
        $cargos = \App\Empleado::select('Title')->distinct()->where('Title','!=','General Manager')->get();
        $jefes = \App\Empleado::Where('Title', 'like' , '%Manager%')->get(['EmployeeId','LastName', 'FirstName']);
        return view('empleados.edit', compact('empleado' ,'cargos', 'jefes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // Paso para validacion con laravel
        //importo la clase validador
        //defino la variable regla para las reglas
        $regla = [
            "ReportsTo" => ["required"]
        ];
        //inicializo el validador
        $validator = Validator::make($request->all(), $regla);

        if($validator->fails()){
            return redirect("empleados/$id/edit")->withErrors($validator);
        }
        $empleado = Empleado::find($id);
        //Asignar atributos
        $empleado->FirstName= $request->FirstName;
        $empleado->LastName= $request->LastName;
        $empleado->BirthDate= $request->BirthDate;
        $empleado->HireDate= $request->HireDate;
        $empleado->City= $request->City;
        $empleado->Title= $request->Title;
        $empleado->ReportsTo= $request->ReportsTo;
        //Guardar 
        $empleado->save();

        return redirect("empleados/$id/edit")->with('exito', "Empleado actualizado correctamente");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}