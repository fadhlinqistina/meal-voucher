<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Meal Voucher System' ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#1a365d">
    <link rel="icon" type="image/png" href="/images/system-logo.png">

    <style>
        html, body {
            margin: 0 !important;
            padding: 0 !important;
            min-height: 100vh !important;
            width: 100% !important;
            font-family: 'Inter', sans-serif !important;
            background: linear-gradient(135deg, #0f2027 0%, #203a43 50%, #2c5364 100%) !important;
            background-attachment: fixed !important;
        }

        .main-wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: 100%;
            padding: 20px 20px;
            max-width: 100% !important;
        }

        /* Make container fluid */
        .container {
            max-width: 100% !important;
            padding-left: 20px !important;
            padding-right: 20px !important;
            margin: 0 !important;
        }

        /* Card Styles */
        .card-modern {
            background: rgba(255, 255, 255, 0.98) !important;
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Button Styles */
        .btn-gradient-primary {
            background: linear-gradient(135deg, #1a365d 0%, #2b6cb0 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px;
            border-radius: 10px;
        }
        
        .btn-gradient-success {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px;
            border-radius: 10px;
        }

        .btn-gradient-danger {
            background: linear-gradient(135deg, #dc2626 0%, #f87171 100%);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px;
            border-radius: 10px;
        }

        /* Form Styles */
        .form-modern {
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 16px;
            background-color: #fff;
            width: 100%;
            display: block;
        }

        .form-modern:focus {
            border-color: #2b6cb0;
            box-shadow: 0 0 0 4px rgba(43, 108, 176, 0.2);
            outline: none;
        }

        /* Navbar Customization */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 16px;
            padding: 14px 24px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .nav-logo {
            height: 38px;
            width: auto;
        }
    </style>
</head>
<body>

<div class="container main-wrapper">
    <?php if(session()->get('username')): ?>
    <nav class="navbar-custom mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img src="/images/system-logo.png" alt="System Logo" class="nav-logo me-2">
                <strong style="color: #1a365d; font-size: 1.15rem;">Meal Voucher System</strong>

                <a href="/security-demo" class="ms-3 text-decoration-none" style="color: #667eea; font-weight: 500; font-size: 14px;">
                <i class="fas fa-shield-alt me-1"></i> Security Demo
            </a>
            </div>
            
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" style="border: 1px solid #e2e8f0; padding: 8px 16px; border-radius: 8px; background: #f8f9fa;">
                        <i class="fas fa-user-circle text-secondary me-1"></i> 
                        <span class="fw-bold" style="color: #1a365d;"><?= session()->get('username') ?></span> 
                        <span class="badge ms-2" style="background: linear-gradient(135deg, #1a365d, #2b6cb0); color: #fff; border-radius: 4px;"><?= strtoupper(session()->get('role')) ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="border-radius: 12px; border: 1px solid #e2e8f0;">
                        <li><a class="dropdown-item text-danger fw-bold" href="/logout"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>