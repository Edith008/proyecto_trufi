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
    <center>Reporte de Usuarios</center>
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
				<th>Email</th>
				<th>Rol</th>
                
             </tr>
        </thead>
        <tbody>
        {{ $i = 0 }}

            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ ++$i }}</td>    
                
					<td>{{ $usuario->name }}</td>
					<td>{{ $usuario->email }}</td>
					<td>{{ $usuario->roles->nombre }}</td>
                
                </tr>
            @endforeach
        </tbody>
     </table>

</body>
</html>