<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($barang && $kode)
    Menampilkan Promo untuk barang  <strong>{{ $barang }}</strong> dengan kode promo <strong>{{ $kode }}</strong>
    @elseif($barang)
    Menampilkan Promo untuk barang <strong>{{ $barang }}</strong>
    @else
    Silahkan input barang yang ingin dipromosikan
    @endif
</body>
</html>