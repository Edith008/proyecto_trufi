<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>
    <center>- Asociacion de Trufi 27 de Marzo -</center>
</h2>
<h2>
    <center>Reporte de Multas</center>
</h2>
<h4>Reporte generado en fecha {{$fecha}} , a horas {{$hora}},
     a cargo del usuario {{ Auth::user()->name }}.
</h4>

    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>N°</th>
                <th>Razon</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Socio</th>
                <th>Registrado por</th>

            </tr>
        </thead>
            <tbody>
            {{ $i = 0 }}
                @foreach ($multas as $multa)
                    <tr>

                    <td>{{ ++$i }}</td>  
                                                
                    <td>{{ $multa->razon }}</td>
                    <td>{{ $multa->fecha }}</td>
                    <td>{{ $multa->monto }}</td>
                    <td>{{ $multa->estado }}</td>
                    <td>{{ $multa->socios->nombre }}</td>
                    <td>{{ $multa->empleado }}</td>

                    </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>