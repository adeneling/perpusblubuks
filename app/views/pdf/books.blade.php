<!DOCTYPE html>
<html>
<head>
    <title>Data Buku Larapus</title>
    <link rel="stylesheet" href="{{ asset('packages/uikit/css/uikit.almost-flat.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
</head>
<body>
    <h1>Data Buku Larapus</h1>
    <hr>
    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <td>Judul</td>
                <td>Jumlah</td>
                <td>Stok</td>
                <td>Penulis</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->amount }}</td>
                <td>{{ $book->stock }}</td>
                <td>{{ $book->author->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>