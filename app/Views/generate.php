<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card-modern p-4 text-center fade-in-up">
            
            <!-- Success Icon -->
            <div class="mb-3">
                <div class="mx-auto mb-3 rounded-circle bg-success bg-opacity-10 d-flex align-items-center justify-content-center" 
                     style="width: 60px; height: 60px;">
                    <i class="fas fa-check-circle fa-2x text-success"></i>
                </div>
                <h5 class="fw-bold mb-1">Voucher Generated!</h5>
                <p class="text-muted small mb-0">New voucher ready to use</p>
            </div>

            <!-- Voucher Code -->
            <div class="bg-light rounded-3 p-2 mb-3">
                <small class="text-muted d-block">Voucher Code</small>
                <strong class="fs-6"><?= $voucher ?></strong>
            </div>

            <!-- QR Code - Small Size 120px -->
            <div class="mb-3">
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $hash ?>&size=120" 
                     alt="QR Code" 
                     class="rounded-3"
                     style="width: 120px; height: 120px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
            </div>

            <!-- Buttons -->
            <div class="d-grid gap-2">
                <button onclick="downloadQR('<?= $hash ?>', '<?= $voucher ?>')" 
                        class="btn btn-gradient-primary btn-sm py-2">
                    <i class="fas fa-download"></i> Download QR
                </button>
                
                <a href="/scan" class="btn btn-outline-secondary btn-sm py-2">
                    <i class="fas fa-qrcode"></i> Scan Another
                </a>
            </div>

        </div>
    </div>
</div>

<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function downloadQR(hash, code) {
    const url = `https://api.qrserver.com/v1/create-qr-code/?data=${hash}&size=120`;
    const link = document.createElement('a');
    link.href = url;
    link.download = `voucher_${code}.png`;
    link.click();
    
    Swal.fire({
        icon: 'success',
        title: 'Download Started!',
        text: 'QR code is being downloaded',
        timer: 1500,
        showConfirmButton: false,
        position: 'top-end',
        toast: true
    });
}

// Show success alert when page loads
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'success',
        title: '🎉 Voucher Generated Successfully!',
        text: 'Voucher code: <?= $voucher ?>',
        confirmButtonColor: '#667eea',
        confirmButtonText: 'OK',
        timer: 3000,
        backdrop: true
    });
});
</script>

<?= $this->endSection() ?>