<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <title>Employee Information</title>
    <style>
        *, *:before, *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: #384047;
        }

        table {
            max-width: 960px;
            /* margin: 10px auto; */
        }

        caption {
            font-size: 1.6em;
            font-weight: 400;
            padding: 10px 0;
        }

        thead th {
            font-weight: 400;
            background: #8a97a0;
            color: #FFF;
        }

        tr {
            background: #f4f7f8;
            border-bottom: 1px solid #FFF;
            margin-bottom: 5px;
        }

        tr:nth-child(even) {
            background: #e8eeef;
        }

        th, td {
            text-align: left;
            padding: 20px;
            font-weight: 300;
        }

        tfoot tr {
            background: none;
        }

        tfoot td {
            padding: 10px 2px;
            font-size: 0.8em;
            font-style: italic;
            color: #8a97a0;
        }
    </style>
</head>
<body>

<table>
    <caption>Reporte de usuarios</caption>
    <thead>
    <tr>
        <th scope="col">País</th>
        <th scope="col">Total por cada país</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="3">Datos generados al registrarse un usuario.
        </td>
    </tr>

    </tfoot>

    <tbody>
        @foreach($report as $item)
            <tr>
                <td>{{ $item['country'] }}</td>
                <td>{{ $item['total'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
