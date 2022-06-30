<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>Lista de vehiculos </h2>

    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>

				<th>Socio </th>                                      
				<th>Marca</th>
				<th>Matricula</th>
				<th>Modelo</th>
				<th>Ruat</th>
				<th>Estado</th>
				<th>Soat</th>

            </tr>
        </thead>
        <tbody>
             @foreach ($vehiculos as $vehiculo)
                 <tr>
					<td>{{ $vehiculo->socio->nombre }}</td>
					<td>{{ $vehiculo->marca }}</td>
					<td>{{ $vehiculo->matricula }}</td>
					<td>{{ $vehiculo->modelo }}</td>
					<td>{{ $vehiculo->ruat }}</td>
					<td>{{ $vehiculo->estado }}</td>
					<td>{{ $vehiculo->soat }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>