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
    <center>Reporte de Empleados</center>
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
				<th>Registrado Por</th>
				<th>Ci</th>
				<th>Direccion</th>
				<th>Fecha Nacimiento</th>
				<th>Fecha Afiliacion</th>
				<th>Sexo</th>
				<th>Cargo</th>
				<th>Teléfono</th>
                
             </tr>
        </thead>
        <tbody>
        {{ $i = 0 }}

            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ ++$i }}</td>    
                
					<td>{{ $empleado->user->name }}</td>
					<td>{{ $empleado->registrado_por }}</td>
					<td>{{ $empleado->ci }}</td>
					<td>{{ $empleado->direccion }}</td>
					<td>{{ $empleado->fnacimiento }}</td>
					<td>{{ $empleado->fafiliacion }}</td>
					<td>{{ $empleado->sexo }}</td>
					<td>{{ $empleado->cargo }}</td>
					<td>{{ $empleado->telefono }}</td>
                
                </tr>
            @endforeach
        </tbody>
     </table>

</body>
</html>