<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>

        th {
            background-color: #1069af;
            color: white;
        }

        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }
        td {
            color: #5b5659;
        }
    </style>
</head>
<body>
<h2 class="h2 text-center text-primary">Reporte Consulta</h2>

<table class="table">
        <thead>
        <th>Numero</th>
        <th>Titulo</th>
        <th>Autor</th>
        <th>Tutor</th>
        <th>Carrera</th>
        <th>Modalidad</th>
        </thead>  
//BORRAR ESTA WEA
        @foreach($proyectos as $proyecto)
            <tbody>
            <td><span class="text-primary">{{$proyecto->project_number}}</span></td>
            <td>{{$proyecto->titulo}}</td>
            <td>{{$proyecto->author}}</td>
            <td>{{$proyecto->tutor_data}}</td>
            <td>{{$proyecto->namecarre}}</td>
            <td>{{$proyecto->namemodal}}</td>
            </tbody>
        @endforeach
        
    </table>
   
</body>
</html>