<h2>Bukti Pendaftaran</h2>
<p>Nama: {{ $data->nama }}</p>
<p>NISN: {{ $data->nisn }}</p>
<p>Alamat: {{ $data->alamat }}</p>
<p>Status: {{ $data->status }}</p>
<p>Dokumen: <a href="{{ asset('storage/' . $data->dokumen) }}" target="_blank">Lihat Dokumen</a></p>