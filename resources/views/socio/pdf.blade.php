<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Lista de socios </h2>

    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>
                                        
				<th>Nombre</th>
				<th>Ci</th>
				<th>Direccion</th>
				<th>Fnacimiento</th>
				<th>Fafiliacion</th>
				<th>Sexo</th>

             </tr>
        </thead>
        <tbody>
            @foreach ($socios as $socio)
                <tr>
                                            
					<td>{{ $socio->nombre }}</td>
					<td>{{ $socio->ci }}</td>
					<td>{{ $socio->direccion }}</td>
					<td>{{ $socio->fnacimiento }}</td>
					<td>{{ $socio->fafiliacion }}</td>
					<td>{{ $socio->sexo }}</td>

                </tr>
            @endforeach
        </tbody>
     </table>

</body>
</html>