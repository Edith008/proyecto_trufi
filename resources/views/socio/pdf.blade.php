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
    <center>Reporte de Socios</center>
</h2>

<h4>Reporte generado en fecha: {{$fecha}} <br> 
    hora: {{$hora}} <br>
    usuario: {{ Auth::user()->name }}
</h4>

    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                
                <th>N°</th>
                                        
				<th>Nombre</th>
				<th>Ci</th>
				<th>Direccion</th>
				<th>Fecha Nacimiento</th>
				<th>Edad</th>
				<th>Fecha Afiliacion</th>
				<th>Sexo</th>
				<th>Telefono</th>
                
             </tr>
        </thead>
        <tbody>
        {{ $i = 0 }}

            @foreach ($socios as $socio)
                <tr>
                    <td>{{ ++$i }}</td>    
                
					<td>{{ $socio->nombre }}</td>
					<td>{{ $socio->ci }}</td>
					<td>{{ $socio->direccion }}</td>
					<td>{{ $socio->fnacimiento}}</td>
					<td>{{ \Carbon\Carbon::parse($socio->fnacimiento)->age }}</td>
					<td>{{ $socio->fafiliacion }}</td>
					<td>{{ $socio->sexo }}</td>
					<td>{{ $socio->telefono }}</td>
                
                </tr>
            @endforeach
        </tbody>
     </table>

</body>
</html>