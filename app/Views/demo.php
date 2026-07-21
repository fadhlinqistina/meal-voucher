<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* ===== RESET & COMPACT ===== */
    .demo-container {
        max-width: 820px;
        margin: 0 auto;
        padding: 0 10px;
    }
    
    /* ===== ROLE SELECTOR - COMPACT ===== */
    .role-selector {
        display: flex;
        gap: 8px;
        justify-content: center;
        margin-bottom: 16px;
        flex-wrap: wrap;
    }
    
    .role-btn {
        padding: 8px 20px;
        border-radius: 10px;
        border: 2px solid rgba(255,255,255,0.15);
        background: rgba(255,255,255,0.05);
        font-weight: 600;
        font-size: 14px;
        color: rgba(255,255,255,0.6);
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .role-btn:hover {
        border-color: #667eea;
        color: white;
        transform: translateY(-2px);
    }
    
    .role-btn.active {
        border-color: #667eea;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        box-shadow: 0 4px 15px rgba(102,126,234,0.3);
    }
    
    .role-btn i {
        margin-right: 6px;
    }
    
    /* ===== DEMO CARD - COMPACT ===== */
    .demo-card {
        background: rgba(255,255,255,0.98);
        border-radius: 16px;
        padding: 20px 24px 18px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    }
    
    /* ===== STEP INDICATOR - COMPACT ===== */
    .step-indicator {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 4px;
        margin-bottom: 14px;
    }
    
    .step-dot {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: #e2e8f0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 12px;
        color: #4a5568;
        transition: all 0.4s;
        flex-shrink: 0;
    }
    
    .step-dot.active {
        background: #667eea;
        color: white;
        transform: scale(1.1);
        box-shadow: 0 3px 12px rgba(102,126,234,0.4);
    }
    
    .step-dot.done {
        background: #38a169;
        color: white;
    }
    
    .step-line {
        width: 28px;
        height: 2px;
        background: #e2e8f0;
        flex-shrink: 0;
    }
    
    .step-line.done {
        background: #38a169;
    }
    
    /* ===== PREVIEW AREA - COMPACT ===== */
    .demo-preview {
        background: #f8fafc;
        border-radius: 12px;
        padding: 16px 20px;
        min-height: 140px;
        border: 2px dashed #e2e8f0;
        transition: all 0.4s;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
    }
    
    .demo-preview.active {
        border-color: #667eea;
        background: #f0f4ff;
    }
    
    .demo-icon {
        font-size: 38px;
        color: #667eea;
        margin-bottom: 6px;
    }
    
    .demo-title {
        font-size: 17px;
        font-weight: 700;
        color: #1a365d;
    }
    
    .demo-desc {
        font-size: 14px;
        color: #4a5568;
        max-width: 420px;
        margin: 0 auto;
    }
    
    /* ===== CONTROLS - COMPACT ===== */
    .demo-controls {
        display: flex;
        gap: 10px;
        justify-content: center;
        margin-top: 14px;
        flex-wrap: wrap;
    }
    
    .btn-demo {
        padding: 8px 22px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 13px;
        border: none;
        transition: all 0.3s;
        cursor: pointer;
    }
    
    .btn-demo-primary {
        background: #667eea;
        color: white;
    }
    
    .btn-demo-primary:hover {
        background: #5a6fd6;
        transform: translateY(-2px);
    }
    
    .btn-demo-secondary {
        background: #e2e8f0;
        color: #4a5568;
    }
    
    .btn-demo-secondary:hover {
        background: #cbd5e1;
    }
    
    .btn-demo-success {
        background: #38a169;
        color: white;
    }
    
    .btn-demo-success:hover {
        background: #2f855a;
        transform: translateY(-2px);
    }
    
    /* ===== ATTACK GRID - COMPACT ===== */
    .attack-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-top: 10px;
    }
    
    .attack-card {
        padding: 10px 12px;
        border-radius: 10px;
        background: #f0fff4;
        border-left: 3px solid #38a169;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    
    .attack-card .attack-icon {
        font-size: 20px;
        display: block;
        margin-bottom: 2px;
    }
    
    .attack-card .attack-title {
        font-weight: 700;
        font-size: 12px;
        color: #1a365d;
    }
    
    .attack-card .attack-desc {
        font-size: 10px;
        color: #4a5568;
        margin: 2px 0;
    }
    
    .attack-card .attack-result {
        font-size: 10px;
        font-weight: 600;
        color: #38a169;
    }
    
    /* ===== QUICK STATS - COMPACT ===== */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
        margin-top: 10px;
    }
    
    .stat-box {
        padding: 10px;
        text-align: center;
        background: #f8fafc;
        border-radius: 10px;
    }
    
    .stat-box .number {
        font-size: 22px;
        font-weight: 800;
        color: #667eea;
    }
    
    .stat-box .label {
        font-size: 11px;
        color: #4a5568;
        display: block;
    }
    
    .stat-box .number.success { color: #38a169; }
    .stat-box .number.warning { color: #d69e2e; }
    .stat-box .number.danger { color: #ef4444; }
    
    /* ===== SECTION TITLES - COMPACT ===== */
    .section-title {
        font-size: 15px;
        font-weight: 700;
        color: #1a365d;
        margin-bottom: 8px;
    }
    
    .section-title i {
        color: #667eea;
        margin-right: 6px;
    }
    
    .section-sub {
        font-size: 12px;
        color: #6c757d;
        margin-bottom: 8px;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .attack-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .demo-preview {
            min-height: 120px;
            padding: 12px 16px;
        }
        
        .demo-icon {
            font-size: 30px;
        }
        
        .demo-title {
            font-size: 15px;
        }
        
        .demo-desc {
            font-size: 13px;
        }
        
        .role-btn {
            padding: 6px 14px;
            font-size: 12px;
        }
        
        .step-dot {
            width: 28px;
            height: 28px;
            font-size: 11px;
        }
        
        .step-line {
            width: 16px;
        }
    }
    
    @media (max-width: 480px) {
        .attack-grid {
            grid-template-columns: 1fr 1fr;
            gap: 6px;
        }
        
        .stats-grid {
            grid-template-columns: 1fr 1fr;
            gap: 6px;
        }
        
        .demo-card {
            padding: 14px 12px;
        }
        
        .btn-demo {
            padding: 6px 14px;
            font-size: 12px;
        }
        
        .demo-controls {
            gap: 6px;
        }
    }
</style>

<div class="demo-container fade-in-up">
    
    <!-- Header -->
    <h4 class="fw-bold text-center text-white mb-1">
        <i class="fas fa-play-circle me-2"></i> Live Demo
    </h4>
    <p class="text-center text-white-50 small mb-3">
        See how the system works for each role
    </p>

    <!-- ===== ROLE SELECTOR ===== -->
    <div class="role-selector">
        <button class="role-btn active" data-role="admin" onclick="switchRole('admin')">
            <i class="fas fa-user-shield"></i> Admin
        </button>
        <button class="role-btn" data-role="student" onclick="switchRole('student')">
            <i class="fas fa-user-graduate"></i> Student
        </button>
        <button class="role-btn" data-role="vendor" onclick="switchRole('vendor')">
            <i class="fas fa-user-tie"></i> Vendor
        </button>
    </div>

    <!-- ===== DEMO CARD ===== -->
    <div class="demo-card">
        
        <!-- Step Indicator -->
        <div class="step-indicator" id="stepIndicator">
            <!-- Generated by JS -->
        </div>

        <!-- Preview Area -->
        <div class="demo-preview" id="demoPreview">
            <div class="demo-icon" id="demoIcon">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="demo-title" id="demoTitle">Welcome to Admin Demo</div>
            <div class="demo-desc" id="demoDesc">
                Click "Next Step" to see how an admin generates vouchers
            </div>
        </div>

        <!-- Controls -->
        <div class="demo-controls">
            <button class="btn-demo btn-demo-secondary" onclick="prevStep()" id="prevBtn" disabled>
                <i class="fas fa-arrow-left me-1"></i> Prev
            </button>
            <button class="btn-demo btn-demo-primary" onclick="nextStep()" id="nextBtn">
                Next <i class="fas fa-arrow-right ms-1"></i>
            </button>
            <button class="btn-demo btn-demo-success" onclick="resetDemo()">
                <i class="fas fa-redo me-1"></i> Reset
            </button>
        </div>
    </div>

    <!-- ===== SECURITY ATTACK SIMULATOR ===== -->
    <div class="demo-card mt-3">
        <div class="section-title">
            <i class="fas fa-shield-virus"></i> Security Attack Simulator
        </div>
        <p class="section-sub">How SHA-256 identity binding prevents common QR attacks</p>
        
        <div class="attack-grid">
            <div class="attack-card">
                <span class="attack-icon">🔄</span>
                <div class="attack-title">QR Duplication</div>
                <div class="attack-desc">Copying QR for different student</div>
                <div class="attack-result">✅ PREVENTED</div>
            </div>
            <div class="attack-card">
                <span class="attack-icon">⏱️</span>
                <div class="attack-title">Replay Attack</div>
                <div class="attack-desc">Scanning same QR twice</div>
                <div class="attack-result">✅ PREVENTED</div>
            </div>
            <div class="attack-card">
                <span class="attack-icon">🏪</span>
                <div class="attack-title">Vendor Mismatch</div>
                <div class="attack-desc">Wrong vendor scans QR</div>
                <div class="attack-result">✅ PREVENTED</div>
            </div>
            <div class="attack-card">
                <span class="attack-icon">✏️</span>
                <div class="attack-title">Tampering</div>
                <div class="attack-desc">Modifying QR data</div>
                <div class="attack-result">✅ PREVENTED</div>
            </div>
        </div>
    </div>

    <!-- ===== QUICK STATS ===== -->
    <div class="demo-card mt-3">
        <div class="section-title">
            <i class="fas fa-chart-bar"></i> System Impact
        </div>
        <div class="stats-grid">
            <div class="stat-box">
                <div class="number"><?= $total ?? 0 ?></div>
                <span class="label">Total Vouchers</span>
            </div>
            <div class="stat-box">
                <div class="number success"><?= $used ?? 0 ?></div>
                <span class="label">Redeemed</span>
            </div>
            <div class="stat-box">
                <div class="number warning">RM <?= number_format($total_value ?? 0, 0) ?></div>
                <span class="label">Total Value</span>
            </div>
            <div class="stat-box">
                <div class="number danger"><?= $fraud_prevented ?? 0 ?></div>
                <span class="label">Attacks Blocked</span>
            </div>
        </div>
    </div>
    
</div>

<!-- ============================================ -->
<!-- ===== JAVASCRIPT ===== -->
<!-- ============================================ -->
<script>
let currentRole = 'admin';
let currentStep = 0;

// Demo data for each role
const demoData = {
    admin: {
        steps: [
            { icon: 'fa-user-graduate', title: 'Select Student', desc: 'Choose a student from the dropdown list' },
            { icon: 'fa-store', title: 'Select Vendor', desc: 'Choose which vendor will accept this voucher' },
            { icon: 'fa-ring', title: 'Set Amount & Expiry', desc: 'Enter voucher value (RM) and expiry date' },
            { icon: 'fa-qrcode', title: 'Generate QR Code', desc: 'System creates unique SHA-256 hash & QR' }
        ]
    },
    student: {
        steps: [
            { icon: 'fa-ticket-alt', title: 'View Vouchers', desc: 'See all vouchers assigned to you' },
            { icon: 'fa-download', title: 'Download QR', desc: 'Save QR code to show at cafeteria' },
            { icon: 'fa-hand', title: 'Show at Counter', desc: 'Present QR to vendor for scanning' }
        ]
    },
    vendor: {
        steps: [
            { icon: 'fa-camera', title: 'Open Scanner', desc: 'Launch QR scanner via camera' },
            { icon: 'fa-qrcode', title: 'Scan QR', desc: 'Point camera at student\'s QR code' },
            { icon: 'fa-check-circle', title: 'Instant Verification', desc: 'System checks: Valid? Used? Expired?' },
            { icon: 'fa-bell', title: 'Result Displayed', desc: 'VALID ✅ or error message' }
        ]
    }
};

function switchRole(role) {
    currentRole = role;
    currentStep = 0;
    
    document.querySelectorAll('.role-btn').forEach(btn => {
        btn.classList.toggle('active', btn.dataset.role === role);
    });
    
    renderStep();
}

function renderStep() {
    const data = demoData[currentRole];
    const step = data.steps[currentStep];
    
    // Update indicator
    const indicator = document.getElementById('stepIndicator');
    let html = '';
    for (let i = 0; i < data.steps.length; i++) {
        const cls = i < currentStep ? 'done' : (i === currentStep ? 'active' : '');
        html += `<div class="step-dot ${cls}">${i + 1}</div>`;
        if (i < data.steps.length - 1) {
            html += `<div class="step-line ${i < currentStep ? 'done' : ''}"></div>`;
        }
    }
    indicator.innerHTML = html;
    
    // Update preview
    document.getElementById('demoIcon').innerHTML = `<i class="fas ${step.icon}"></i>`;
    document.getElementById('demoTitle').textContent = step.title;
    document.getElementById('demoDesc').textContent = step.desc;
    
    // Update buttons
    document.getElementById('prevBtn').disabled = currentStep === 0;
    const nextBtn = document.getElementById('nextBtn');
    nextBtn.textContent = currentStep === data.steps.length - 1 ? '✅ Complete' : 'Next →';
}

function nextStep() {
    const data = demoData[currentRole];
    if (currentStep < data.steps.length - 1) {
        currentStep++;
        renderStep();
        document.getElementById('demoPreview').classList.add('active');
        setTimeout(() => document.getElementById('demoPreview').classList.remove('active'), 400);
    }
}

function prevStep() {
    if (currentStep > 0) {
        currentStep--;
        renderStep();
    }
}

function resetDemo() {
    currentStep = 0;
    renderStep();
}

document.addEventListener('DOMContentLoaded', renderStep);
</script>

<!-- ===== SWEETALERT ===== -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Add SweetAlert feedback for demo actions
document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
        icon: 'info',
        title: '🎯 Live Demo',
        text: 'Select a role and click "Next Step" to see how the system works!',
        confirmButtonColor: '#667eea',
        timer: 4000,
        timerProgressBar: true,
        toast: true,
        position: 'top-end'
    });
});

// Override nextStep
const originalNextStep = window.nextStep;
window.nextStep = function() {
    const data = demoData[currentRole];
    if (currentStep < data.steps.length - 1) {
        Swal.fire({
            icon: 'success',
            title: '✅ Step Complete!',
            text: `Moved to step ${currentStep + 2} of ${data.steps.length}`,
            timer: 1200,
            showConfirmButton: false,
            toast: true,
            position: 'top-end'
        });
    } else {
        Swal.fire({
            icon: 'success',
            title: '🎉 Demo Complete!',
            text: 'You have completed all steps for this role.',
            confirmButtonColor: '#667eea',
            timer: 3000
        });
    }
    originalNextStep();
};

// Override switchRole
const originalSwitchRole = window.switchRole;
window.switchRole = function(role) {
    const roleNames = {
        'admin': 'Admin',
        'student': 'Student',
        'vendor': 'Vendor'
    };
    Swal.fire({
        icon: 'info',
        title: `👤 ${roleNames[role]}`,
        text: `Switched to ${roleNames[role]} demo. Click "Next Step" to begin.`,
        timer: 1500,
        showConfirmButton: false,
        toast: true,
        position: 'top-end'
    });
    originalSwitchRole(role);
};
</script>

<?= $this->endSection() ?>