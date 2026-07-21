<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* ===== PAGE ===== */
    body {
        background-color: #081225 !important;
        background-image: 
            radial-gradient(circle at 10% 0%, rgba(49, 130, 206, 0.25) 0%, transparent 40%),
            radial-gradient(circle at 90% 10%, rgba(0, 163, 196, 0.2) 0%, transparent 40%),
            radial-gradient(circle at 50% 100%, rgba(26, 54, 93, 0.6) 0%, transparent 60%) !important;
        background-attachment: fixed !important;
    }
    
    .demo-container {
        max-width: 960px;
        margin: 0 auto;
    }
    
    .card-modern {
        background: #ffffff;
        border: none !important;
        border-radius: 20px !important;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25) !important;
    }
    
    /* ===== HEADER ===== */
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .page-header h3 {
        color: #ffffff;
        font-weight: 700;
        margin: 0;
    }
    
    .page-header .badge-status {
        background: rgba(16, 185, 129, 0.2);
        color: #68d391;
        padding: 6px 18px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
        border: 1px solid rgba(16, 185, 129, 0.15);
    }
    
    /* ===== STEP INDICATOR ===== */
    .step-indicator {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin-bottom: 16px;
        padding: 12px 20px;
        background: rgba(255,255,255,0.05);
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.06);
    }
    
    .step-dot {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #2d3748;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 12px;
        color: #6c757d;
        transition: all 0.4s;
        flex-shrink: 0;
    }
    
    .step-dot.done {
        background: #38a169;
        color: white;
    }
    
    .step-dot.active {
        background: #667eea;
        color: white;
        box-shadow: 0 4px 15px rgba(102,126,234,0.4);
        transform: scale(1.1);
    }
    
    .step-line {
        width: 24px;
        height: 2px;
        background: #2d3748;
        flex-shrink: 0;
    }
    
    .step-line.done {
        background: #38a169;
    }
    
    .step-label {
        color: rgba(255,255,255,0.6);
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    /* ===== FORM INPUT ===== */
    .input-group-custom {
        margin-bottom: 12px;
    }
    
    .input-group-custom label {
        font-weight: 600;
        font-size: 12px;
        color: #2d3748;
        display: block;
        margin-bottom: 4px;
    }
    
    .input-group-custom label i {
        color: #667eea;
        width: 18px;
    }
    
    .input-group-custom input {
        width: 100%;
        padding: 8px 12px;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        font-size: 13px;
        transition: all 0.3s;
        background: #f8fafc;
    }
    
    .input-group-custom input:focus {
        border-color: #667eea;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(102,126,234,0.08);
        outline: none;
    }
    
    .input-group-custom input:hover {
        border-color: #a0aec0;
    }
    
    .input-group-custom .input-icon {
        position: relative;
    }
    
    .input-group-custom .input-icon i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #a0aec0;
    }
    
    .input-group-custom .input-icon input {
        padding-left: 36px;
    }
    
    /* ===== HASH DISPLAY ===== */
    .hash-box {
        background: #0d1117;
        padding: 12px 16px;
        border-radius: 8px;
        font-family: 'Courier New', monospace;
        font-size: 12px;
        word-break: break-all;
        min-height: 48px;
        border: 1px solid #30363d;
        color: #58a6ff;
    }
    
    .hash-box.success {
        color: #3fb950;
    }
    
    .hash-box .label {
        color: rgba(255,255,255,0.3);
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: block;
        margin-bottom: 4px;
    }
    
    .hash-box .value {
        font-size: 13px;
    }
    
    /* ===== BUTTONS ===== */
    .btn-demo {
        background: #1a365d;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 13px;
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .btn-demo:hover {
        background: #2b6cb0;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(26,54,93,0.3);
        color: white;
    }
    
    .btn-demo:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none;
    }
    
    .btn-demo-secondary {
        background: #e2e8f0;
        color: #4a5568;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 12px;
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .btn-demo-secondary:hover {
        background: #cbd5e1;
    }
    
    .btn-demo-success {
        background: #38a169;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 12px;
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .btn-demo-success:hover {
        background: #2f855a;
        transform: translateY(-2px);
        color: white;
    }
    
    /* ===== SECURITY PROPERTIES ===== */
    .prop-box {
        padding: 10px 14px;
        border-radius: 10px;
        text-align: center;
        height: 100%;
    }
    
    .prop-box .prop-icon {
        font-size: 24px;
        display: block;
        margin-bottom: 4px;
    }
    
    .prop-box .prop-title {
        font-weight: 700;
        font-size: 13px;
        color: #1a365d;
    }
    
    .prop-box .prop-desc {
        font-size: 10px;
        color: #6c757d;
    }
    
    .prop-box.blue {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
    }
    
    .prop-box.green {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
    }
    
    .prop-box.yellow {
        background: #fffbeb;
        border: 1px solid #fcd34d;
    }
    
    /* ===== ATTACK CARD ===== */
    .attack-card {
        padding: 12px 16px;
        border-radius: 10px;
        border-left: 4px solid #38a169;
        background: #f0fff4;
        margin-bottom: 8px;
    }
    
    .attack-card .attack-title {
        font-weight: 700;
        font-size: 13px;
        color: #1a365d;
    }
    
    .attack-card .attack-desc {
        font-size: 12px;
        color: #4a5568;
        margin: 2px 0;
    }
    
    .attack-card .attack-result {
        font-size: 12px;
        font-weight: 600;
        color: #38a169;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            text-align: center;
        }
        
        .step-indicator {
            flex-wrap: wrap;
            gap: 4px;
            padding: 10px 14px;
        }
        
        .step-dot {
            width: 28px;
            height: 28px;
            font-size: 11px;
        }
        
        .step-line {
            width: 12px;
        }
        
        .step-label {
            font-size: 9px;
        }
        
        .hash-box {
            font-size: 11px;
            padding: 10px 12px;
        }
        
        .hash-box .value {
            font-size: 11px;
        }
    }
</style>

<div class="demo-container fade-in-up">
    
    <!-- ===== HEADER ===== -->
    <div class="page-header">
        <h3>
            <i class="fas fa-shield-alt me-2"></i> Security Demo
        </h3>
        <span class="badge-status">
            <i class="fas fa-check-circle me-1"></i> SHA-256 Identity Binding
        </span>
    </div>

    <!-- ===== STEP INDICATOR ===== -->
    <div class="step-indicator">
        <span class="step-label">Input</span>
        <div class="step-dot done" id="step1">1</div>
        <div class="step-line done"></div>
        <span class="step-label">Concatenate</span>
        <div class="step-dot active" id="step2">2</div>
        <div class="step-line"></div>
        <span class="step-label">SHA-256</span>
        <div class="step-dot" id="step3">3</div>
        <div class="step-line"></div>
        <span class="step-label">Secure Hash</span>
        <div class="step-dot" id="step4">4</div>
    </div>

    <!-- ===== MAIN CARD ===== -->
    <div class="card-modern p-4 p-md-5">
        
        <!-- Title -->
        <h5 class="fw-bold text-center mb-1" style="color: #1a365d;">
            <i class="fas fa-link me-2" style="color: #667eea;"></i>
            How SHA-256 Identity Binding Works
        </h5>
        <p class="text-center text-muted small mb-4">
            Hash = SHA-256(Voucher + Student + Vendor + Amount)
        </p>

        <!-- ===== TWO COLUMN LAYOUT ===== -->
        <div class="row g-4">
            
            <!-- ===== LEFT: INPUT ===== -->
            <div class="col-lg-5">
                <div style="background: #f8fafc; border-radius: 12px; padding: 16px;">
                    <h6 class="fw-bold mb-3" style="color: #1a365d; font-size: 14px;">
                        <i class="fas fa-edit me-2" style="color: #667eea;"></i> Input Components
                    </h6>
                    
                    <div class="input-group-custom">
                        <label><i class="fas fa-ticket-alt"></i> Voucher Code</label>
                        <input type="text" id="voucherInput" class="form-control" 
                               value="VCH<?= uniqid() ?>" 
                               oninput="generateHashDemo()">
                    </div>
                    
                    <div class="input-group-custom">
                        <label><i class="fas fa-user-graduate"></i> Student ID</label>
                        <input type="text" id="studentInput" class="form-control" 
                               value="STU00<?= rand(1, 9) ?>" 
                               oninput="generateHashDemo()">
                    </div>
                    
                    <div class="input-group-custom">
                        <label><i class="fas fa-store"></i> Vendor ID</label>
                        <input type="text" id="vendorInput" class="form-control" 
                               value="Vendor<?= ['Cafe01', 'Kopitiam', 'DeliShop', 'Bistro99'][rand(0, 3)] ?>" 
                               oninput="generateHashDemo()">
                    </div>
                    
                    <div class="input-group-custom">
                        <label><i class="fas fa-ring"></i> Amount (RM)</label>
                        <input type="text" id="amountInput" class="form-control" 
                               value="<?= number_format(rand(5, 25) + 0.00, 2) ?>" 
                               oninput="generateHashDemo()">
                    </div>
                    
                    <button onclick="generateHashDemo()" class="btn-demo w-100 mt-2" id="demoBtn">
                        <i class="fas fa-sync-alt me-2"></i> Generate Hash
                    </button>
                </div>
            </div>
            
            <!-- ===== RIGHT: OUTPUT ===== -->
            <div class="col-lg-7">
                <div style="background: #f8fafc; border-radius: 12px; padding: 16px;">
                    <h6 class="fw-bold mb-3" style="color: #1a365d; font-size: 14px;">
                        <i class="fas fa-code me-2" style="color: #667eea;"></i> Hash Generation
                    </h6>
                    
                    <!-- Concatenated String -->
                    <div class="mb-3">
                        <div class="hash-box" id="concatenatedDisplay">
                            <span class="label">⬇ Step 1: Concatenated String</span>
                            <span class="value" style="color: #f0e6d0; font-size: 11px;">VCH67e8d2a3f1b9cSTU001VendorCafe0110.00</span>
                        </div>
                    </div>
                    
                    <!-- SHA-256 Hash -->
                    <div class="mb-2">
                        <div class="hash-box success" id="hashDisplay">
                            <span class="label">⬇ Step 2: SHA-256 Hash (64 characters)</span>
                            <span class="value">5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8</span>
                        </div>
                    </div>
                    
                    <!-- Time & Properties -->
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i> 
                            <span id="hashTime">0.00</span> ms
                        </small>
                        <div class="d-flex gap-2">
                            <span class="badge" style="background: #e6fffa; color: #234e52; font-size: 10px;">
                                <i class="fas fa-link me-1"></i> Identity Bound
                            </span>
                            <span class="badge" style="background: #fef3c7; color: #92400e; font-size: 10px;">
                                <i class="fas fa-fingerprint me-1"></i> Unique Fingerprint
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- ===== TRY IT YOURSELF ===== -->
        <div class="mt-4 p-3 rounded-3" style="background: #f0f4ff; border: 1px solid #bfdbfe;">
            <div class="d-flex align-items-center gap-3 flex-wrap">
                <div>
                    <i class="fas fa-flask text-primary" style="font-size: 18px;"></i>
                    <span class="fw-bold ms-1" style="color: #1a365d; font-size: 14px;">Try It Yourself!</span>
                    <span class="text-muted d-block" style="font-size: 12px;">Change any input above and watch the hash change completely.</span>
                </div>
                <div class="d-flex gap-2 flex-wrap ms-auto">
                    <button onclick="changeDemo('student')" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-user-graduate"></i> Student
                    </button>
                    <button onclick="changeDemo('vendor')" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-store"></i> Vendor
                    </button>
                    <button onclick="changeDemo('amount')" class="btn btn-outline-warning btn-sm">
                        <i class="fas fa-ring"></i> Amount
                    </button>
                    <button onclick="resetDemo()" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                </div>
            </div>
        </div>

        <!-- ===== SECURITY FEATURES ===== -->
        <div class="mt-4">
            <h6 class="fw-bold mb-2" style="color: #1a365d; font-size: 14px;">
                <i class="fas fa-shield-virus me-2" style="color: #667eea;"></i>
                How SHA-256 Prevents QR Attacks
            </h6>
            <div class="row g-2">
                <div class="col-md-6">
                    <div class="attack-card">
                        <div class="attack-title">🔄 QR Duplication</div>
                        <div class="attack-desc">Copying QR for different student → Hash mismatch</div>
                        <div class="attack-result">✅ PREVENTED</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="attack-card">
                        <div class="attack-title">⏱️ Replay Attack</div>
                        <div class="attack-desc">Scanning same QR twice → Cooldown blocks it</div>
                        <div class="attack-result">✅ PREVENTED</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="attack-card">
                        <div class="attack-title">🏪 Vendor Mismatch</div>
                        <div class="attack-desc">Wrong vendor scans QR → Unauthorized</div>
                        <div class="attack-result">✅ PREVENTED</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="attack-card">
                        <div class="attack-title">✏️ Tampering</div>
                        <div class="attack-desc">Modifying QR data → Hash won't match</div>
                        <div class="attack-result">✅ PREVENTED</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== BACK BUTTON ===== -->
        <div class="text-center mt-4 pt-3 border-top">
            <a href="<?= session()->get('role') == 'admin' ? '/admin' : (session()->get('role') == 'vendor' ? '/vendor/dashboard' : '/student/vouchers') ?>" 
               class="btn btn-outline-secondary px-4" style="border-radius: 8px; font-weight: 600; font-size: 13px;">
                <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
            </a>
        </div>
        
    </div>
</div>

<script>
// ============================================
// ===== MAIN HASH GENERATION =====
// ============================================
async function generateHashDemo() {
    const voucher = document.getElementById('voucherInput').value || 'VCHdemo123';
    const student = document.getElementById('studentInput').value || 'STU001';
    const vendor = document.getElementById('vendorInput').value || 'VendorDemo';
    const amount = document.getElementById('amountInput').value || '10.00';
    
    const concatDisplay = document.getElementById('concatenatedDisplay');
    const hashDisplay = document.getElementById('hashDisplay');
    const btn = document.getElementById('demoBtn');
    
    // Loading state
    concatDisplay.innerHTML = '<span class="label">⬇ Step 1: Concatenated String</span><span class="value" style="color: #f0e6d0; font-size: 11px;">⟳ Generating...</span>';
    hashDisplay.innerHTML = '<span class="label">⬇ Step 2: SHA-256 Hash (64 characters)</span><span class="value">⟳ Computing...</span>';
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Generating...';
    
    await new Promise(r => setTimeout(r, 200));
    
    const concatenated = voucher + student + vendor + amount;
    concatDisplay.innerHTML = `<span class="label">⬇ Step 1: Concatenated String</span><span class="value" style="color: #f0e6d0; font-size: 11px;">${concatenated}</span>`;
    
    try {
        const startTime = performance.now();
        const encoder = new TextEncoder();
        const data = encoder.encode(concatenated);
        const hashBuffer = await crypto.subtle.digest('SHA-256', data);
        const hashArray = Array.from(new Uint8Array(hashBuffer));
        const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');
        const elapsed = (performance.now() - startTime).toFixed(2);
        
        hashDisplay.innerHTML = `<span class="label">⬇ Step 2: SHA-256 Hash (64 characters)</span><span class="value">${hashHex}</span>`;
        document.getElementById('hashTime').textContent = elapsed;
        
        // Update steps
        document.getElementById('step1').className = 'step-dot done';
        document.getElementById('step2').className = 'step-dot done';
        document.getElementById('step3').className = 'step-dot active';
        document.getElementById('step4').className = 'step-dot';
        document.querySelectorAll('.step-line')[0].className = 'step-line done';
        document.querySelectorAll('.step-line')[1].className = 'step-line done';
        
    } catch (error) {
        hashDisplay.innerHTML = `<span class="label">⬇ Step 2: SHA-256 Hash</span><span class="value" style="color: #f87171;">Error: ${error.message}</span>`;
    }
    
    btn.disabled = false;
    btn.innerHTML = '<i class="fas fa-sync-alt me-2"></i> Generate Hash';
}

// ============================================
// ===== HELPER FUNCTIONS =====
// ============================================
function changeDemo(type) {
    const studentInput = document.getElementById('studentInput');
    const vendorInput = document.getElementById('vendorInput');
    const amountInput = document.getElementById('amountInput');
    
    const students = ['STU001', 'STU002', 'STU003', 'STU004', 'STU005', 'STU006'];
    const vendors = ['VendorCafe01', 'VendorKopitiam', 'VendorDeliShop', 'VendorBistro99', 'VendorMamak'];
    const amounts = ['5.00', '10.00', '15.00', '20.00', '25.00', '30.00'];
    
    switch(type) {
        case 'student':
            studentInput.value = students[Math.floor(Math.random() * students.length)];
            break;
        case 'vendor':
            vendorInput.value = vendors[Math.floor(Math.random() * vendors.length)];
            break;
        case 'amount':
            amountInput.value = amounts[Math.floor(Math.random() * amounts.length)];
            break;
    }
    
    generateHashDemo();
}

function resetDemo() {
    document.getElementById('voucherInput').value = 'VCH' + Math.random().toString(36).substr(2, 9);
    document.getElementById('studentInput').value = 'STU00' + Math.floor(Math.random() * 9 + 1);
    document.getElementById('vendorInput').value = ['VendorCafe01', 'VendorKopitiam', 'VendorDeliShop', 'VendorBistro99'][Math.floor(Math.random() * 4)];
    document.getElementById('amountInput').value = (Math.floor(Math.random() * 20 + 5) + 0.00).toFixed(2);
    generateHashDemo();
}

// Auto-generate on load
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(generateHashDemo, 400);
});
</script>

