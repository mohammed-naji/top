<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

    <table border="1">
        <tr>
            <th>Id</th>
            <th> اسم الزوجة </th>
            <th>اسم الزوج</th>
        </tr>
        @foreach ($insurances as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->wife }}</td>
            <td>{{ $item->user->name }}</td>
        </tr>
        @endforeach

    </table>

</body>
</html>
