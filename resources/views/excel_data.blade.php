<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Data produk</title>
</head>

<body>
    <div class="container">
        <div class="table-responsive mt-4">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Created At</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($product as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            <strong>{{ $row->name }}</strong><br>
                            <label>Kategori: <span>{{ $row->category->name }}</span></label><br>
                            <label>Berat: <span>{{ $row->weight }} gr</span></label>
                        </td>
                        <td>Rp {{ number_format($row->price) }}</td>
                        <td>{{ $row->created_at->format('d-m-Y') }}</td>
                        <td>{!! $row->status_label !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>