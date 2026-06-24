<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-modern p-4">
                <div class="text-center mb-4">
                    <i class="fas fa-qrcode fa-3x" style="color: #667eea"></i>
                    <h4 class="fw-bold mt-2">Scan Voucher QR Code</h4>
                    <p class="text-muted">Position the QR code within the frame to verify</p>
                </div>

                <!-- Scanner Container -->
                <div id="reader" style="width: 100%;"></div>

                <!-- Instructions -->
                <div class="mt-4 p-3 bg-light rounded">
                    <small class="text-muted">
                        <i class="fas fa-info-circle"></i> 
                        Make sure the QR code is well-lit and clearly visible
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode"></script>
<script src="https://unpkg.com/html5-qrcode"></script>
<script>
let lastScanTime = 0;
let lastScannedCode = '';

function onScanSuccess(decodedText) {
    const now = Date.now();
    
    // Prevent double scan within 3 seconds
    if (lastScannedCode === decodedText && (now - lastScanTime) < 3000) {
        console.log('Duplicate scan ignored');
        return;
    }
    
    lastScanTime = now;
    lastScannedCode = decodedText;
    
    // Vibrate if supported
    if (navigator.vibrate) navigator.vibrate(200);
    
    // Play beep sound (optional)
    try {
        const beep = new Audio('data:audio/wav;base64,U3RlYWx0aCBTb3VuZA==');
        beep.play().catch(e => console.log('Audio not supported'));
    } catch(e) {}
    
    // Show loading indicator
    Swal.fire({
        title: 'Verifying...',
        text: 'Please wait while we check the voucher',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
    
    // Redirect to verify
    window.location.href = "/verify/" + decodedText;
}

function onScanError(error) {
    // Silent fail - don't spam console
}

const html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", { 
        fps: 10, 
        qrbox: { width: 250, height: 250 },
        aspectRatio: 1.0,
        disableFlip: false
    }, 
    false
);

html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>

<style>
#reader {
    border: none !important;
}
#reader__dashboard_section_csr {
    display: none !important;
}
</style>

<?= $this->endSection() ?>