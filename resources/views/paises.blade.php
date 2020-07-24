<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase viernes 17 de julio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
</head>
<body>
    <h1>Listado de Paises</h1>
    <table class="table table-bordered" >
        <thead>
            <tr>
                <th>Pais</th>
                <th>Capital</th>
                <th>Moneda</th>
                <th>Población</th>
                <th>Ciudades</th>

            </tr>
        </thead>
        <tbody>
        <!-- recorro la tabla foreach blade-->
        @foreach($paises as $pais =>$infopais)
            <tr>
                <td rowspan="3">{{ $pais }}</td>
                <td rowspan="3">{{ $infopais["Capital"] }}</td>
                <td rowspan="3">{{ $infopais["Moneda"] }}</td>
                <td rowspan="3">{{ $infopais["Población"] }}</td>
                <td class="text-success">{{$infopais ["Ciudades" ][0]}}</td>
                <tr>
                    <td class="text-success">{{$infopais ["Ciudades" ][1]}}</td>
                </tr>
                <tr>
                    <td class="text-success">{{$infopais ["Ciudades" ][2]}}</td>
                </tr>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>