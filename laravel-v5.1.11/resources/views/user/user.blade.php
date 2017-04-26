<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
        table.tableizer-table {
            font-size: 20px;
            border: 1px solid #CCC;
            font-family: Arial, Helvetica, sans-serif;
        }

        .tableizer-table td {
            padding: 4px;
            margin: 3px;
            border: 1px solid #CCC;
        }

        .tableizer-table th {
            background-color: #104E8B;
            color: #FFF;
            font-weight: bold;
        }
    </style>
    <title>Document</title>
</head>
<body>

<table class="tableizer-table">
    <tr>
        <td>name</td>
        <td>{{$name}}</td>
    </tr>
    <tr>
        <td>age</td>
        <td>{{$age}}</td>
    </tr>
    <tr>
        <td>city</td>
        <td>{{$city}}</td>
    </tr>
</table>
</body>
</html>