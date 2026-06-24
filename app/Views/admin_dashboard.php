<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4 fade-in-up">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold" style="color: #1a365d;">
            <i class="fas fa-chart-line me-2"></i> Admin Dashboard
        </h3>
        <div class="text-muted fw-medium">
            <i class="fas fa-calendar-alt me-1"></i> <?= date('l, d F Y') ?>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4 col-sm-6">
            <div class="card-modern p-4 text-center h-100">
                <div class="mb-3">
                    <i class="fas fa-ticket-alt fa-3x" style="color: #3182ce;"></i>
                </div>
                <h6 class="text-muted mb-2 fw-semibold">Total Vouchers</h6>
                <h2 class="fw-bold mb-0" style="color: #1a365d;"><?= $total ?></h2>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card-modern p-4 text-center h-100">
                <div class="mb-3">
                    <i class="fas fa-ring fa-3x" style="color: #f6ad55;"></i>
                </div>
                <h6 class="text-muted mb-2 fw-semibold">Total Value</h6>
                <h2 class="fw-bold mb-0" style="color: #dd6b20;">RM <?= number_format($total_value, 2) ?></h2>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card-modern p-4 text-center h-100">
                <div class="mb-3">
                    <i class="fas fa-check-circle fa-3x" style="color: #38a169;"></i>
                </div>
                <h6 class="text-muted mb-2 fw-semibold">Used</h6>
                <h2 class="fw-bold mb-0" style="color: #2f855a;"><?= $used ?></h2>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card-modern p-4 text-center h-100">
                <div class="mb-3">
                    <i class="fas fa-hourglass-half fa-3x" style="color: #d69e2e;"></i>
                </div>
                <h6 class="text-muted mb-2 fw-semibold">Unused</h6>
                <h2 class="fw-bold mb-0" style="color: #b7791f;"><?= $unused ?></h2>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card-modern p-4 text-center h-100">
                <div class="mb-3">
                    <i class="fas fa-clock fa-3x" style="color: #e53e3e;"></i>
                </div>
                <h6 class="text-muted mb-2 fw-semibold">Expired</h6>
                <h2 class="fw-bold mb-0" style="color: #c53030;"><?= $expired ?></h2>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card-modern p-4 h-100">
                <h5 class="fw-bold mb-4" style="color: #1a365d;">
                    <i class="fas fa-cogs me-2"></i> Quick Actions
                </h5>
                <div class="d-grid gap-3">
                    <a href="/admin/generate" class="btn btn-primary py-3 fs-6" style="border-radius: 8px;">
                        <i class="fas fa-plus-circle me-2"></i> Generate New Voucher
                    </a>
                    <a href="/logout" class="btn btn-outline-danger py-3 fs-6" style="border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout System
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-modern p-4 h-100">
                <h5 class="fw-bold mb-4" style="color: #1a365d;">
                    <i class="fas fa-info-circle me-2"></i> System Info
                </h5>
                <div class="p-4 d-flex align-items-center" style="background-color: #eef4f9; border: 1px solid #d1deea; border-radius: 12px; color: #2d3748; min-height: 120px;">
                    <div>
                        <h3 class="fw-bold text-primary mb-1"><?= $total > 0 ? round(($used / $total) * 100, 1) : 0 ?>%</h3>
                        <span class="text-muted">Tingkat Penggunaan (Usage Rate). Angka ini menunjukkan persentase voucher yang telah berhasil digunakan dari total keseluruhan voucher.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>