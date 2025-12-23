<!-- app/Views/layout/template.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'SIMAK' ?> - Sistem Manajemen Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --success-color: #1cc88a;
            --info-color: #36b9cc;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --sidebar-bg: #2c3e50;
            --sidebar-hover: #34495e;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fc;
        }
        
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, #1a252f 100%);
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .sidebar .nav-link:hover {
            background: var(--sidebar-hover);
            color: white;
        }
        
        .sidebar .nav-link.active {
            background: var(--primary-color);
            color: white;
        }
        
        .sidebar .nav-link i {
            width: 25px;
            margin-right: 10px;
        }
        
        .logo-area {
            position: relative;
            padding: 22px 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        
        .logo-area h4 {
            color: white;
            margin: 0;
            font-weight: 600;
        }
        
        .logo-area .subtitle {
            color: rgba(255,255,255,0.6);
            font-size: 0.85rem;
        }
        
        .stat-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        
        .stat-card .card-body {
            padding: 25px;
        }
        
        .stat-icon {
            font-size: 3rem;
            opacity: 0.2;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
        }
        
        .navbar-top {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .table-custom {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .btn-custom {
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 500;
        }

        /* Sidebar collapse styles */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, #1a252f 100%);
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            transition: flex-basis 0.3s ease, max-width 0.3s ease, width 0.3s ease;
            flex: 0 0 220px;
            max-width: 220px;
        }
        .sidebar.collapsed {
            flex: 0 0 70px;
            max-width: 70px;
        }
        .sidebar .nav-link { display: flex; align-items: center; transition: all 0.18s ease; }
        .sidebar .nav-link .label {
            transition: opacity 0.18s linear, width 0.18s linear, margin 0.18s linear;
            opacity: 1;
            margin-left: 10px;
            white-space: nowrap;
        }
        .sidebar .nav-link i { width: 25px; margin-right: 10px; text-align: center; }

        /* Collapsed state tweaks */
        .sidebar.collapsed .nav-link { justify-content: center; padding: 10px 6px; margin: 6px 6px;}
        .sidebar.collapsed .nav-link .label { opacity: 0; width: 0; margin-left: 0; overflow: hidden;}
        .sidebar.collapsed .nav-link i { margin-right: 0; width: auto; font-size: 1.15rem; }
        .sidebar.collapsed .nav-link:hover { transform: none; background: rgba(239, 230, 230, 0.1); color: black; }

        .sidebar .logo-area .brand-icon { font-size: 2.2rem; }
        .sidebar.collapsed .logo-area h4,
        .sidebar.collapsed .logo-area .subtitle { display: none; }
        #sidebarToggle { 
            position: absolute; 
            top: 12px; 
            right: 12px; 
            z-index: 60; 
            border-radius: 6px; 
            padding: 6px 8px; 
            opacity: 0.95; 
            border: 1px solid rgba(255,255,255,0.08); 
            width: 36px; 
            height: 36px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            background: transparent; 
            color: white;
            transition: right 0.18s ease, transform 0.18s ease; }
        /* When collapsed: place the toggle just outside the right edge of the sidebar */
        .sidebar.collapsed #sidebarToggle { 
            right: -50px; 
            left: auto; 
            transform: none; 
            top: 12px;
            width: 36px; 
            height: 36px; 
            padding: 6px; 
            color: black;
            box-shadow: 0 4px 12px rgba(0,0,0,0.12); }
        /* Prevent brand icon / text from being covered by the outside button */
        .sidebar.collapsed .logo-area { padding-right: 34px; }
        .sidebar.collapsed .brand-icon { font-size: 1.6rem; margin-top: 6px; }

        /* Reduce visual noise on very small screens */
        @media (max-width: 576px) {
            .sidebar.collapsed .nav-link { padding: 8px 4px; }
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-md-block sidebar">
                <div class="logo-area">
                    <i class="fas fa-graduation-cap fa-3x text-white mb-2 brand-icon"></i>
                    <h4>SIMAK</h4>
                    <p class="subtitle">Sistem Manajemen Mahasiswa</p>
                    <button id="sidebarToggle" class="btn btn-sm btn-outline-light" aria-label="Toggle sidebar">
                        <i class="fas fa-angle-double-left"></i>
                    </button>
                </div>
                
                <div class="pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>" title="Dashboard">
                                <i class="fas fa-tachometer-alt"></i><span class="label"> Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= strpos(uri_string(), 'mahasiswa') !== false ? 'active' : '' ?>" href="<?= base_url('mahasiswa') ?>" title="Mahasiswa">
                                <i class="fas fa-user-graduate"></i><span class="label"> Mahasiswa</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= strpos(uri_string(), 'matakuliah') !== false ? 'active' : '' ?>" href="<?= base_url('matakuliah') ?>" title="Mata Kuliah">
                                <i class="fas fa-book"></i><span class="label"> Mata Kuliah</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= (strpos(uri_string(), 'nilai') !== false && strpos(uri_string(), 'laporan') === false) ? 'active' : '' ?>" href="<?= base_url('nilai') ?>" title="Nilai">
                                <i class="fas fa-chart-line"></i><span class="label"> Nilai</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= strpos(uri_string(), 'laporan') !== false ? 'active' : '' ?>" href="<?= base_url('nilai/laporan') ?>" title="Laporan">
                                <i class="fas fa-file-alt"></i><span class="label"> Laporan</span>
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link text-danger" href="<?= base_url('logout') ?>" title="Logout">
                                <i class="fas fa-sign-out-alt"></i><span class="label"> Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4">
                <!-- Top Navbar -->
                <nav class="navbar navbar-top navbar-expand-lg navbar-light mb-4 mt-3 px-3">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1">
                            <i class="fas fa-bars me-2"></i> <?= $title ?? 'Dashboard' ?>
                        </span>
                        <div class="d-flex align-items-center">
                            <span class="me-3 text-muted">
                                <i class="fas fa-user-circle me-2"></i>
                                <?= session()->get('username') ?>
                            </span>
                        </div>
                    </div>
                </nav>
                
                <!-- Alert Messages -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>
                
                <!-- Page Content -->
                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (function(){
            const sidebar = document.querySelector('.sidebar');
            const toggle = document.getElementById('sidebarToggle');
            if (!sidebar || !toggle) return;
            const icon = toggle.querySelector('i');

            function setCollapsed(collapsed){
                if (collapsed) {
                    sidebar.classList.add('collapsed');
                    icon.classList.remove('fa-angle-double-left');
                    icon.classList.add('fa-angle-double-right');
                } else {
                    sidebar.classList.remove('collapsed');
                    icon.classList.remove('fa-angle-double-right');
                    icon.classList.add('fa-angle-double-left');
                }
                try { localStorage.setItem('sidebarCollapsed', collapsed ? '1' : '0'); } catch(e){}
            }

            toggle.addEventListener('click', function(e){
                e.preventDefault();
                setCollapsed(!sidebar.classList.contains('collapsed'));
            });

            // Initialize from localStorage
            try {
                const saved = localStorage.getItem('sidebarCollapsed');
                if (saved === '1') setCollapsed(true);
            } catch(e){}

            // Optional: close sidebar when clicking outside on small screens
            document.addEventListener('click', function(e){
                if (window.innerWidth <= 991 && !sidebar.contains(e.target) && !toggle.contains(e.target)) {
                    setCollapsed(true);
                }
            });
        })();
    </script>
</body>
</html>