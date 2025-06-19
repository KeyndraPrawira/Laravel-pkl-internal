<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah buku</title>
</head>
<body>
    <h3>Edit Buku</h3>
    <form action="/buku/{{ $buku['id'] }}" method="POST">
    @csrf
     @method('PUT')
        <input type="text" name="judul" value="{{ $buku['judul'] }}" required> <br>
        <input type="number" name="harga" required value="{{ $buku['harga'] }}"> <br>
        <select name="kategori" required>
          <option>Pilih kategori</option>
          <option value="Self Improvement" {{ $buku['kategori']=='Self Improvement' ? 'selected' : '' }}>Self Improvement</option>
          <option value="Bacaan" {{ $buku['kategori']=='Bacaan' ? 'selected' : '' }}>Bacaan</option>
          <option value="Teknologi" {{ $buku['kategori']=='Teknologi' ? 'selected' : '' }}>Teknologi</option>
        </select> <br>

        <button type="submit">Simpan</button>
        <button type="reset">Refresh</button>
    </form>
</body>
</html>