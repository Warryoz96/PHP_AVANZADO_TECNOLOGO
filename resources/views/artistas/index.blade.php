
<title>Clase Agosto 6 2020</title>
    @extends('layouts.master')

    @section('nav')

    <div class="mt-3  row mb-2">
            <div class="offset-md-4 col-md-6">
            <h3 class="b-3 d-inline">Listado de Artistas</h3>
            </div>
        
            <div class=" col-md-2 p-0 ">
                 <a href=" {{ url('artistas/create') }}" class="btn btn-success"> + Artista</a>
            </div>
    </div>
        <div class="table-responsive">
            <table  class="table table-bordered responsive " >
                <thead class= "thead-dark">
                    <tr>
                        <th>Artista/Grupo</th>
                        <th>Albumes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($artistas as $artista)
                    <!-- Aqui muestro cada artista -->
                    <tr class="small">
                        <td class="">{{ $artista->Name}}</td>
                        <td class="pb-0">
                        <ul>
                            @foreach($artista->albumes()->get() as $album)
                            <li>{{$album->Title }}</li>
                            @endforeach
                        </ul>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            {{ $artistas->links() }}

        </div>
@endsection