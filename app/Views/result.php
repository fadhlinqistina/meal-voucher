<?php
// Fix timezone function - use Asia/Kuala_Lumpur correctly
function formatDateTime($datetime) {
    if (empty($datetime)) return 'N/A';
    try {
        // If datetime is already in string format, create DateTime with correct timezone
        $date = new \DateTime($datetime);
        $date->setTimezone(new \DateTimeZone('Asia/Kuala_Lumpur'));
        return $date->format('d/m/Y H:i:s');
    } catch (\Exception $e) {
        return $datetime;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Result | Meal Voucher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background-color: #081225 !important;
            background-image: 
                radial-gradient(circle at 10% 0%, rgba(49, 130, 206, 0.25) 0%, transparent 40%),
                radial-gradient(circle at 90% 10%, rgba(0, 163, 196, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 50% 100%, rgba(26, 54, 93, 0.6) 0%, transparent 60%) !important;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .result-card {
            background: white;
            border-radius: 24px;
            padding: 40px 30px;
            max-width: 480px;
            width: 100%;
            margin: 0 auto;
            animation: fadeInUp 0.5s ease-out;
            box-shadow: 0 25px 50px rgba(0,0,0,0.3);
            text-align: center;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .result-icon {
            font-size: 70px;
            margin-bottom: 15px;
        }
        
        .voucher-details {
            background: #f8f9fa;
            border-radius: 20px;
            padding: 15px;
            margin: 20px 0;
            text-align: left;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            font-weight: 600;
            color: #6c757d;
        }
        
        .detail-value {
            font-weight: 500;
            color: #2c3e50;
        }
        
        .btn-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: transform 0.2s;
            display: inline-block;
            text-decoration: none;
        }
        
        .btn-custom:hover {
            transform: translateY(-2px);
            color: white;
        }
        
        .btn-outline-secondary {
            background: transparent;
            border: 2px solid #6c757d;
            color: #6c757d;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-outline-secondary:hover {
            background: #6c757d;
            color: white;
        }
        
        .btn-group {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .status-badge {
            display: inline-block;
            padding: 6px 15px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
        }
        
        .status-valid {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-used {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .status-expired {
            background: #fed7aa;
            color: #92400e;
        }
        
        .status-unauthorized {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .status-invalid {
            background: #f3f4f6;
            color: #4b5563;
        }
    </style>
</head>
<body>
    <div class="result-card">
        <?php if($status == "VALID"): ?>
            <div class="result-icon">
                <i class="fas fa-check-circle" style="color: #10b981"></i>
            </div>
            <h2 style="color: #10b981; font-weight: 800;">VALID ✅</h2>
            <p class="text-muted mt-1 mb-3">Voucher is valid and has been marked as used</p>
            
            <?php if(isset($voucher)): ?>
            <div class="voucher-details">
                <h6 class="fw-bold mb-3"><i class="fas fa-info-circle"></i> Voucher Details</h6>
                <div class="detail-row">
                    <span class="detail-label">Voucher Code:</span>
                    <span class="detail-value"><code><?= $voucher['voucher_code'] ?? 'N/A' ?></code></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Student ID:</span>
                    <span class="detail-value"><?= $voucher['student_id'] ?? 'N/A' ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Amount:</span>
                    <span class="detail-value text-success fw-bold">RM <?= number_format($voucher['amount'] ?? 0, 2) ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Vendor:</span>
                    <span class="detail-value"><?= $voucher['vendor_name'] ?? $voucher['vendor_id'] ?? 'N/A' ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Expiry Date:</span>
                    <span class="detail-value"><?= isset($voucher['expiry_date']) ? date('d/m/Y', strtotime($voucher['expiry_date'])) : 'N/A' ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Generated By:</span>
                    <span class="detail-value"><?= $voucher['generated_by'] ?? 'N/A' ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Redeemed At:</span>
                    <span class="detail-value"><?= date('d/m/Y H:i:s') ?></span>
                </div>
            </div>
            <?php endif; ?>
            
        <?php elseif($status == "USED"): ?>
            <div class="result-icon">
                <i class="fas fa-times-circle" style="color: #ef4444"></i>
            </div>
            <h2 style="color: #ef4444; font-weight: 800;">ALREADY USED ❌</h2>
            <p class="text-muted mt-1 mb-3">This voucher has already been redeemed</p>
            
            <?php if(isset($voucher)): ?>
            <div class="voucher-details">
                <h6 class="fw-bold mb-3"><i class="fas fa-history"></i> Voucher Details</h6>
                <div class="detail-row">
                    <span class="detail-label">Voucher Code:</span>
                    <span class="detail-value"><code><?= $voucher['voucher_code'] ?? 'N/A' ?></code></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Student ID:</span>
                    <span class="detail-value"><?= $voucher['student_id'] ?? 'N/A' ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Amount:</span>
                    <span class="detail-value text-success fw-bold">RM <?= number_format($voucher['amount'] ?? 0, 2) ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Vendor:</span>
                    <span class="detail-value"><?= $voucher['vendor_name'] ?? $voucher['vendor_id'] ?? 'N/A' ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Used On:</span>
                    <span class="detail-value text-danger fw-bold">
                        <?= isset($voucher['used_at']) ? formatDateTime($voucher['used_at']) : 'N/A' ?>
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Used By:</span>
                    <span class="detail-value"><?= $voucher['used_by'] ?? 'N/A' ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Expiry Date:</span>
                    <span class="detail-value"><?= isset($voucher['expiry_date']) ? date('d/m/Y', strtotime($voucher['expiry_date'])) : 'N/A' ?></span>
                </div>
            </div>
            <?php endif; ?>
            
        <?php elseif($status == "EXPIRED"): ?>
            <div class="result-icon">
                <i class="fas fa-clock" style="color: #f59e0b"></i>
            </div>
            <h2 style="color: #f59e0b; font-weight: 800;">EXPIRED ⚠</h2>
            <p class="text-muted mt-1 mb-3">This voucher has passed its expiry date</p>
            
            <?php if(isset($voucher)): ?>
            <div class="voucher-details">
                <h6 class="fw-bold mb-3"><i class="fas fa-calendar-times"></i> Voucher Details</h6>
                <div class="detail-row">
                    <span class="detail-label">Voucher Code:</span>
                    <span class="detail-value"><code><?= $voucher['voucher_code'] ?? 'N/A' ?></code></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Student ID:</span>
                    <span class="detail-value"><?= $voucher['student_id'] ?? 'N/A' ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Amount:</span>
                    <span class="detail-value text-success fw-bold">RM <?= number_format($voucher['amount'] ?? 0, 2) ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Expired On:</span>
                    <span class="detail-value text-warning fw-bold">
                        <?= isset($voucher['expiry_date']) ? date('d/m/Y', strtotime($voucher['expiry_date'])) : 'N/A' ?>
                    </span>
                </div>
            </div>
            <?php endif; ?>
            
        <?php elseif($status == "UNAUTHORIZED"): ?>
            <div class="result-icon">
                <i class="fas fa-lock" style="color: #ef4444"></i>
            </div>
            <h2 style="color: #ef4444; font-weight: 800;">UNAUTHORIZED ❌</h2>
            <p class="text-muted mt-1 mb-3">You are not authorized to scan this voucher</p>
            
            <?php if(isset($voucher)): ?>
            <div class="voucher-details">
                <h6 class="fw-bold mb-3"><i class="fas fa-building"></i> Voucher Info</h6>
                <div class="detail-row">
                    <span class="detail-label">This voucher belongs to:</span>
                    <span class="detail-value"><?= $voucher['vendor_name'] ?? $voucher['vendor_id'] ?? 'Unknown Vendor' ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Your vendor ID:</span>
                    <span class="detail-value"><?= session()->get('username') ?></span>
                </div>
            </div>
            <?php endif; ?>
            
        <?php else: ?>
            <div class="result-icon">
                <i class="fas fa-ban" style="color: #6c757d"></i>
            </div>
            <h2 style="color: #6c757d; font-weight: 800;">INVALID ❌</h2>
            <p class="text-muted mt-1 mb-3">This QR code is not a valid voucher</p>
        <?php endif; ?>
        
        <div class="btn-group mt-3">
            <a href="/scan" class="btn-custom">
                <i class="fas fa-qrcode"></i> Scan Another
            </a>
            <a href="/logout" class="btn-outline-secondary">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>

    <!-- ===== SWEETALERT ===== -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const status = '<?= $status ?>';
    let icon, title, text;
    
    switch(status) {
        case 'VALID':
            icon = 'success';
            title = '✅ Voucher Valid!';
            text = 'Voucher has been successfully redeemed.';
            break;
        case 'USED':
            icon = 'error';
            title = '❌ Already Used!';
            text = 'This voucher has already been redeemed.';
            break;
        case 'EXPIRED':
            icon = 'warning';
            title = '⚠️ Expired!';
            text = 'This voucher has passed its expiry date.';
            break;
        case 'UNAUTHORIZED':
            icon = 'error';
            title = '🚫 Unauthorized!';
            text = 'You are not authorized to scan this voucher.';
            break;
        default:
            icon = 'error';
            title = '❌ Invalid!';
            text = 'This QR code is not a valid voucher.';
    }
    
    Swal.fire({
        icon: icon,
        title: title,
        text: text,
        confirmButtonColor: '#667eea',
        confirmButtonText: 'OK',
        timer: 5000,
        timerProgressBar: true
    });
});
</script>
</body>
</html>