<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="col-md-6 col-lg-5">
        <div class="card-modern p-5 text-center fade-in-up">
            
            <div class="mb-4">
                <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" 
                     style="width: 80px; height: 80px; background-color: #e6fffa;">
                    <i class="fas fa-check-circle fa-3x" style="color: #38a169;"></i>
                </div>
                <h4 class="fw-bold mb-1" style="color: #1a365d;">Voucher Generated!</h4>
                <p class="text-muted">Voucher telah berhasil dibuat.</p>
            </div>

            <div class="p-3 mb-3" style="background-color: #f4f7f6; border-radius: 12px; border: 1px dashed #cbd5e0;">
                <small class="text-muted d-block text-uppercase fw-bold mb-1" style="font-size: 11px;">Voucher Code</small>
                <strong class="fs-3" style="color: #1a365d; letter-spacing: 2px;"><?= $voucher ?></strong>
            </div>
            
            <div class="row g-3 mb-4">
                <div class="col-6">
                    <div class="p-3 h-100" style="background-color: #f4f7f6; border-radius: 12px;">
                        <small class="text-muted d-block mb-1">Amount</small>
                        <strong class="fs-5" style="color: #38a169;">RM <?= number_format($amount, 2) ?></strong>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-3 h-100" style="background-color: #f4f7f6; border-radius: 12px;">
                        <small class="text-muted d-block mb-1">Expiry Date</small>
                        <strong style="color: #2d3748;"><?= date('d/m/Y', strtotime($expiry_date)) ?></strong>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $hash ?>&size=150" 
                     alt="QR Code" 
                     class="rounded-3"
                     style="width: 150px; height: 150px; border: 4px solid #ffffff; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            </div>

            <div class="p-3 mb-4 text-start" style="background-color: #eef4f9; border-radius: 8px; font-size: 0.95rem;">
                <div class="mb-2">
                    <i class="fas fa-user-graduate me-2" style="color: #4a5568;"></i> 
                    <span class="text-muted">Student:</span> 
                    <strong style="color: #1a365d; float: right;"><?= $student['username'] ?></strong>
                </div>
                <div>
                    <i class="fas fa-store me-2" style="color: #4a5568;"></i> 
                    <span class="text-muted">Vendor:</span> 
                    <strong style="color: #1a365d; float: right;"><?= $vendor_id ?></strong>
                </div>
            </div>

            <div class="d-grid gap-3">
                <button onclick="downloadQR('<?= $hash ?>', '<?= $voucher ?>')" 
                        class="btn btn-primary py-2 fw-bold fs-6">
                    <i class="fas fa-download me-2"></i> Download QR Code
                </button>
                
                <div class="row g-3">
                    <div class="col-6">
                        <a href="/admin" class="btn btn-outline-secondary w-100 py-2 fw-bold" style="border-radius: 8px;">
                            <i class="fas fa-chart-line me-2"></i> Dashboard
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="/admin/generate" class="btn btn-outline-primary w-100 py-2 fw-bold" style="border-radius: 8px;">
                            <i class="fas fa-plus me-2"></i> Create New
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function downloadQR(hash, code) {
    const url = `https://api.qrserver.com/v1/create-qr-code/?data=${hash}&size=150`;
    const link = document.createElement('a');
    link.href = url;
    link.download = `voucher_${code}.png`;
    link.click();
    
    Swal.fire({
        icon: 'success',
        title: 'Download Started!',
        text: 'QR code is being downloaded',
        timer: 2000,
        showConfirmButton: false,
        toast: true,
        position: 'top-end'
    });
}
</script>

<?= $this->endSection() ?>