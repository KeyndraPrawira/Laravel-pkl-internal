<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
</head>
<body>
    ID : {{ $buku['id'] }} <br>
    Judul : {{ $buku['judul'] }} <br>
    Harga : Rp{{ number_format($buku['harga'], 0, 2,'.' )  }} <br>
    Kategori : {{ $buku['kategori'] }} <br>
</body>
</html>