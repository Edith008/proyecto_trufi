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
    <center>Reporte del Servicio de Transporte</center>
</h2>
<h4>Reporte generado en fecha {{$fecha}} , a horas {{$hora}},
     a cargo del usuario {{ Auth::user()->name }}.
</h4>

    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                
                <th>N°</th>
                                        
				<th>INTERNO</th>
				<th>CHOFER</th>
				<th>SALIDA</th>
				<th>LLEGADA</th>
				<th>FECHA</th>
				<th>OBSERVACIONES</th>
                
             </tr>
        </thead>
        <tbody>
        {{ $i = 0 }}

            @foreach ($servicios as $servicio)
                <tr>
                    <td>{{ ++$i }}</td>    
                
					<td>Interno {{ $servicio->trufi->id}}</td>
					<td>{{ $servicio->trufi->chofere->nombre}}</td>
					<td>{{ $servicio->hsalida }}</td>
					<td>{{ $servicio->hllegada }}</td>
					<td>{{ $servicio->fecha }}</td>
					<td>{{ $servicio->observacion }}</td>
                
                </tr>
            @endforeach
        </tbody>
     </table>

</body>
</html>