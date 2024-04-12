<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Details</title>
</head>
<body>
    <div class="container">
        <h1>Список новостей</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Дата</th>
                <th>URL</th>
                <th>Название новости</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($entities as $entity)
                <tr>
                    <td>{{ $entity['id'] }}</td>
                    <td>{{ $entity['date'] }}</td>
                    <td><a href="{{ $entity['url'] }}">{{ $entity['url'] }}</a></td>
                    <td>{{ $entity['title'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Новостей пока нет.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
