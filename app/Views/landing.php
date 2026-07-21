<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Meal Voucher System' ?></title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        /* ===== RESET & BASE ===== */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        html, body {
            width: 100%;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        
        /* ===== LANDING BACKGROUND ===== */
        .landing-wrapper {
            background: #081225;
            background-image: 
                radial-gradient(circle at 10% 0%, rgba(49, 130, 206, 0.25) 0%, transparent 40%),
                radial-gradient(circle at 90% 10%, rgba(0, 163, 196, 0.2) 0%, transparent 40%),
                radial-gradient(circle at 50% 100%, rgba(26, 54, 93, 0.6) 0%, transparent 60%);
            min-height: 100vh;
            width: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        
        /* ===== NAVBAR ===== */
        .landing-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 24px;
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 40px;
            flex-wrap: wrap;
            gap: 12px;
        }
        
        .landing-nav .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-weight: 700;
            font-size: 20px;
            text-decoration: none;
        }
        
        .landing-nav .brand img {
            height: 40px;
            width: auto;
        }
        
        .landing-nav .nav-links {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .btn-outline-glass {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
            padding: 10px 24px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .btn-outline-glass:hover {
            background: rgba(255,255,255,0.1);
            border-color: rgba(255,255,255,0.4);
            color: white;
        }
        
        .btn-primary-glass {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
            color: white;
            padding: 10px 28px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .btn-primary-glass:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102,126,234,0.4);
            color: white;
        }
        
        /* ===== HERO SECTION ===== */
        .hero-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
            flex: 1;
            padding: 20px 0;
            flex-wrap: wrap;
        }
        
        .hero-content {
            flex: 1;
            min-width: 300px;
        }
        
        .hero-content .badge {
            background: rgba(102,126,234,0.2);
            color: #a8b8ff;
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 16px;
            border: 1px solid rgba(102,126,234,0.2);
        }
        
        .hero-content h1 {
            font-size: clamp(36px, 5vw, 56px);
            font-weight: 900;
            color: white;
            line-height: 1.1;
            margin-bottom: 16px;
        }
        
        .hero-content h1 .highlight {
            background: linear-gradient(135deg, #667eea, #a8b8ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .hero-content p {
            font-size: 18px;
            color: rgba(255,255,255,0.7);
            max-width: 500px;
            line-height: 1.7;
            margin-bottom: 28px;
        }
        
        .hero-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }
        
        .hero-buttons .btn-hero-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            padding: 14px 32px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .hero-buttons .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(102,126,234,0.4);
            color: white;
        }
        
        .hero-buttons .btn-hero-secondary {
            background: rgba(255,255,255,0.08);
            color: white;
            border: 1px solid rgba(255,255,255,0.15);
            padding: 14px 28px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .hero-buttons .btn-hero-secondary:hover {
            background: rgba(255,255,255,0.15);
            color: white;
        }
        
        /* ============================================ */
        /* ===== PHONE MOCKUP - LIVE PREVIEW ===== */
        /* ============================================ */
        .hero-visual {
            flex: 1;
            min-width: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .phone-mockup {
            background: rgba(255,255,255,0.05);
            border-radius: 32px;
            padding: 20px;
            border: 1px solid rgba(255,255,255,0.08);
            max-width: 380px;
            width: 100%;
            backdrop-filter: blur(10px);
            animation: glowBorder 4s ease-in-out infinite;
            transition: all 0.5s ease;
        }
        
        .phone-mockup:hover {
            transform: scale(1.02);
            border-color: rgba(102,126,234,0.3);
        }
        
        @keyframes glowBorder {
            0%, 100% { box-shadow: 0 0 20px rgba(102,126,234,0.1), inset 0 0 20px rgba(102,126,234,0.05); }
            50% { box-shadow: 0 0 50px rgba(102,126,234,0.2), inset 0 0 40px rgba(102,126,234,0.08); }
        }
        
        .phone-mockup .screen {
            background: #0d1a2b;
            border-radius: 20px;
            padding: 20px;
            min-height: 400px;
            position: relative;
            overflow: hidden;
        }
        
        /* === SCAN LINE ANIMATION === */
        .scan-line {
            position: absolute;
            left: 10%;
            right: 10%;
            height: 3px;
            background: linear-gradient(90deg, transparent, #667eea, #a8b8ff, #667eea, transparent);
            border-radius: 2px;
            animation: scanMove 3.5s ease-in-out infinite;
            box-shadow: 0 0 25px rgba(102, 126, 234, 0.4);
            opacity: 0;
            z-index: 5;
        }
        
        .scan-line.active {
            opacity: 0.8;
        }
        
        @keyframes scanMove {
            0% { top: 15%; opacity: 0; }
            10% { opacity: 0.8; }
            50% { top: 75%; opacity: 0.8; }
            55% { opacity: 0; }
            100% { top: 15%; opacity: 0; }
        }
        
        /* === QR CODE PULSE === */
        .qr-preview {
            background: white;
            width: 120px;
            height: 120px;
            margin: 15px auto;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            transition: all 0.6s ease;
            position: relative;
            z-index: 2;
        }
        
        .qr-preview img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: all 0.5s ease;
        }
        
        .qr-preview.scanning {
            animation: qrPulse 1.2s ease-in-out infinite;
            box-shadow: 0 0 30px rgba(102,126,234,0.3);
        }
        
        .qr-preview.verified {
            animation: qrVerified 0.8s ease;
            box-shadow: 0 0 40px rgba(16,185,129,0.4);
        }
        
        @keyframes qrPulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(102,126,234,0.2); }
            50% { transform: scale(1.05); box-shadow: 0 0 40px rgba(102,126,234,0.3); }
        }
        
        @keyframes qrVerified {
            0% { transform: scale(0.9); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        /* === STATUS PILL === */
        .status-pill {
            display: inline-block;
            padding: 5px 16px;
            border-radius: 50px;
            color: white;
            font-size: 12px;
            font-weight: 700;
            transition: all 0.8s ease;
            position: relative;
            z-index: 2;
            letter-spacing: 0.5px;
        }
        
        .status-pill.active {
            background: #10b981;
        }
        
        .status-pill.scanning {
            background: #f59e0b;
            animation: statusPulse 0.8s ease-in-out infinite;
        }
        
        .status-pill.verified {
            background: #3b82f6;
        }
        
        .status-pill.used {
            background: #ef4444;
        }
        
        @keyframes statusPulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.6; }
        }
        
        /* === MOCKUP CONTENT === */
        .mockup-content {
            text-align: center;
            color: white;
            position: relative;
            z-index: 2;
        }
        
        .mockup-label {
            font-size: 12px;
            color: rgba(255,255,255,0.4);
            transition: all 0.5s ease;
        }
        
        .mockup-student {
            font-size: 12px;
            color: rgba(255,255,255,0.4);
            transition: all 0.5s ease;
        }
        
        .mockup-amount {
            font-size: 16px;
            font-weight: 700;
            color: #667eea;
            margin-top: 6px;
            transition: all 0.5s ease;
        }
        
        .mockup-status-text {
            font-size: 11px;
            color: rgba(255,255,255,0.3);
            margin-top: 6px;
            min-height: 18px;
            transition: all 0.5s ease;
        }
        
        .mockup-status-text.success {
            color: #34d399;
        }
        
        .mockup-status-text.error {
            color: #f87171;
        }
        
        .mockup-status-text.info {
            color: #60a5fa;
        }
        
        /* === FADE IN ANIMATION FOR CONTENT CHANGE === */
        .fade-change {
            animation: fadeChange 0.4s ease;
        }
        
        @keyframes fadeChange {
            0% { opacity: 0; transform: translateY(8px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        
        /* ============================================ */
        /* ===== FEATURES SECTION ===== */
        /* ============================================ */
        .features-section {
            margin-top: 60px;
            padding: 40px 0;
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        
        .features-section h2 {
            color: white;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
            font-size: 28px;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        
        .feature-card {
            background: rgba(255,255,255,0.04);
            border-radius: 16px;
            padding: 24px;
            text-align: center;
            border: 1px solid rgba(255,255,255,0.06);
            transition: all 0.3s;
        }
        
        .feature-card:hover {
            background: rgba(255,255,255,0.08);
            transform: translateY(-5px);
        }
        
        .feature-card .icon {
            font-size: 32px;
            margin-bottom: 12px;
            color: #667eea;
        }
        
        .feature-card h6 {
            color: white;
            font-weight: 600;
            margin-bottom: 6px;
        }
        
        .feature-card p {
            color: rgba(255,255,255,0.5);
            font-size: 13px;
            margin: 0;
        }
        
        /* ============================================ */
        /* ===== STATS BAR ===== */
        /* ============================================ */
        .stats-bar {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 30px;
            padding: 20px;
            background: rgba(255,255,255,0.03);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.05);
            flex-wrap: wrap;
        }
        
        .stats-bar .stat-item {
            text-align: center;
        }
        
        .stats-bar .stat-item .number {
            font-size: 28px;
            font-weight: 800;
            color: #667eea;
        }
        
        .stats-bar .stat-item .label {
            font-size: 13px;
            color: rgba(255,255,255,0.5);
        }
        
        /* ============================================ */
        /* ===== RESPONSIVE ===== */
        /* ============================================ */
        @media (max-width: 768px) {
            .hero-section {
                flex-direction: column;
                text-align: center;
            }
            
            .hero-content p {
                max-width: 100%;
                margin-left: auto;
                margin-right: auto;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .landing-nav {
                flex-direction: column;
                align-items: stretch;
                text-align: center;
            }
            
            .landing-nav .nav-links {
                justify-content: center;
            }
            
            .stats-bar {
                gap: 20px;
            }
            
            .phone-mockup {
                max-width: 300px;
            }
        }
        
        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 28px;
            }
            
            .hero-buttons .btn-hero-primary,
            .hero-buttons .btn-hero-secondary {
                width: 100%;
                justify-content: center;
            }
            
            .landing-nav .brand {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<div class="landing-wrapper">
    
    <!-- ===== NAVBAR ===== -->
    <nav class="landing-nav">
        <a href="/" class="brand">
            <img src="/images/system-logo.png" alt="Logo">
            Meal Voucher System
        </a>
        <div class="nav-links">
            <a href="/demo" class="btn-outline-glass">
                <i class="fas fa-play-circle"></i> Live Demo
            </a>
            <a href="/security-demo" class="btn-outline-glass">
                <i class="fas fa-shield-alt"></i> Security
            </a>
            <a href="/login" class="btn-outline-glass">
                <i class="fas fa-sign-in-alt"></i> Login
            </a>
            <a href="/register" class="btn-primary-glass">
                <i class="fas fa-user-plus"></i> Sign Up
            </a>
        </div>
    </nav>
    
    <!-- ===== HERO SECTION ===== -->
    <div class="hero-section">
        <div class="hero-content">
            <span class="badge">
                <i class="fas fa-shield-halved"></i> SHA-256 Secured
            </span>
            <h1>
                Smart QR<br>
                <span class="highlight">Meal Voucher</span><br>
                System
            </h1>
            <p>
                Digital voucher management for campus cafeterias. 
                Generate, scan, and verify vouchers instantly with 
                secure identity binding.
            </p>
            <div class="hero-buttons">
                <a href="/register" class="btn-hero-primary">
                    <i class="fas fa-rocket"></i> Get Started
                </a>
                <a href="/demo" class="btn-hero-secondary">
                    <i class="fas fa-play-circle"></i> Watch Demo
                </a>
            </div>
            
            <!-- Stats -->
            <div class="stats-bar">
                <div class="stat-item">
                    <div class="number"><?= $total_vouchers ?? 0 ?></div>
                    <div class="label">Vouchers Generated</div>
                </div>
                <div class="stat-item">
                    <div class="number"><?= $total_used ?? 0 ?></div>
                    <div class="label">Successfully Redeemed</div>
                </div>
                <div class="stat-item">
                    <div class="number" style="color: #10b981;">100%</div>
                    <div class="label">Digital Paperless</div>
                </div>
            </div>
        </div>
        
        <!-- ===== PHONE MOCKUP - LIVE PREVIEW ===== -->
        <div class="hero-visual">
            <div class="phone-mockup">
                <div class="screen">
                    <!-- Scan Line Animation -->
                    <div class="scan-line" id="scanLine"></div>
                    
                    <div class="mockup-content">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:10px;">
                            <span class="mockup-label" id="mockupLabel">
                                <i class="fas fa-ticket-alt"></i> Voucher
                            </span>
                            <span class="status-pill active" id="statusPill">Active</span>
                        </div>
                        
                        <div class="qr-preview" id="qrPreview">
                            <img id="qrImage" src="https://api.qrserver.com/v1/create-qr-code/?data=VCHdemo123&size=100" alt="QR Demo">
                        </div>
                        
                        <div class="mockup-student" id="mockupStudent">
                            <i class="fas fa-user-graduate"></i> STU001
                        </div>
                        
                        <div class="mockup-amount" id="mockupAmount">
                            RM 10.00
                        </div>
                        
                        <div class="mockup-status-text" id="mockupStatusText">
                            Scan to redeem at cafeteria
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- ===== FEATURES ===== -->
    <div class="features-section">
        <h2>Why Choose Meal Voucher System?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="icon"><i class="fas fa-qrcode"></i></div>
                <h6>QR Code Based</h6>
                <p>Instant scanning and verification</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-shield-halved"></i></div>
                <h6>SHA-256 Secured</h6>
                <p>Identity binding prevents fraud</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-bolt"></i></div>
                <h6>Real-time Verification</h6>
                <p>Results in under 5 seconds</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-mobile-screen-button"></i></div>
                <h6>PWA Ready</h6>
                <p>Install as mobile app</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-users"></i></div>
                <h6>3 Role System</h6>
                <p>Admin, Vendor, Student</p>
            </div>
            <div class="feature-card">
                <div class="icon"><i class="fas fa-chart-line"></i></div>
                <h6>Real-time Dashboard</h6>
                <p>Track all voucher activities</p>
            </div>
        </div>
    </div>
    
    <!-- ===== FOOTER ===== -->
    <div style="text-align:center; padding:30px 0 10px; border-top:1px solid rgba(255,255,255,0.05); margin-top:30px;">
        <p style="color:rgba(255,255,255,0.2); font-size:13px;">
            &copy; <?= date('Y') ?> Meal Voucher System. All rights reserved.
        </p>
    </div>
    
</div>

<!-- ============================================ -->
<!-- ===== LIVE PREVIEW JAVASCRIPT ===== -->
<!-- ============================================ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== DEMO DATA =====
    const demoSteps = [
        {
            label: 'Voucher',
            status: 'Active',
            statusClass: 'active',
            student: 'STU001',
            amount: '10.00',
            text: 'Scan to redeem at cafeteria',
            textClass: '',
            qr: 'VCHdemo123'
        },
        {
            label: 'Scanning...',
            status: 'Scanning',
            statusClass: 'scanning',
            student: 'STU001',
            amount: '10.00',
            text: '🔍 Vendor is scanning QR code...',
            textClass: 'info',
            qr: 'VCHdemo123'
        },
        {
            label: 'Verifying...',
            status: 'Verifying',
            statusClass: 'scanning',
            student: 'STU001',
            amount: '10.00',
            text: '⚡ Checking SHA-256 hash...',
            textClass: 'info',
            qr: 'VCHdemo123'
        },
        {
            label: 'Verified! ✅',
            status: 'Verified',
            statusClass: 'verified',
            student: 'STU001',
            amount: '10.00',
            text: '✅ Voucher redeemed successfully!',
            textClass: 'success',
            qr: 'VCHdemo123'
        },
        {
            label: 'Voucher',
            status: 'Active',
            statusClass: 'active',
            student: 'STU002',
            amount: '15.00',
            text: 'Scan to redeem at cafeteria',
            textClass: '',
            qr: 'VCHdemo456'
        },
        {
            label: 'Voucher',
            status: 'Active',
            statusClass: 'active',
            student: 'STU003',
            amount: '20.00',
            text: 'Scan to redeem at cafeteria',
            textClass: '',
            qr: 'VCHdemo789'
        }
    ];
    
    let currentStep = 0;
    let isAnimating = false;
    let intervalId = null;
    
    // DOM Elements
    const mockupLabel = document.getElementById('mockupLabel');
    const statusPill = document.getElementById('statusPill');
    const qrPreview = document.getElementById('qrPreview');
    const qrImage = document.getElementById('qrImage');
    const mockupStudent = document.getElementById('mockupStudent');
    const mockupAmount = document.getElementById('mockupAmount');
    const mockupStatusText = document.getElementById('mockupStatusText');
    const scanLine = document.getElementById('scanLine');
    
    // ===== UPDATE MOCKUP FUNCTION =====
    function updateMockup() {
        if (isAnimating) return;
        isAnimating = true;
        
        const step = demoSteps[currentStep];
        
        // Update label with animation
        mockupLabel.classList.remove('fade-change');
        void mockupLabel.offsetWidth;
        mockupLabel.innerHTML = `<i class="fas fa-ticket-alt"></i> ${step.label}`;
        mockupLabel.classList.add('fade-change');
        
        // Update status pill
        statusPill.className = `status-pill ${step.statusClass}`;
        statusPill.textContent = step.status;
        
        // Update student
        mockupStudent.classList.remove('fade-change');
        void mockupStudent.offsetWidth;
        mockupStudent.innerHTML = `<i class="fas fa-user-graduate"></i> ${step.student}`;
        mockupStudent.classList.add('fade-change');
        
        // Update amount
        mockupAmount.classList.remove('fade-change');
        void mockupAmount.offsetWidth;
        mockupAmount.textContent = `RM ${step.amount}`;
        mockupAmount.classList.add('fade-change');
        
        // Update status text
        mockupStatusText.className = `mockup-status-text ${step.textClass}`;
        mockupStatusText.textContent = step.text;
        
        // Update QR code with rotation effect
        qrPreview.classList.remove('scanning', 'verified');
        
        // Handle scan animation
        if (step.statusClass === 'scanning') {
            qrPreview.classList.add('scanning');
            scanLine.classList.add('active');
        } else {
            scanLine.classList.remove('active');
        }
        
        if (step.statusClass === 'verified') {
            qrPreview.classList.add('verified');
        }
        
        // Update QR image with smooth transition
        qrImage.style.transition = 'opacity 0.4s ease, transform 0.6s ease';
        qrImage.style.opacity = '0';
        qrImage.style.transform = 'scale(0.8) rotate(10deg)';
        
        setTimeout(() => {
            qrImage.src = `https://api.qrserver.com/v1/create-qr-code/?data=${step.qr}&size=100&t=${Date.now()}`;
            qrImage.style.opacity = '1';
            qrImage.style.transform = 'scale(1) rotate(0deg)';
        }, 300);
        
        // Move to next step
        currentStep = (currentStep + 1) % demoSteps.length;
        
        // Allow next update after animation
        setTimeout(() => {
            isAnimating = false;
        }, 800);
    }
    
    // ===== START AUTO ROTATE =====
    function startAutoRotate() {
        if (intervalId) clearInterval(intervalId);
        intervalId = setInterval(updateMockup, 3500);
    }
    
    // ===== HOVER EFFECT - SPEED UP =====
    const mockup = document.querySelector('.phone-mockup');
    mockup.addEventListener('mouseenter', function() {
        if (intervalId) {
            clearInterval(intervalId);
            // Speed up: update every 1.5s on hover
            intervalId = setInterval(updateMockup, 1500);
        }
    });
    
    mockup.addEventListener('mouseleave', function() {
        if (intervalId) {
            clearInterval(intervalId);
            startAutoRotate();
        }
    });
    
    // ===== INITIAL LOAD =====
    setTimeout(updateMockup, 500);
    startAutoRotate();
    
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>