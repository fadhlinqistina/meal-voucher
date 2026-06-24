<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="fade-in-up">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white fw-bold">
            <i class="fas fa-store"></i> Vendor Dashboard
        </h2>
        <div class="text-white">
            <i class="fas fa-calendar-alt"></i> <?= date('l, d F Y') ?>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-6">
            <div class="card-modern p-3 text-center">
                <div class="mb-2">
                    <i class="fas fa-ticket-alt fa-2x" style="color: #667eea"></i>
                </div>
                <h6 class="text-muted mb-1">Total Vouchers</h6>
                <h3 class="fw-bold mb-0"><?= $total ?? 0 ?></h3>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card-modern p-3 text-center">
                <div class="mb-2">
                    <i class="fas fa-ring fa-2x" style="color: #f59e0b"></i>
                </div>
                <h6 class="text-muted mb-1">Total Value</h6>
                <h3 class="fw-bold mb-0 text-warning">RM <?= number_format($total_value ?? 0, 2) ?></h3>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card-modern p-3 text-center">
                <div class="mb-2">
                    <i class="fas fa-check-circle fa-2x" style="color: #10b981"></i>
                </div>
                <h6 class="text-muted mb-1">Redeemed</h6>
                <h3 class="fw-bold mb-0 text-success"><?= $redeemed ?? 0 ?></h3>
            </div>
        </div>

        <div class="col-md-3 col-6">
            <div class="card-modern p-3 text-center">
                <div class="mb-2">
                    <i class="fas fa-hourglass-half fa-2x" style="color: #f59e0b"></i>
                </div>
                <h6 class="text-muted mb-1">Redeemed Value</h6>
                <h3 class="fw-bold mb-0 text-success">RM <?= number_format($redeemed_value ?? 0, 2) ?></h3>
            </div>
        </div>
    </div>

    <!-- Recent Redeemed Vouchers -->
    <div class="card-modern p-4">
        <h5 class="fw-bold mb-3">
            <i class="fas fa-history"></i> Recent Redeemed Vouchers
        </h5>
        
        <?php if(empty($recent_vouchers)): ?>
            <div class="text-center py-4">
                <i class="fas fa-inbox fa-3x text-muted mb-2"></i>
                <p class="text-muted">No vouchers redeemed yet</p>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
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
                                <td><code><?= $v['voucher_code'] ?></code></td>
                                <td><?= $v['student_id'] ?></td>
                                <td class="text-success fw-bold">RM <?= number_format($v['amount'], 2) ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($v['used_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- Quick Actions -->
    <div class="card-modern p-4 mt-3">
        <h5 class="fw-bold mb-3">
            <i class="fas fa-cogs"></i> Quick Actions
        </h5>
        <div class="row g-3">
            <div class="col-md-6">
                <a href="/scan" class="btn btn-gradient-primary w-100">
                    <i class="fas fa-qrcode"></i> Scan Voucher
                </a>
            </div>
            <div class="col-md-6">
                <a href="/logout" class="btn btn-gradient-danger w-100">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>