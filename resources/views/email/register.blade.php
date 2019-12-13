<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Pendaftaran Anda</title>
</head>

<body>
    <h2>Hai, {{ $customer->name }}</h2>
    <p>Terima kasih telah melakukan transaksi pada <b>NandoShop</b></p>
    <p>Selanjutnya silahkan login <a href="{{ route('customer.login') }}">DISINI</a></p>
</body>

</html>