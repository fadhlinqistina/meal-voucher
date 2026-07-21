<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* Reka bentuk latar belakang gelap khusus untuk Scanner */
    body {
        background-color: #0f2027 !important;
    }
    
    .card-modern {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3) !important;
        border-radius: 20px !important;
    }

    /* Membuang frame putih hodoh dan gantikan dengan frame hitam profesional */
    #reader { 
        border: none !important; 
        border-radius: 16px; 
        overflow: hidden;
        background: #000; 
        min-height: 280px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    #reader video { 
        border-radius: 16px; 
        object-fit: cover; 
        width: 100% !important;
    }
</style>

<div class="fade-in-up mt-4"> 
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card-modern p-4">
                <div class="text-center mb-4">
                    <div class="mx-auto mb-3 rounded-circle d-flex align-items-center justify-content-center shadow-sm" 
                         style="width: 70px; height: 70px; background: linear-gradient(135deg, #1a365d, #2b6cb0);">
                        <i class="fas fa-qrcode fa-2x text-white"></i>
                    </div>
                    <h4 class="fw-bold mt-2" style="color: #1a365d;">Scan Voucher</h4>
                    <p class="text-muted small">Position the QR code within the frame</p>
                </div>

                <div id="reader" class="shadow-sm">
                    <div class="text-white text-center p-3" id="loading-text">
                        <div class="spinner-border text-light mb-2" role="status"></div>
                        <br><small>Starting Camera...</small>
                    </div>
                </div>

                <div class="mt-4 p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #2b6cb0;">
                    <small class="text-muted fw-medium d-block mb-0">
                        <i class="fas fa-lightbulb text-warning me-1"></i> 
                        <strong>Pro Tip:</strong> Keep a steady distance so the white QR frame is fully visible.
                    </small>
                </div>
                
                <div class="text-center mt-4">
                    <button onclick="history.back()" class="btn btn-outline-secondary w-100 py-2" style="border-radius: 10px; font-weight: 600;">
                        <i class="fas fa-arrow-left me-2"></i> Cancel & Return
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    let lastScanTime = 0;
    let lastScannedCode = '';

    function onScanSuccess(decodedText) {
        const now = Date.now();
        
        // Prevent double scanning within 3 seconds
        if (lastScannedCode === decodedText && (now - lastScanTime) < 3000) {
            return;
        }
        
        lastScanTime = now;
        lastScannedCode = decodedText;
        
        if (navigator.vibrate) navigator.vibrate(200);
        
        // Hentikan kamera selepas berjaya scan untuk jimat RAM
        html5QrCode.stop().then(() => {
            Swal.fire({
                title: 'Verifying...',
                text: 'Mengesahkan identiti QR...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            window.location.href = "/verify/" + decodedText;
        }).catch(err => {
            window.location.href = "/verify/" + decodedText;
        });
    }

    // Menggunakan Core API (Tanpa butang-butang hodoh)
    const html5QrCode = new Html5Qrcode("reader");
    const config = { fps: 10, qrbox: { width: 250, height: 250 } };

    // Paksa buka kamera belakang (environment) secara automatik
    html5QrCode.start({ facingMode: "environment" }, config, onScanSuccess)
    .catch((err) => {
        document.getElementById('loading-text').innerHTML = `
            <i class="fas fa-video-slash fa-2x text-warning mb-2"></i><br>
            <span class="text-white fw-bold">Camera Access Denied</span><br>
            <small class="text-muted">Sila pastikan peranti mempunyai kamera dan 'Permission' dibenarkan.</small>
        `;
        console.error(err);
    });
});
</script>

<?= $this->endSection() ?>