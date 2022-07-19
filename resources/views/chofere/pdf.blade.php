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
    <center>Reporte de Choferes</center>
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
				<th>Fecha Afiliacion</th>
				<th>Sexo</th>
				<th>Licencia</th>
				<th>Telefono</th>
                
             </tr>
        </thead>
        <tbody>
        {{ $i = 0 }}

            @foreach ($choferes as $chofere)
                <tr>
                    <td>{{ ++$i }}</td>    
                
					<td>{{ $chofere->nombre }}</td>
					<td>{{ $chofere->ci }}</td>
					<td>{{ $chofere->direccion }}</td>
					<td>{{ $chofere->fnacimiento}}</td>
					<td>{{ $chofere->fafiliacion }}</td>
					<td>{{ $chofere->sexo }}</td>
					<td>{{ $chofere->licencia }}</td>
					<td>{{ $chofere->telefono }}</td>
                
                </tr>
            @endforeach
        </tbody>
     </table>

</body>
</html>