<!-- ===== SWEETALERT ===== -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Add SweetAlert feedback for demo actions
document.addEventListener('DOMContentLoaded', function() {
    // Show info when page loads
    Swal.fire({
        icon: 'info',
        title: '🔐 SHA-256 Demo',
        text: 'Try changing any input to see how the hash changes!',
        confirmButtonColor: '#667eea',
        timer: 4000,
        timerProgressBar: true,
        toast: true,
        position: 'top-end'
    });
});

// Override changeDemo to add SweetAlert
const originalChangeDemo = window.changeDemo;
window.changeDemo = function(type) {
    const labels = {
        'student': 'Student ID',
        'vendor': 'Vendor ID',
        'amount': 'Amount'
    };
    
    Swal.fire({
        icon: 'info',
        title: '🔄 Changed!',
        text: `${labels[type] || 'Value'} has been updated. Watch the hash change!`,
        timer: 1500,
        showConfirmButton: false,
        toast: true,
        position: 'top-end'
    });
    
    originalChangeDemo(type);
};

// Override resetDemo
const originalResetDemo = window.resetDemo;
window.resetDemo = function() {
    Swal.fire({
        icon: 'success',
        title: '🔄 Reset!',
        text: 'All values have been reset to random defaults.',
        timer: 1500,
        showConfirmButton: false,
        toast: true,
        position: 'top-end'
    });
    originalResetDemo();
};
</script>

<?= $this->endSection() ?>