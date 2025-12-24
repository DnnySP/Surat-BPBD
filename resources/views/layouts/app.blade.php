<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Surat BPBD</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background: linear-gradient(135deg, #1a6fc4 0%, #0d47a1 100%);
        }
        .card-header {
            background: linear-gradient(135deg, #1a6fc4 0%, #0d47a1 100%);
            color: white;
        }
        .badge-masuk {
            background-color: #28a745;
        }
        .badge-keluar {
            background-color: #dc3545;
        }
        .sidebar {
            min-height: calc(100vh - 56px);
            background-color: #343a40;
        }
        .sidebar .nav-link {
            color: #adb5bd;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: #495057;
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: #0d6efd;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ route('surat.index') }}">
                <i class="fas fa-envelope me-2"></i>Aplikasi Surat BPBD
            </a>
            <div class="navbar-text">
                <i class="fas fa-calendar-alt me-1"></i> {{ date('d F Y') }}
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-2 sidebar d-md-block p-0">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('surat.index') ? 'active' : '' }}" href="{{ route('surat.index') }}">
                                <i class="fas fa-list me-2"></i> Daftar Surat
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('surat.create') ? 'active' : '' }}" href="{{ route('surat.create') }}">
                                <i class="fas fa-plus me-2"></i> Tambah Surat
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('surat.laporan') ? 'active' : '' }}" href="{{ route('surat.laporan') }}">
                                <i class="fas fa-chart-bar me-2"></i> Laporan
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 col-lg-10 ms-sm-auto px-4 py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('scripts')
</body>
</html>