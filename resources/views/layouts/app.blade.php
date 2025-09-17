<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'PPDB Online') }}</title>

  {{-- Bootstrap & FontAwesome --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <!-- FilePond CSS & JS -->
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>



  <style>
    body { font-family: 'Segoe UI', sans-serif; background-color: #f3f4f6; margin:0; overflow-x:hidden; }
    .sidebar { height:100vh; width:250px; position:fixed; left:0; top:0; background:linear-gradient(180deg,#6a11cb,#2575fc); padding-top:20px; color:#fff; transition:all 0.3s ease; box-shadow:2px 0 10px rgba(0,0,0,0.2); z-index:1050; }
    .sidebar.collapsed { width:70px; }
    .sidebar a { padding:12px 20px; display:flex; align-items:center; gap:15px; color:#e0e0e0; text-decoration:none; transition:0.3s; white-space:nowrap; }
    .sidebar a:hover, .sidebar a.active { background:rgba(255,255,255,0.2); color:#fff; border-radius:10px; }
    .sidebar .sidebar-brand { font-size:1.3rem; font-weight:bold; color:#fff; }
    .content { margin-left:250px; padding:30px; transition:all 0.3s ease; }
    .sidebar.collapsed + .content { margin-left:70px; }
    .logout-btn { background:none; border:none; color:#e0e0e0; width:100%; text-align:left; padding:12px 20px; display:flex; align-items:center; gap:15px; }
    .logout-btn:hover { background: rgba(255,0,0,0.4); color:white; border-radius:10px; }
    .toggle-btn { position:absolute; top:15px; right:-20px; background:linear-gradient(135deg,#6a11cb,#2575fc); border-radius:50%; width:40px; height:40px; display:flex; align-items:center; justify-content:center; cursor:pointer; color:#fff; border:3px solid #f3f4f6; box-shadow:0 4px 6px rgba(0,0,0,0.2); }
    @media (max-width:768px) { .sidebar { transform:translateX(-100%); } .sidebar.show { transform:translateX(0); } .content { margin-left:0 !important; } }

    .bg-purple { background-color: #6f42c1 !important; color: #fff; }
    .bg-teal { background-color: #20c997 !important; color: #fff; }
    .bg-orange { background-color: #fd7e14 !important; color: #fff; }


    /* Styling dropdown sidebar */
    .sidebar .dropdown-toggle::after { margin-left: auto; }
    .sidebar .dropdown-menu {
      background: rgba(0,0,0,0.85);
      border-radius: 8px;
      padding: 0.5rem 0;
    }
    .sidebar .dropdown-item {
      color: #e0e0e0;
      padding: 8px 20px;
    }
    .sidebar .dropdown-item:hover {
      background: rgba(255,255,255,0.2);
      color: #fff;
    }

    /* Animasi dropdown */
.fade-slide {
  animation: fadeSlide 0.3s ease forwards;
  transform-origin: top;
}

@keyframes fadeSlide {
  from {
    opacity: 0;
    transform: translateY(-10px) scale(0.95);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

/* Styling item */
.sidebar .dropdown-item {
  color: #e0e0e0;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  gap: 10px;
}
.sidebar .dropdown-item:hover {
  background: linear-gradient(90deg, #6a11cb, #2575fc);
  color: #fff;
  transform: translateX(5px);
  border-radius: 6px;
}
    /* FilePond custom */ 
    .filepond--root { width: 100%; }
    .filepond--drop-label { color: #6c757d; }
    .filepond--label-action { text-decoration: underline; cursor: pointer; }
    .filepond--panel-root { background-color: #f8f9fa; }


      /* Scrollable dropdown khusus sidebar */
  .sidebar .dropdown-menu {
    max-height: 300px;       /* batas tinggi */
    overflow-y: auto;        /* aktifkan scroll */
    scrollbar-width: thin;   /* Firefox */
    scrollbar-color: #6a11cb #1e1e2f;
  }

  /* Scrollbar custom untuk Chrome/Edge */
  .sidebar .dropdown-menu::-webkit-scrollbar {
    width: 6px;
  }
  .sidebar .dropdown-menu::-webkit-scrollbar-track {
    background: #1e1e2f;
    border-radius: 6px;
  }
  .sidebar .dropdown-menu::-webkit-scrollbar-thumb {
    background: linear-gradient(180deg, #6a11cb, #2575fc);
    border-radius: 6px;
  }
  .sidebar .dropdown-menu::-webkit-scrollbar-thumb:hover {
    background: #4a90e2;
  }


  <style>
.btn-purple {
  background-color: #6f42c1;
  color: #fff;
}
.btn-purple:hover { background-color: #5a32a3; color:#fff; }

.btn-teal {
  background-color: #20c997;
  color: #fff;
}
.btn-teal:hover { background-color: #199d7d; color:#fff; }

.btn-orange {
  background-color: #fd7e14;
  color: #fff;
}
.btn-orange:hover { background-color: #e96b0c; color:#fff; }


<style>
/* Gradient header elegan */
.bg-gradient-primary { background: linear-gradient(135deg, #1e3c72, #2a5298); }
.bg-gradient-success { background: linear-gradient(135deg, #11998e, #38ef7d); }
.bg-gradient-info    { background: linear-gradient(135deg, #2193b0, #6dd5ed); }
.bg-gradient-warning { background: linear-gradient(135deg, #f7971e, #ffd200); }
.bg-gradient-danger  { background: linear-gradient(135deg, #cb2d3e, #ef473a); }
.bg-gradient-secondary { background: linear-gradient(135deg, #757f9a, #d7dde8); }
.bg-gradient-dark    { background: linear-gradient(135deg, #232526, #414345); }
.bg-gradient-purple  { background: linear-gradient(135deg, #6a11cb, #2575fc); }
.bg-gradient-teal    { background: linear-gradient(135deg, #009688, #33d9b2); }
.bg-gradient-orange  { background: linear-gradient(135deg, #ff8008, #ffc837); }

/* Card animasi elegan */
.card {
    transition: all 0.3s ease-in-out;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 1rem 2rem rgba(0,0,0,.15);
}

/* Button custom */
.btn-purple { background-color:#6f42c1; color:#fff; }
.btn-teal   { background-color:#20c997; color:#fff; }
.btn-orange { background-color:#fd7e14; color:#fff; }

.btn-purple:hover { background-color:#5936a5; color:#fff; }
.btn-teal:hover   { background-color:#198d76; color:#fff; }
.btn-orange:hover { background-color:#e76e0f; color:#fff; }
</style>

</style>

  </style>
</head>
<body>
@auth
<div class="sidebar" id="sidebar">
  <a href="#" class="sidebar-brand d-flex justify-content-center align-items-center mb-3">
    <i class="fa fa-school fa-lg"></i>
    <span class="sidebar-text ms-2">PPDB Online</span>
  </a>

  <div class="toggle-btn" id="toggle-btn">
    <i class="fa fa-bars"></i>
  </div>

  {{-- MENU ADMIN --}}
  @if(Auth::user()->role === 'admin')
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <i class="fa fa-home fa-fw"></i> <span class="sidebar-text">Dashboard</span>
    </a>
    <a href="{{ route('admin.pendaftaran') }}" class="{{ request()->routeIs('admin.pendaftaran.*') ? 'active' : '' }}">
      <i class="fa fa-users fa-fw"></i> <span class="sidebar-text">Data Pendaftaran</span>
    </a>
    <a href="{{ route('admin.pengumuman.index') }}" class="{{ request()->routeIs('admin.pengumuman.*') ? 'active' : '' }}">
      <i class="fa fa-bullhorn fa-fw"></i> <span class="sidebar-text">Pengumuman</span>
    </a>
  @endif

  {{-- MENU SISWA --}}
  @if(Auth::user()->role === 'siswa')
    <a href="{{ route('siswa.dashboard') }}" class="{{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}">
      <i class="fa fa-home fa-fw"></i> <span class="sidebar-text">Dashboard</span>
    </a>

 {{-- Formulir Dropdown --}}
<div class="dropdown sidebar-dropdown">
  <a href="#" 
     class="d-flex align-items-center gap-2 sidebar-link dropdown-toggle {{ request()->routeIs('siswa.upload*') ? 'active' : '' }}" 
     data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa fa-file-alt fa-fw"></i>
    <span class="sidebar-text">Formulir</span>
  </a>
<ul class="dropdown-menu border-0 shadow fade-slide" style="margin-left:15px;">
    {{-- Upload Dokumen --}}
    <li class="dropdown-header text-muted">Upload Dokumen</li>
    <li><a class="dropdown-item" href="{{ route('siswa.create') }}"><i class="fa fa-edit"></i> Isi Formulir Pendaftaran</a></
    <li><a class="dropdown-item" href="{{ route('siswa.upload', 'ktp') }}"><i class="fa fa-id-card"></i> KTP / KIA</a></li>
    <li><a class="dropdown-item" href="{{ route('siswa.upload', 'kk') }}"><i class="fa fa-people-group"></i> Kartu Keluarga</a></li>
    <li><a class="dropdown-item" href="{{ route('siswa.upload', 'akta') }}"><i class="fa fa-baby"></i> Akta Kelahiran</a></li>
    <li><a class="dropdown-item" href="{{ route('siswa.upload', 'ijazah') }}"><i class="fa fa-graduation-cap"></i> Ijazah / SKL</a></li>
    <li><a class="dropdown-item" href="{{ route('siswa.upload', 'raport') }}"><i class="fa fa-book"></i> Raport (Opsional)</a></li>
    <li><a class="dropdown-item" href="{{ route('siswa.upload', 'surat_sehat') }}"><i class="fa fa-hospital"></i> Surat Keterangan Sehat</a></li>
    <li><a class="dropdown-item" href="{{ route('siswa.upload', 'kip') }}"><i class="fa fa-credit-card"></i> KIP / Beasiswa (Opsional)</a></li>
    <li><a class="dropdown-item" href="{{ route('siswa.upload', 'sertifikat') }}"><i class="fa fa-trophy"></i> Sertifikat / Prestasi</a></li>
    <li><a class="dropdown-item" href="{{ route('siswa.upload', 'foto') }}"><i class="fa fa-image"></i> Pas Foto Resmi</a></li>
    <li><a class="dropdown-item" href="{{ route('siswa.upload', 'domisili') }}"><i class="fa fa-house"></i> Foto Rumah / Domisili</a></li>
    <li><hr class="dropdown-divider"></li>

    {{-- Lihat Dokumen --}}
    <li>
      <a class="dropdown-item text-success fw-bold" href="{{ route('siswa.upload.index') }}">
        <i class="fa fa-folder-open"></i> Lihat Dokumen yang Diupload
      </a>
    </li>
</ul>
</div>
    <a href="{{ route('siswa.dokumen.index') }}" class="{{ request()->routeIs('siswa.dokumen.index') ? 'active' : '' }}">
      <i class="fa fa-folder-open fa-fw"></i> <span class="sidebar-text">Dokumen Saya</span>

    <a href="{{ route('siswa.status') }}" class="{{ request()->routeIs('siswa.status') ? 'active' : '' }}">
      <i class="fa fa-info-circle fa-fw"></i> <span class="sidebar-text">Status</span>
    </a>
    <a href="{{ route('siswa.pengumuman') }}" class="{{ request()->routeIs('siswa.pengumuman') ? 'active' : '' }}">
      <i class="fa fa-bullhorn fa-fw"></i> <span class="sidebar-text">Pengumuman</span>
    </a>
    
  @endif

  {{-- LOGOUT --}}
  <div class="mt-auto p-2">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-btn">
        <i class="fa fa-sign-out-alt fa-fw"></i> <span class="sidebar-text">Logout</span>
      </button>
    </form>
  </div>
</div>
@endauth

<main class="content" id="content">
  @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const sidebar = document.getElementById('sidebar');
  const toggleBtn = document.getElementById('toggle-btn');
  const sidebarTexts = document.querySelectorAll('.sidebar-text');

  const toggleSidebar = () => {
    if(window.innerWidth <= 768){
      sidebar.classList.toggle('show');
    } else {
      sidebar.classList.toggle('collapsed');
      const isCollapsed = sidebar.classList.contains('collapsed');
      localStorage.setItem('sidebarCollapsed', isCollapsed);
      updateSidebarText(isCollapsed);
    }
  };

  const updateSidebarText = (isCollapsed) => {
    sidebarTexts.forEach(el => {
      el.style.display = isCollapsed ? 'none' : 'inline';
    });
  };

  if(toggleBtn){
    toggleBtn.addEventListener('click', toggleSidebar);
  }

  const savedState = localStorage.getItem('sidebarCollapsed') === 'true';
  if (savedState && window.innerWidth > 768) {
    sidebar.classList.add('collapsed');
  }
  updateSidebarText(savedState);
});
</script>
</body>
</html>
