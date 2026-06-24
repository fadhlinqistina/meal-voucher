<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offline - Meal Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
        }
        .offline-card {
            background: white;
            border-radius: 32px;
            padding: 40px;
            text-align: center;
            max-width: 400px;
            margin: 50px auto;
            animation: fadeInUp 0.5s ease-out;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .btn-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="offline-card">
        <i class="fas fa-wifi fa-4x text-muted mb-3"></i>
        <h3>You are Offline</h3>
        <p class="text-muted">Please check your internet connection</p>
        <button onclick="location.reload()" class="btn-gradient">
            <i class="fas fa-sync-alt"></i> Retry
        </button>
        <hr>
        <small class="text-muted">
            <i class="fas fa-info-circle"></i> Previously loaded vouchers are still available
        </small>
    </div>
</body>
</html>