<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitacora</title>

</head>
<body>

<h2>Asociacion de Trufi 27 de Marzo - Bitacora </h2>

<h4>Reporte generado en fecha: {{$fecha}} <br> 
    hora: {{$hora}} <br>
    usuario: {{ Auth::user()->name }}
</h4>

    <table class="table table-striped table-hover">
        <thead class="thead">
        
            <tr>
                <th>N°</th>

                <th>Detalle</th>
				<th>Hora</th>
				<th>Fecha</th>
				<th>Usuario</th>

             </tr>
        </thead>
        <tbody>
        {{ $i = 0 }}
            @foreach (array_reverse(iterator_to_array($bitacoras)) as $bitacora)
                <tr>
                    <td>{{ ++$i }}</td>

					<td>{{ $bitacora->detalle }}</td>
					<td>{{ $bitacora->hora }}</td>
					<td>{{ $bitacora->fecha }}</td>
					<td>{{ $bitacora->user->name }}</td>

                </tr>
            @endforeach
        </tbody>
     </table>

</body>
</html>