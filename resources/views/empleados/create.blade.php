
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
                <div class="card-header bg-secondary"> <h3 class="text-light" >Registro de Empleados</h3></div>
                <div class="card-body">

                                 @if(session("exito"))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                         <p>{{session("exito")}}</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                <form method="post" action=" {{ url('empleados/store') }}" > 
                @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Nombre</label>
                            <input type="text" class="form-control" name="FirstName" id="email">
                            <p class="text-danger">{{ $errors->first('FirstName')}}</p>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellido">Apellido</label>
                            <input type="apellido" class="form-control" name="LastName" id="apellido">
                            <p class="text-danger">{{ $errors->first('LastName')}}</p>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Fecha Nacimiento</label>
                            <input type="text"  id="datepicker" name="BirthDate" class="form-control datepicker">
                            <p class="text-danger">{{ $errors->first('BirthDate')}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Fecha de Contratacion</label>
                            <input type="text"  id="datepicker2" name="HireDate" class="form-control datepicker">
                            <p class="text-danger">{{ $errors->first('HireDate')}}</p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Ciudad</label>
                            <input type="text" name="City" class="form-control" id="inputCity">
                            <p class="text-danger">{{ $errors->first('City')}}</p>

                        </div>

                        <div class="form-group col-md-4">
                            <label for="cargo">Cargo</label>
                            <select  class="form-control" name="Title" id="">
                                <option value="">Seleccione...</option>
                                @foreach($cargos as $c)

                                <option>{{$c->Title}}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('Title')}}</p>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="responsable">Jefe Directo</label>
                            <select  class="form-control" class="form-control" name="ReportsTo">
                                <option value="">Seleccione...</option>
                                @foreach($jefes as $j)

                                <option value="{{$j->EmployeeId}}">{{$j->FirstName}} {{$j->LastName}}</option>
                                @endforeach
                            </select>
                            <p class="text-danger">{{ $errors->first('ReportsTo')}}</p>

                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail">Correo</label>
                            <input type="email" name="Email"  class="form-control" id="inputEmail">
                            <p class="text-danger">{{ $errors->first('Email')}}</p>
                    </div>

                    </div>

                </div><!--end card body-->
                <div class=" card-footer "> 
                <button type="submit" class="offset-md-11  btn btn-outline-success">Registrar</button>
                    </form>
                </div> <!--end card footer-->
            </div><!-- end card -->
        </div>    
    </div> <!--end row -->



<!-- End martes page-->
@endsection