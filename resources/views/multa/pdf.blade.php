<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>Lista de multas </h2>

    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>Razon</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Estado</th>
                <th>Socio</th>
                <th>Registrado por</th>

            </tr>
        </thead>
            <tbody>
                @foreach ($multas as $multa)
                    <tr>
                                                
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