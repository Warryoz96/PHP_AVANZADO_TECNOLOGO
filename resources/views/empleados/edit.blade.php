
<title>Nuevo Empleado</title>
<!--Heredar de la master-page-->
@extends('layouts.master')
<!-- Insertamos la section de la master page--->

@section('estilos-particulares')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('j-deps')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
     $( function() {
  
      $( ".datepicker" ).datepicker({dateFormat:" yy-mm-dd"} ).val();
    });
    </script>
@endsection

@section('nav')



    

    <div class=" mt-4 row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-secondary"> <h3 class="text-light" >Actualizacion de Empleados</h3></div>
                <div class="card-body">

                                 @if(session("exito"))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                         <p>{{session("exito")}}</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                <form method="post" action="{{ url('empleados/'.$empleado->EmployeeId) }}" > 
                @method("PUT")
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Nombre</label>
                            <input type="text" class="form-control" name="FirstName" id="email" value=" {{$empleado->FirstName }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellido">Apellido</label>
                            <input type="apellido" class="form-control" value=" {{$empleado->LastName }}"  name="LastName" id="apellido">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Fecha Nacimiento</label>
                            <input type="text"  id="datepicker" name="BirthDate" value=" {{$empleado->BirthDate->format('Y-m-d') }}" class="form-control datepicker">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de Contratacion</label>
                            <input type="text"  id="datepicker2" name="HireDate"  value=" {{$empleado->HireDate->format('Y-m-d') }}" class="form-control datepicker">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Ciudad</label>
                            <input type="text" name="City" value=" {{$empleado->City }}" class="form-control" id="inputCity">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="cargo">Cargo</label>
                            <select  class="form-control" id="" name="Title">

                                <option value="">Seleccione...</option>
                                @if($empleado->Title === "General Manager")
                                <option selected >{{ $empleado->Title }}</option>
                                @endif
                                @foreach($cargos as $c)
                                    @if( $empleado->Title === $c->Title )
                                     <option selected >{{ $c->Title }}</option>
                                    @else
                                     <option>{{  $c->Title  }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="responsable">Jefe Directo</label>
                             <select  class="form-control" class="form-control"  name="ReportsTo">
                                <option value="">Seleccione...</option>
                                @foreach($jefes as $j)
                                    @if($empleado->jefe_directo()->count() > 0)
                                        @if($empleado->jefe_directo()->first()->EmployeeId ===  $j->EmployeeId)
                                            <option selected  value="{{$j->EmployeeId}}">{{$j->FirstName}} {{$j->LastName}}</option>
                                        @else
                                            <option value="{{$j->EmployeeId}}">{{$j->FirstName}} {{$j->LastName}}</option>  
                                        @endif 
                                    @else 
                                     <option value="{{$j->EmployeeId}}">{{$j->FirstName}} {{$j->LastName}}</option>
                                    @endif  
                                @endforeach
                            </select>
                            <p>{{ $errors->first('ReportsTo')}}</p>
                        </div>
                    </div>

                </div><!--end card body-->
                <div class=" card-footer "> 
                <button type="submit" class="offset-md-11  btn btn-outline-success">Actualizar</button>
                    </form>
                </div> <!--end card footer-->
            </div><!-- end card -->
        </div>    
    </div> <!--end row -->



<!-- End martes page-->
@endsection