<!DOCTYPE html>
<html>
<head>
  <title>Form Pendaftaran PPDB</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <h2>Form Pendaftaran PPDB</h2>
  <form action="/pendaftaran" method="POST" enctype="multipart/form-data">
    @csrf
    <label>Nama:</label><br>
    <input type="text" name="nama" required><br>
    <label>NISN:</label><br>
    <input type="text" name="nisn" required><br>
    <label>Alamat:</label><br>
    <input type="text" name="alamat" required><br>
    <label>Upload Dokumen:</label><br>
    <input type="file" name="dokumen"><br><br>
    <button type="submit">Kirim</button>
  </form>
</body>
</html>
