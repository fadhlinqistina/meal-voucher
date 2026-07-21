<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* ===== BACKGROUND ===== */
    body {
        background-color: #081225 !important;
        background-image: 
            radial-gradient(circle at 10% 0%, rgba(49, 130, 206, 0.25) 0%, transparent 40%),
            radial-gradient(circle at 90% 10%, rgba(0, 163, 196, 0.2) 0%, transparent 40%),
            radial-gradient(circle at 50% 100%, rgba(26, 54, 93, 0.6) 0%, transparent 60%) !important;
        background-attachment: fixed !important;
        color: #e2e8f0;
    }

    .dash-title {
        color: #ffffff !important;
        text-shadow: 0 4px 15px rgba(0,0,0,0.3);
        letter-spacing: 0.5px;
    }

    .dash-date-pill {
        background: rgba(255, 255, 255, 0.08) !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        color: #f8fafc !important;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .dash-date-pill i {
        color: #00a3c4 !important;
    }

    .card-modern {
        background: #ffffff;
        border: none !important;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2) !important;
    }

    /* ===== STATS CARDS ===== */
    .stat-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 20px 18px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    }
    
    .stat-card .stat-icon {
        font-size: 28px;
        margin-bottom: 8px;
        display: inline-block;
    }
    
    .stat-card .stat-label {
        font-size: 12px;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
        margin-bottom: 2px;
    }
    
    .stat-card .stat-number {
        font-size: 28px;
        font-weight: 800;
        margin: 0;
        line-height: 1.2;
    }
    
    /* ===== ACTION BUTTONS ===== */
    .action-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }
    
    .btn-action {
        padding: 14px 16px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-align: center;
        cursor: pointer;
    }
    
    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    
    .btn-action-primary {
        background: linear-gradient(135deg, #1a365d, #2b6cb0);
        color: white;
    }
    
    .btn-action-primary:hover {
        color: white;
    }
    
    .btn-action-success {
        background: linear-gradient(135deg, #065f46, #10b981);
        color: white;
    }
    
    .btn-action-success:hover {
        color: white;
    }
    
    .btn-action-danger {
        background: linear-gradient(135deg, #991b1b, #ef4444);
        color: white;
    }
    
    .btn-action-danger:hover {
        color: white;
    }
    
    .btn-action i {
        font-size: 16px;
    }
    
    /* ===== RECENT TABLE ===== */
    .recent-table {
        font-size: 13px;
    }
    
    .recent-table th {
        color: #4a5568;
        font-weight: 600;
        border-bottom: 2px solid #e2e8f0;
        padding: 8px 10px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .recent-table td {
        padding: 8px 10px;
        border-bottom: 1px solid #edf2f7;
        vertical-align: middle;
    }
    
    .recent-table tr:hover {
        background: #f8fafc;
    }
    
    .badge-status {
        padding: 3px 10px;
        border-radius: 50px;
        font-size: 10px;
        font-weight: 600;
    }
    
    .badge-used {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .badge-unused {
        background: #d1fae5;
        color: #065f46;
    }
    
    .badge-expired {
        background: #fed7aa;
        color: #92400e;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .action-grid {
            grid-template-columns: 1fr;
        }
        
        .stat-card .stat-number {
            font-size: 22px;
        }
    }
</style>

<div class="fade-in-up w-100">
    
    <!-- ===== HEADER ===== -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold m-0 dash-title">
            <i class="fas fa-store me-2"></i> Vendor Dashboard
        </h4>
        <div class="fw-medium px-4 py-2 rounded-pill dash-date-pill" style="font-size: 0.85rem;">
            <i class="fas fa-calendar-alt me-2"></i> <?= date('d M Y') ?>
        </div>
    </div>

    <!-- ===== STATS CARDS ===== -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #3182ce;">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="stat-label">Total Vouchers</div>
                <div class="stat-number" style="color: #1a365d;"><?= $total ?? 0 ?></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #dd6b20;">
                    <i class="fas fa-ring"></i>
                </div>
                <div class="stat-label">Total Value</div>
                <div class="stat-number" style="color: #dd6b20;">RM <?= number_format($total_value ?? 0, 0) ?></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #38a169;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-label">Redeemed</div>
                <div class="stat-number" style="color: #2f855a;"><?= $redeemed ?? 0 ?></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #d69e2e;">
                    <i class="fas fa-hourglass-half"></i>
                </div>
                <div class="stat-label">Redeemed Value</div>
                <div class="stat-number" style="color: #b7791f;">RM <?= number_format($redeemed_value ?? 0, 0) ?></div>
            </div>
        </div>
    </div>

    <!-- ===== RECENT VOUCHERS & QUICK ACTIONS ===== -->
    <div class="row g-4">
        
        <!-- LEFT: Recent Redeemed Vouchers -->
        <div class="col-lg-6">
            <div class="card-modern p-4 h-100">
                <h5 class="fw-bold mb-3" style="color: #1a365d;">
                    <i class="fas fa-history me-2" style="color: #667eea;"></i> Recent Redeemed
                </h5>
                
                <?php if(empty($recent_vouchers)): ?>
                    <div class="text-center py-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-2"></i>
                        <p class="text-muted small">No vouchers redeemed yet</p>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table recent-table">
                            <thead>
                                <tr>
                                    <th>Voucher Code</th>
                                    <th>Student</th>
                                    <th>Amount</th>
                                    <th>Redeemed At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($recent_vouchers as $v): ?>
                                    <tr>
                                        <td><code style="font-size:11px;"><?= $v['voucher_code'] ?></code></td>
                                        <td><?= $v['student_id'] ?></td>
                                        <td class="fw-bold text-success">RM <?= number_format($v['amount'], 2) ?></td>
                                        <td><?= date('d/m/Y H:i', strtotime($v['used_at'])) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- RIGHT: Quick Actions -->
        <div class="col-lg-6">
            <div class="card-modern p-4 h-100">
                <h5 class="fw-bold mb-3" style="color: #1a365d;">
                    <i class="fas fa-bolt me-2" style="color: #667eea;"></i> Quick Actions
                </h5>
                
                <div class="action-grid">
                    <!-- Scan Voucher -->
                    <a href="/scan" class="btn-action btn-action-primary">
                        <i class="fas fa-qrcode"></i> Scan Voucher
                    </a>
                    
                    <!-- Security Demo -->
                    <a href="/security-demo" class="btn-action btn-action-success">
                        <i class="fas fa-shield-alt"></i> Security Demo
                    </a>
                    
                    <!-- Logout -->
                    <a href="/logout" class="btn-action btn-action-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

<!-- ===== SWEETALERT ===== -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Logout confirmation
document.addEventListener('DOMContentLoaded', function() {
    const logoutBtn = document.querySelector('a[href="/logout"]');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will be logged out of the system.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, Logout',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/logout';
                }
            });
        });
    }
});
</script>

<?= $this->endSection() ?>