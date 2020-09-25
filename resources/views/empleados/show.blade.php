<!-- Heredar la master page en la vista  -->

@extends('layouts.master')

<!-- Contenidp-->
@section('nav')





<div class="row  small">
     <!-- Empleado -->
    <div class="col-md-5">
        <div class="mt-2  card">
                    <div class="card-header bg-light"><h5>Informacion Empleado:</h5>
            
                    </div>
                    <div class="card-body pb-1 pt-2">
                        <h6 class="card-title">{{ $empleado->FirstName}} {{ $empleado->LastName }}</h6>
                    </div>
                    <ul class="list-group ">
                            <li class="list-group-item"><b>Cargo: {{$empleado->Title}}</b></li>
                            @if($empleado->jefe_directo) 
                            <li class="list-group-item">
                                <b>Jefe directo:</b>
                                {{$empleado->jefe_directo->FirstName}}
                                {{$empleado->jefe_directo->LastName}}
                            </li>
                            @endif
                            <li class="list-group-item"><b>  Direccion</b>
                                {{$empleado->Address}},
                                {{$empleado->Country}}, 
                                {{$empleado->City}} 
                            </li>
                            <li class="list-group-item"><b>Fecha:</b> 
                                {{ $empleado->BirthDate->toFormattedDateString()  }}      
                        </li>
                        <li class="list-group-item"><b>Fecha de contratación: </b>
                                {{ $empleado->HireDate->toFormattedDateString()  }}        
                        </li>
    
                    </ul>   
               
        </div> <!-- end first card -->
        <div class="card mt-2">
                    <div class="card-header bg-light"><h5>Subalternos:</h5>
            
                    </div>
                    
                    @if($empleado->subAlternos->count() !== 0) 
                            <li class="list-group-item">
                                <b>Subalternos: </b>
                                <ul class="">
                                @foreach($empleado->subAlternos as $subalternos)
                                    <li class="">
                                
                               
                                {{$subalternos->FirstName}} 
                                    {{$subalternos->LastName}} 
                                    </li>
                                
                                @endforeach
                                </ul>
                            </li> 
                            @else
                            <div class="card-body">
                                <b>Sublaternos: </b>
                                <h6 class="text-danger d-inline-block">El empleado no tiene subalternos</h6>
                            </div>
                    @endif
        </div> 
    </div>
     <!-- end Empleado -->
<!-- Sub alternos -->
   
    <!-- end Sub alternos -->
    <!-- Clientes -->
    <div class="col-md-7">
        <div class=" text-center mt-2 card">
                    <div class="card-header bg-light"><h5>Clientes:</h5>
            
                    </div>
                         @if($empleado->clientes->count() !== 0) 
                            <table class="table table-striped"> 
                               <thead> 
                                    <th>Nombres</th>
                                    <th>Correo</th>
                                <thead>
                                <tbody>
                                @foreach($empleado->clientes as $clientes)
                                    
                                    <tr class="small" >
                                        <td>{{$clientes->FirstName}} {{$clientes->LastName}} </td>
                                        <td>{{$clientes->Email}}</td>
                                    </tr>  
                
                                @endforeach
                                </tbody>
                            </table>
                               
                              
                            @else
                            <div class="card-body">
                                <b>Clientes: </b>
                                <h6 class="text-danger d-inline-block">El empleado no tiene clientes</h6>
                            </div>
                        @endif
            </div>
    </div>
     <!-- end Clientes -->

     
                    
      
</div>

    



@endsection