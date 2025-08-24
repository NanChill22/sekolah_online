<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'PPDB Online') }}</title>

    {{-- Bootstrap & FontAwesome --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f3f4f6;
            overflow-x: hidden;
        }

        /* Sidebar dengan gradient */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
            background: linear-gradient(180deg, #6a11cb, #2575fc);
            padding-top: 20px;
            color: #fff;
            transition: all 0.4s ease;
            box-shadow: 2px 0 10px rgba(0,0,0,0.2);
            z-index: 999;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar a {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: #e0e0e0;
            text-decoration: none;
            transition: 0.3s;
            white-space: nowrap;
        }

        .sidebar a:hover, .sidebar a.active {
            background: rgba(255,255,255,0.2);
            color: #fff;
            border-radius: 10px;
        }

        .sidebar .sidebar-brand {
            font-size: 1.3rem;
            font-weight: bold;
            color: #fff;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            transition: all 0.4s ease;
        }

        .sidebar.collapsed + .content {
            margin-left: 70px;
        }

        /* Tombol logout */
        .logout-btn {
            background: none;
            border: none;
            color: #e0e0e0;
            width: 100%;
            text-align: left;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logout-btn:hover {
            background: rgba(255,0,0,0.4);
            color: white;
            border-radius: 10px;
        }

        /* Tombol toggle */
        .toggle-btn {
            position: absolute;
            top: 15px;
            right: -20px;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #fff;
            border: 3px solid #f3f4f6;
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
        }

        .toggle-btn:hover {
            transform: rotate(90deg);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .sidebar.collapsed {
                width: 60px;
            }
            .content {
                margin-left: 200px;
            }
            .sidebar.collapsed + .content {
                margin-left: 60px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                position: fixed;
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .content {
                margin-left: 0 !important;
                padding: 20px;
            }
            .toggle-btn {
                right: 15px;
                top: 15px;
            }
        }
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
            <a href="{{ route('admin.pendaftaran') }}" class="{{ request()->routeIs('admin.pendaftaran') ? 'active' : '' }}">
                <i class="fa fa-users fa-fw"></i> <span class="sidebar-text">Data Pendaftaran</span>
            </a>
            <a href="{{ route('admin.pengumuman') }}" class="{{ request()->routeIs('admin.pengumuman') ? 'active' : '' }}">
                <i class="fa fa-bullhorn fa-fw"></i> <span class="sidebar-text">Pengumuman</span>
            </a>
        @endif

        {{-- MENU SISWA --}}
        @if(Auth::user()->role === 'siswa')
            <a href="{{ route('siswa.form') }}" class="{{ request()->routeIs('siswa.form') ? 'active' : '' }}">
                <i class="fa fa-file-alt fa-fw"></i> <span class="sidebar-text">Formulir</span>
            </a>
            <a href="{{ route('siswa.status') }}" class="{{ request()->routeIs('siswa.status') ? 'active' : '' }}">
                <i class="fa fa-info-circle fa-fw"></i> <span class="sidebar-text">Status</span>
            </a>
            <a href="{{ route('pengumuman') }}" class="{{ request()->routeIs('pengumuman') ? 'active' : '' }}">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggle-btn');
            const sidebarTexts = document.querySelectorAll('.sidebar-text');

            const toggleSidebar = () => {
                if(window.innerWidth <= 576) {
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
            }

            if (toggleBtn) {
                toggleBtn.addEventListener('click', toggleSidebar);
            }

            const savedState = localStorage.getItem('sidebarCollapsed') === 'true';
            if (savedState && window.innerWidth > 576) {
                sidebar.classList.add('collapsed');
            }
            updateSidebarText(savedState);
        });
    </script>
</body>
</html>
