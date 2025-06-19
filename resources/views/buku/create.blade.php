<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah buku</title>
</head>
<body>
    <h3>Tambah Buku</h3>
    <form action="/buku" method="post">
        @csrf
     
        <input type="text" name="judul" placeholder="Masukkan Judul" required> <br>
        <input type="number" name="harga" required> <br>
        <select name="kategori" required>
          <option>Pilih kategori</option>
          <option value="Self Improvement">Self Improvement</option>
          <option value="Bacaan">Bacaan</option>
          <option value="Teknologi">Teknologi</option>
        </select> <br>

        <button type="submit">Simpan</button>
        <button type="reset">Refresh</button>
    </form>
</body>
</html>