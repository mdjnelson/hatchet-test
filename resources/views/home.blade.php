<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<table class="min-w-full text-left text-sm font-light">
    <thead class="border-b font-medium dark:border-neutral-500">
    <tr>
        <th scope="col" class="px-6 py-4">Name</th>
        <th scope="col" class="px-6 py-4">Price</th>
        <th scope="col" class="px-6 py-4">Offices</th>
        <th scope="col" class="px-6 py-4">Tables</th>
        <th scope="col" class="px-6 py-4">SQM</th>
    </tr>
    </thead>
    <tbody>
    @foreach($offices as $office)
        <tr class="border-b dark:border-neutral-500">
            <td class="whitespace-nowrap px-6 py-4">{{ $office['name'] }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $office['price'] }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $office['offices'] }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $office['tables'] }}</td>
            <td class="whitespace-nowrap px-6 py-4">{{ $office['sqm'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
