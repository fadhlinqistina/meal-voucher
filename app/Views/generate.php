<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* Tambahan background gelap jika anda mahu ia seragam dengan Admin Dashboard */
    body {
        background-color: #081225 !important;
        background-image: 
            radial-gradient(circle at 10% 0%, rgba(49, 130, 206, 0.25) 0%, transparent 40%),
            radial-gradient(circle at 90% 10%, rgba(0, 163, 196, 0.2) 0%, transparent 40%),
            radial-gradient(circle at 50% 100%, rgba(26, 54, 93, 0.6) 0%, transparent 60%) !important;
        background-attachment: fixed !important;
    }
</style>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="col-md-6 col-lg-4">
        <div class="card-modern p-4 p-md-5 text-center fade-in-up">
            
            <div class="mb-4">
                <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center" 
                     style="width: 75px; height: 75px; background-color: #e6fffa;">
                    <i class="fas fa-check-circle fa-3x" style="color: #38a169;"></i>
                </div>
                <h4 class="fw-bold mb-1" style="color: #1a365d;">Success!</h4>
                <p class="text-muted small mb-0">New voucher ready to use</p>
            </div>

            <div class="p-3 mb-4" style="background-color: #f4f7f6; border-radius: 12px; border: 1px dashed #cbd5e0;">
                <small class="text-muted d-block text-uppercase fw-bold mb-1" style="font-size: 11px;">Voucher Code</small>
                <strong class="fs-4" style="color: #1a365d; letter-spacing: 2px;"><?= $voucher ?></strong>
            </div>

            <div class="mb-4">
                <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $hash ?>&size=150" 
                     alt="QR Code" 
                     class="rounded-3"
                     style="width: 150px; height: 150px; border: 4px solid #ffffff; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
            </div>

            <div class="d-grid gap-3">
                <button onclick="downloadQR('<?= $hash ?>', '<?= $voucher ?>')" 
                        class="btn btn-primary py-2 fw-bold" style="border-radius: 8px;">
                    <i class="fas fa-download me-2"></i> Download QR
                </button>
                
                <a href="/scan" class="btn btn-outline-secondary py-2 fw-bold" style="border-radius: 8px;">
                    <i class="fas fa-qrcode me-2"></i> Scan Another
                </a>
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
        title: 'Generated!',
        text: 'Voucher code: <?= $voucher ?>',
        confirmButtonColor: '#1a365d',
        confirmButtonText: 'OK',
        timer: 3000
    });
});
</script>

<?= $this->endSection() ?>