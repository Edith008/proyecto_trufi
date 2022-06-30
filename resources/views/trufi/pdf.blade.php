<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<h2>Lista de Trufis </h2>

    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>

				<th>Chofer Id</th>
				<th>Vehiculo Id</th>
				<th>Gruporuta Id</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($trufis as $trufi)
                <tr>

					<td>{{ $trufi->chofere->nombre }}</td>
					<td>{{ $trufi->vehiculo->matricula }}</td>
					<td>{{ $trufi->gruporuta->nombre }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>