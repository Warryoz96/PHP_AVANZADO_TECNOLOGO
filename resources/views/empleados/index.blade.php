


    <title>Clase Jueves 20  y viernes 21 de agosto</title>
        @extends('layouts.master')

        <!-- Contenidp-->
        @section('nav')
    

    <section class="mt-3">
        
        <div class=" row mb-2">
            <div class="offset-md-4 col-md-6">
            <h3 class="b-3 d-inline">Listado de Empleados</h3>
            </div>
        
            <div class=" col-md-2 p-0 ">
                 <a href=" {{ url('empleados/create') }}" class="btn btn-success"> + Empleado</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class=" table table-hover" >
                <thead class="thead-dark">
                    <tr class="h6">
                        <th>#</th>
                        <th>Nombres</th>
                        <th>Cargo</th>
                        <th>Email</th>
                        <th>Detalles</th>
                        <!-- <th>Jefe</th>
                        <th>Nacimiento</th>
                        <th>Contratacion</th>
                        <th >Direccion</th>
                        <th>Ciudad</th>
                        <th>Estado</th> -->
                        <!-- <th>Pais</th>
                        <th>Postal</th>
                        <th>Telefono</th>
                        <th>Fax</th>
                        <th>Email</th> -->
                    </tr>
                </thead>
                <tbody>

                
                <!-- recorro la tabla foreach blade-->
                @foreach($empleados as $empleado)
                    <tr class="small">
                    <td>{{ $empleado->EmployeeId }}</td>
                    <td>{{ $empleado->FirstName }} {{ $empleado->LastName }}</td>
                    <td>{{ $empleado->Title }} </td>
                    <td>{{ $empleado->Email }} </td>
                    <td>
                        <a href="{{ url('empleados/'.$empleado->EmployeeId)}}" class="btn btn-info text-light"> Detalle</a>    
                        <a href="{{ url('empleados/'.$empleado->EmployeeId.'/edit')}}" class="btn btn-warning">Editar</a>
                    </td>

                    <!-- <td>
                        @if ($empleado->jefe_directo()->get()->isNotEmpty() )

                    <strong class="text-success">{{ $empleado->jefe_directo()->first()->LastName }} {{ $empleado->jefe_directo()->first()->FirstName }}</strong>
                    @else
                            <strong class="text-warning">
                            {{ "Empleado sin jefe directo"}}
                            </strong>
                        @endif
                        </td> -->
                    <!-- <td>{{  $empleado->BirthDate->isoFormat("MMM Do YY")  }}</td>
                        <td>{{  $empleado->HireDate->isoFormat("MMM Do YY")  }}</td>
                    <td >{{ $empleado->Address }}</td> -->
                    <!-- <td>{{ $empleado->City }}</td>
                    <td>{{ $empleado->State }}</td> -->
                    <!-- <td>{{ $empleado->Country }}</td>
                    <td>{{ $empleado->PostalCode }}</td>
                    <td>{{ $empleado->Phone }}</td>
                    <td>{{ $empleado->Fax }}</td>
                    <td>{{ $empleado->Email }}</td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{ $empleados->links() }}
        <!-- TODO: poner el paginador-->
    </section>

@endsection