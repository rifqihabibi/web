<!DOCTYPE html
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Home Library Data Books</h1>

    <table id="customers">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Jumlah Halaman</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($book as $index => $book)
            <tr>
                <td>{{ $index + 1}}</td>
                <td>{{ $book->judul}}</td>
                <td>{{ $book->pengarang}}</td>
                <td>{{ $book->penerbit}}</td>
                <td>{{ $book->thn_terbit}}</td>
                <td>{{ $book->jml_halaman}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</head>

</html>