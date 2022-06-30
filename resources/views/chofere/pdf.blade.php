<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- 
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
-->  
</head>
<body>

    <h2>Lista de choferes </h2>

    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr> 
				<th>Nombre</th>
				<th>Ci</th>
                <th>Licencia</th>
                <th>Direccion</th>
<!--
                <th>No</th>
				<th>Direccion</th>
                <th>Fecha Nacimiento</th>
				<th>Fecha Afiliacion</th>
				<th>Sexo</th>
			    <th>Garantia</th>
-->                                   
            </tr>
       </thead>
       <tbody>
            @foreach ($choferes as $chofere)
               <tr>
				    <td>{{ $chofere->nombre }}</td>
					<td>{{ $chofere->ci }}</td>
<!--
					<td>{{ $chofere->direccion }}</td>
					<td>{{ $chofere->fnacimiento }}</td>
					<td>{{ $chofere->fafiliacion }}</td>
					<td>{{ $chofere->sexo }}</td>
					<td>{{ $chofere->garantia }}</td>
-->
					<td>{{ $chofere->licencia }}</td>
                    <td>{{ $chofere->direccion }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
