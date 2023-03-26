<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<table class="table-auto">
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Offices</th>
        <th>Tables</th>
        <th>SQM</th>
    </tr>
    </thead>
    <tbody>
    @foreach($offices as $office)
        <tr>
            <td>{{ $office['name'] }}</td>
            <td>{{ $office['price'] }}</td>
            <td>{{ $office['offices'] }}</td>
            <td>{{ $office['tables'] }}</td>
            <td>{{ $office['sqm'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
