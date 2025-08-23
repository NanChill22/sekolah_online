<h2>Form Pendaftaran PPDB</h2>
<form method="POST" action="{{ route('siswa.store') }}" enctype="multipart/form-data">
    @csrf
    <label>Nama</label>
    <input type="text" name="nama"><br>
    <label>NISN</label>
    <input type="text" name="nisn"><br>
    <label>Alamat</label>
    <input type="text" name="alamat"><br>
    <label>Dokumen</label>
    <input type="file" name="dokumen"><br>
    <button type="submit">Kirim</button>
</form>
