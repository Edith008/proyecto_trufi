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
    <center>Reporte de Trufis</center>
</h2>
<h4>Reporte generado en fecha {{$fecha}} , a horas {{$hora}},
     a cargo del usuario {{ Auth::user()->name }}.
</h4>

    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                <th>N°</th>

				<th>Interno</th>
				<th>Chofer</th>
				<th>Vehiculo</th>
				<th>Gruporuta</th>

            </tr>
        </thead>
        <tbody>
        {{ $i = 0 }}
            @foreach ($trufis as $trufi)
                <tr>
                <td>{{ ++$i }}</td> 

					<td>Interno {{ $trufi->id }}</td>
					<td>{{ $trufi->chofere->nombre }}</td>
					<td>{{ $trufi->vehiculo->matricula }}</td>
					<td>{{ $trufi->gruporuta->nombre }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>