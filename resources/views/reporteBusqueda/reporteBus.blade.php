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
<a href="{{url('reports/pdf') }}">Download PDF </a>
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
                  
    </table>

    
</body>
</html>