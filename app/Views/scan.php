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

    .btn-switch-cam {
        background: linear-gradient(135deg, #1a365d, #2b6cb0);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-switch-cam:hover {
        background: linear-gradient(135deg, #122846, #1e4f82);
        color: white;
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

                <div id="reader" class="shadow-sm mb-3">
                    <div class="text-white text-center p-3" id="loading-text">
                        <div class="spinner-border text-light mb-2" role="status"></div>
                        <br><small>Starting Camera...</small>
                    </div>
                </div>

                <!-- Butang Switch Camera (Muncul secara automatik jika peranti ada >1 kamera) -->
                <button id="switchCamBtn" onclick="switchCamera()" class="btn btn-switch-cam w-100 py-2 mb-3" style="display: none;">
                    <i class="fas fa-camera-rotate me-2"></i> Switch Camera (Front / Rear)
                </button>

                <div class="p-3 rounded-3" style="background-color: #f8f9fa; border-left: 4px solid #2b6cb0;">
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
let html5QrCode;
let currentFacingMode = "environment"; // Mula dengan kamera belakang
let lastScanTime = 0;
let lastScannedCode = '';
let isScanning = false;

function onScanSuccess(decodedText) {
    const now = Date.now();
    
    // Elak imbasan berganda dalam masa 3 saat
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

function startScanner(facingMode) {
    const config = { fps: 10, qrbox: { width: 250, height: 250 } };

    html5QrCode.start({ facingMode: facingMode }, config, onScanSuccess)
    .then(() => {
        isScanning = true;
        // Semak jika peranti mempunyai lebih dari 1 kamera (contoh: telefon/iPad)
        Html5Qrcode.getCameras().then(devices => {
            if (devices && devices.length > 1) {
                document.getElementById('switchCamBtn').style.display = 'block';
            }
        }).catch(err => console.log(err));
    })
    .catch((err) => {
        isScanning = false;
        document.getElementById('loading-text').innerHTML = `
            <i class="fas fa-video-slash fa-2x text-warning mb-2"></i><br>
            <span class="text-white fw-bold">Camera Access Denied</span><br>
            <small class="text-muted">Sila pastikan peranti mempunyai kamera dan 'Permission' dibenarkan.</small>
        `;
        console.error(err);
    });
}

function switchCamera() {
    if (!isScanning) return;
    
    // Tukar mod antara 'environment' (belakang) dan 'user' (hadapan)
    currentFacingMode = (currentFacingMode === "environment") ? "user" : "environment";
    
    // Tunjukkan status memuatkan semula
    document.getElementById('switchCamBtn').disabled = true;
    document.getElementById('switchCamBtn').innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Switching Camera...';
    
    html5QrCode.stop().then(() => {
        isScanning = false;
        startScanner(currentFacingMode);
        setTimeout(() => {
            document.getElementById('switchCamBtn').disabled = false;
            document.getElementById('switchCamBtn').innerHTML = '<i class="fas fa-camera-rotate me-2"></i> Switch Camera (Front / Rear)';
        }, 500);
    }).catch(err => {
        console.error("Error stopping camera", err);
    });
}

document.addEventListener("DOMContentLoaded", function() {
    html5QrCode = new Html5Qrcode("reader");
    startScanner(currentFacingMode);
});
</script>

<?= $this->endSection() ?>