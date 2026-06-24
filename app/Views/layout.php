<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title><?= $title ?? 'Meal Voucher System' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="manifest" href="/manifest.json">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Meal Voucher">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#1a365d">
    <meta name="msapplication-navbutton-color" content="#1a365d">
    <meta name="msapplication-TileColor" content="#1a365d">
    <meta name="application-name" content="Meal Voucher">

    <link rel="apple-touch-icon" href="/icon-192x192.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/icon-180x180.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/icon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/icon-16x16.png">

    <script src="/js/pwa.js"></script>

    <style>
        /* Kod * { margin: 0; padding: 0; } TELAH DIBUANG DARI SINI UNTUK MEMBAIKI GRID BOOTSTRAP */

        body {
            background-color: #f4f7f6; /* Light Slate-Grey */
            color: #2d3748; /* Charcoal Grey */
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            padding: 24px 0;
        }

        /* Card Styles - Flat Card Design */
        .card-modern, .card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 4px 6px 1px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* Standardized Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 16px;
            transition: all 0.3s ease;
            box-shadow: none !important;
        }

        .btn-primary {
            background-color: #1a365d; /* Deep Corporate Navy */
            border-color: #1a365d;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #3182ce; /* Electric Blue Accent */
            border-color: #3182ce;
        }

        .btn-success {
            background-color: #00a3c4; /* Cyan Accent */
            border-color: #00a3c4;
            color: #ffffff;
        }

        .btn-success:hover {
            background-color: #008eb0;
            border-color: #008eb0;
        }

        /* Form Styles */
        .form-modern {
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 12px 16px;
            transition: all 0.3s ease;
            font-size: 16px;
            color: #2d3748;
        }

        .form-modern:focus {
            border-color: #3182ce;
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.15);
            outline: none;
        }

        .form-label {
            color: #1a365d;
            margin-bottom: 0.5rem; /* Menambahkan sedikit jarak antara label dan input */
        }

        /* Navbar */
        .navbar-custom {
            background: #1a365d; /* Corporate Navy Sidebar/Top Nav */
            border-radius: 8px;
            padding: 16px 24px;
            margin-bottom: 32px;
            box-shadow: 0 4px 6px 1px rgba(0, 0, 0, 0.05);
        }
        
        .navbar-custom .text-primary {
            color: #00a3c4 !important; /* Cyan icon on navy bg */
        }
        
        .navbar-custom strong, .navbar-custom .btn-light {
            color: #ffffff;
        }

        .navbar-custom .btn-light {
            background: rgba(255, 255, 255, 0.1);
            border: none;
        }

        .navbar-custom .btn-light:hover {
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
        }

        /* Animation */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in-up {
            animation: fadeInUp 0.4s ease-out;
        }

        @media (max-width: 768px) {
            body { padding: 16px; }
            .card-modern { margin: 0; }
        }
    </style>
</head>
<body>

<div class="container">
    <?php if(session()->get('username')): ?>
    <nav class="navbar-custom mb-4 fade-in-up">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <i class="fas fa-shield-alt fa-lg text-primary me-3"></i> 
                <strong>Meal Voucher System</strong>
            </div>
            <div class="dropdown">
                <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle"></i> <?= session()->get('username') ?> 
                    <span class="badge bg-secondary ms-1" style="background-color: #3182ce !important;"><?= session()->get('role') ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="border-radius: 8px; border: 1px solid #e2e8f0;">
                    <li><a class="dropdown-item text-danger" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(session()->getFlashdata('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '<?= session()->getFlashdata('success') ?>',
        confirmButtonColor: '#1a365d',
        timer: 3000,
        showConfirmButton: true
    });
</script>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '<?= session()->getFlashdata('error') ?>',
        confirmButtonColor: '#e53e3e'
    });
</script>
<?php endif; ?>

</body>
</html>