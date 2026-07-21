<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* ===== BACKGROUND ===== */
    body {
        background-color: #081225 !important;
        background-image: 
            radial-gradient(circle at 10% 0%, rgba(49, 130, 206, 0.25) 0%, transparent 40%),
            radial-gradient(circle at 90% 10%, rgba(0, 163, 196, 0.2) 0%, transparent 40%),
            radial-gradient(circle at 50% 100%, rgba(26, 54, 93, 0.6) 0%, transparent 60%) !important;
        background-attachment: fixed !important;
        color: #e2e8f0;
    }

    .dash-title {
        color: #ffffff !important;
        text-shadow: 0 4px 15px rgba(0,0,0,0.3);
        letter-spacing: 0.5px;
    }

    .dash-date-pill {
        background: rgba(255, 255, 255, 0.08) !important;
        border: 1px solid rgba(255, 255, 255, 0.15) !important;
        color: #f8fafc !important;
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    
    .dash-date-pill i {
        color: #00a3c4 !important;
    }

    .card-modern {
        background: #ffffff;
        border: none !important;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2) !important;
    }

    /* ===== STATS CARDS ===== */
    .stat-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 20px 18px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    
    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.12);
    }
    
    .stat-card .stat-icon {
        font-size: 28px;
        margin-bottom: 8px;
        display: inline-block;
    }
    
    .stat-card .stat-label {
        font-size: 12px;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-weight: 600;
        margin-bottom: 2px;
    }
    
    .stat-card .stat-number {
        font-size: 28px;
        font-weight: 800;
        margin: 0;
        line-height: 1.2;
    }

    /* ============================================ */
    /* ===== VOUCHER CARD - BORDER THEME ===== */
    /* ============================================ */
    .voucher-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 16px;
        text-align: center;
        transition: all 0.3s ease;
        height: 100%;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        border-width: 3px;
        border-style: solid;
    }
    
    .voucher-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0,0,0,0.12);
    }
    
    /* Active Voucher - Green Border */
    .voucher-card.active {
        border-color: #10b981;
    }
    
    .voucher-card.active:hover {
        border-color: #059669;
        box-shadow: 0 12px 35px rgba(16, 185, 129, 0.15);
    }
    
    /* Used Voucher - Grey Border */
    .voucher-card.used {
        border-color: #9ca3af;
        opacity: 0.75;
    }
    
    .voucher-card.used:hover {
        border-color: #6b7280;
        box-shadow: 0 12px 35px rgba(0,0,0,0.08);
    }
    
    /* Expired Voucher - Red Border */
    .voucher-card.expired {
        border-color: #ef4444;
        opacity: 0.8;
    }
    
    .voucher-card.expired:hover {
        border-color: #dc2626;
        box-shadow: 0 12px 35px rgba(239, 68, 68, 0.12);
    }
    
    .voucher-card .qr-container {
        background: #f8fafc;
        padding: 8px;
        border-radius: 12px;
        display: inline-block;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        border: 1px solid #e2e8f0;
    }
    
    .voucher-card .qr-container img {
        width: 100px;
        height: 100px;
        object-fit: contain;
    }
    
    /* Badge on cards */
    .badge-status {
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 10px;
        font-weight: 700;
        display: inline-block;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }
    
    .badge-unused {
        background: #d1fae5;
        color: #065f46;
    }
    
    .badge-used {
        background: #f3f4f6;
        color: #4b5563;
    }
    
    .badge-expired {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .voucher-card code {
        background: #f1f5f9;
        color: #1a365d;
        padding: 2px 8px;
        border-radius: 6px;
        font-size: 11px;
    }
    
    .voucher-card .info-box {
        border-radius: 8px;
        padding: 6px 12px;
        font-size: 11px;
        margin-bottom: 8px;
    }
    
    .voucher-card .info-box.info {
        background: #eff6ff;
        color: #1e40af;
        border: 1px solid #bfdbfe;
    }
    
    .voucher-card .info-box.success {
        background: #ecfdf5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }
    
    .voucher-card .info-box.danger {
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fca5a5;
    }
    
    .voucher-card .info-box.warning {
        background: #fffbeb;
        color: #92400e;
        border: 1px solid #fcd34d;
    }
    
    .voucher-card .btn-outline-voucher {
        border-radius: 8px;
        font-weight: 600;
        font-size: 12px;
        padding: 6px 12px;
        transition: all 0.3s;
        width: 100%;
        border: 1px solid #e2e8f0;
        background: #f8fafc;
        color: #1a365d;
    }
    
    .voucher-card .btn-outline-voucher:hover {
        background: #1a365d;
        color: white;
        border-color: #1a365d;
    }
    
    .voucher-card .btn-outline-voucher:disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }
    
    .voucher-card .btn-outline-voucher:disabled:hover {
        background: #f8fafc;
        color: #1a365d;
        border-color: #e2e8f0;
    }
    
    /* ===== TABS ===== */
    .nav-tabs-custom {
        border-bottom: 2px solid #e9ecef;
        margin-bottom: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
    }
    
    .nav-tabs-custom .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 600;
        font-size: 13px;
        padding: 8px 16px;
        transition: all 0.3s ease;
        border-radius: 10px;
        background: transparent;
        cursor: pointer;
    }
    
    .nav-tabs-custom .nav-link:hover {
        color: #667eea;
        background: rgba(102, 126, 234, 0.08);
    }
    
    .nav-tabs-custom .nav-link.active {
        color: #667eea;
        background: rgba(102, 126, 234, 0.12);
        border-bottom: 3px solid #667eea;
    }
    
    .sort-select {
        border-radius: 10px;
        border: 2px solid #e2e8f0;
        padding: 6px 14px;
        font-size: 13px;
        background: white;
        height: 38px;
    }
    
    .sort-select:focus {
        border-color: #667eea;
        outline: none;
    }
    
    .search-box {
        border-radius: 10px;
        border: 2px solid #e2e8f0;
        padding: 8px 16px;
        font-size: 13px;
        background: #f8fafc;
        width: 100%;
        transition: all 0.3s;
    }
    
    .search-box:focus {
        border-color: #667eea;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(102,126,234,0.08);
        outline: none;
    }
    
    .search-box::placeholder {
        color: #a0aec0;
    }
    
    .empty-state {
        padding: 40px 20px;
        text-align: center;
        background: #ffffff;
        border-radius: 16px;
    }
    
    .empty-state i {
        font-size: 48px;
        color: #cbd5e1;
        margin-bottom: 16px;
    }
    
    .voucher-card .vendor-label {
        color: #6c757d;
        font-size: 11px;
    }
    
    .voucher-card .vendor-name {
        color: #1a365d;
        font-weight: 700;
        font-size: 13px;
    }
    
    .voucher-card .amount-text {
        color: #059669;
        font-weight: 700;
        font-size: 14px;
    }
    
    .voucher-card .expiry-text {
        font-weight: 600;
        font-size: 12px;
    }
    
    .voucher-card .expiry-text.expired {
        color: #dc2626;
    }
    
    .voucher-card .expiry-text.valid {
        color: #4b5563;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .stat-card .stat-number {
            font-size: 22px;
        }
        
        .stat-card {
            padding: 14px 12px;
        }
        
        .voucher-card .qr-container img {
            width: 80px;
            height: 80px;
        }
        
        .nav-tabs-custom .nav-link {
            font-size: 12px;
            padding: 6px 12px;
        }
        
        .sort-select {
            font-size: 12px;
            padding: 4px 10px;
            height: 34px;
        }
    }
    
    @media (max-width: 480px) {
        .voucher-card {
            padding: 12px;
        }
        
        .voucher-card .qr-container img {
            width: 70px;
            height: 70px;
        }
    }
</style>

<div class="fade-in-up w-100">
    
    <!-- ===== HEADER ===== -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold m-0 dash-title">
            <i class="fas fa-ticket-alt me-2"></i> My Vouchers
        </h4>
        <div class="fw-medium px-4 py-2 rounded-pill dash-date-pill" style="font-size: 0.85rem;">
            <i class="fas fa-calendar-alt me-2"></i> <?= date('d M Y') ?>
        </div>
    </div>

    <?php 
        // Calculate statistics
        $totalVouchers = count($vouchers);
        $totalValue = 0;
        $totalRedeemed = 0;
        $totalExpired = 0;
        $totalActive = 0;
        $totalUsed = 0;
        $today = date('Y-m-d');
        
        foreach($vouchers as $v) {
            $totalValue += $v['amount'];
            
            if($v['status'] == 'used') {
                $totalRedeemed += $v['amount'];
                $totalUsed++;
            } else {
                $isExpired = strtotime($v['expiry_date']) < strtotime($today);
                if($isExpired) {
                    $totalExpired++;
                } else {
                    $totalActive++;
                }
            }
        }
    ?>

    <!-- ===== STATS CARDS ===== -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #3182ce;">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="stat-label">Total Vouchers</div>
                <div class="stat-number" style="color: #1a365d;"><?= $totalVouchers ?></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #dd6b20;">
                    <i class="fas fa-ring"></i>
                </div>
                <div class="stat-label">Total Value</div>
                <div class="stat-number" style="color: #dd6b20;">RM <?= number_format($totalValue, 0) ?></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #38a169;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-label">Redeemed Value</div>
                <div class="stat-number" style="color: #2f855a;">RM <?= number_format($totalRedeemed, 0) ?></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #e53e3e;">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-label">Expired</div>
                <div class="stat-number" style="color: #c53030;"><?= $totalExpired ?></div>
            </div>
        </div>
    </div>

    <?php if(empty($vouchers)): ?>
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h5 class="text-muted">No vouchers found</h5>
            <p class="text-muted small">You don't have any vouchers yet. Contact your administrator.</p>
        </div>
    <?php else: ?>
        
        <!-- ===== FILTERS & SEARCH ===== -->
        <div class="card-modern p-4">
            
            <!-- Tabs & Sort -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
                <ul class="nav nav-tabs-custom" id="voucherTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-filter="all" onclick="filterVouchers('all')">
                            <i class="fas fa-layer-group"></i> All (<?= $totalVouchers ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-filter="active" onclick="filterVouchers('active')">
                            <i class="fas fa-circle" style="color: #10b981;"></i> Active (<?= $totalActive ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-filter="used" onclick="filterVouchers('used')">
                            <i class="fas fa-check-circle" style="color: #6c757d;"></i> Used (<?= $totalUsed ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-filter="expired" onclick="filterVouchers('expired')">
                            <i class="fas fa-hourglass-end" style="color: #ef4444;"></i> Expired (<?= $totalExpired ?>)
                        </button>
                    </li>
                </ul>
                
                <select id="sortBy" class="sort-select" onchange="sortVouchers()">
                    <option value="date_desc">Latest First</option>
                    <option value="date_asc">Oldest First</option>
                    <option value="amount_desc">Highest Value</option>
                    <option value="amount_asc">Lowest Value</option>
                    <option value="vendor_asc">Vendor A-Z</option>
                    <option value="expiry_asc">Expiring Soon</option>
                </select>
            </div>
            
            <!-- Search Bar -->
            <div class="mb-3">
                <div class="position-relative">
                    <i class="fas fa-search position-absolute" style="left: 14px; top: 50%; transform: translateY(-50%); color: #a0aec0;"></i>
                    <input type="text" id="searchVoucher" class="search-box" 
                           placeholder="Search by voucher code or vendor name..." 
                           style="padding-left: 40px;"
                           onkeyup="searchVouchers()">
                </div>
            </div>
            
            <!-- ===== VOUCHERS GRID ===== -->
            <div id="vouchersContainer">
                <div class="row g-3" id="vouchersGrid">
                    <!-- Rendered by JavaScript -->
                </div>
            </div>
            
            <!-- No Results -->
            <div id="noResults" class="text-center py-4" style="display: none;">
                <i class="fas fa-search fa-2x text-muted mb-2"></i>
                <p class="text-muted small">No vouchers match your search criteria</p>
            </div>
            
        </div>
        
    <?php endif; ?>
</div>

<!-- ============================================ -->
<!-- ===== JAVASCRIPT ===== -->
<!-- ============================================ -->
<script>
const vouchersData = <?= json_encode($vouchers) ?>;
let currentFilter = 'all';
let currentSort = 'date_desc';
let currentSearch = '';

function isVoucherExpired(voucher) {
    if (voucher.status === 'used') return false;
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    const expiryDate = new Date(voucher.expiry_date);
    expiryDate.setHours(0, 0, 0, 0);
    return expiryDate < today;
}

function getVoucherFilterStatus(voucher) {
    if (voucher.status === 'used') return 'used';
    if (isVoucherExpired(voucher)) return 'expired';
    return 'active';
}

function filterVouchers(filter) {
    currentFilter = filter;
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
        if (link.dataset.filter === filter) link.classList.add('active');
    });
    renderVouchers();
}

function sortVouchers() {
    currentSort = document.getElementById('sortBy').value;
    renderVouchers();
}

function searchVouchers() {
    currentSearch = document.getElementById('searchVoucher').value.toLowerCase();
    renderVouchers();
}

function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

function downloadQR(hash, code) {
    const url = `https://api.qrserver.com/v1/create-qr-code/?data=${hash}&size=200`;
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
        toast: true,
        position: 'top-end'
    });
}

function renderVouchers() {
    let filtered = [...vouchersData];
    
    filtered = filtered.filter(v => {
        const status = getVoucherFilterStatus(v);
        if (currentFilter === 'all') return true;
        return status === currentFilter;
    });
    
    if (currentSearch) {
        filtered = filtered.filter(v => {
            return (v.voucher_code && v.voucher_code.toLowerCase().includes(currentSearch)) ||
                   (v.vendor_name && v.vendor_name.toLowerCase().includes(currentSearch)) ||
                   (v.vendor_id && v.vendor_id.toLowerCase().includes(currentSearch));
        });
    }
    
    filtered.sort((a, b) => {
        switch(currentSort) {
            case 'date_desc':
                return new Date(b.created_at || 0) - new Date(a.created_at || 0);
            case 'date_asc':
                return new Date(a.created_at || 0) - new Date(b.created_at || 0);
            case 'amount_desc':
                return parseFloat(b.amount) - parseFloat(a.amount);
            case 'amount_asc':
                return parseFloat(a.amount) - parseFloat(b.amount);
            case 'vendor_asc':
                return (a.vendor_name || a.vendor_id || '').localeCompare(b.vendor_name || b.vendor_id || '');
            case 'expiry_asc':
                return new Date(a.expiry_date) - new Date(b.expiry_date);
            default:
                return 0;
        }
    });
    
    const container = document.getElementById('vouchersGrid');
    const noResults = document.getElementById('noResults');
    
    if (filtered.length === 0) {
        container.innerHTML = '';
        noResults.style.display = 'block';
        return;
    }
    
    noResults.style.display = 'none';
    
    let html = '';
    filtered.forEach(v => {
        const isExpired = isVoucherExpired(v);
        const status = getVoucherFilterStatus(v);
        
        let badge = '', infoBox = '', cardClass = '';
        let expiryColor = 'valid';
        
        if (isExpired && v.status !== 'used') {
            badge = '<span class="badge-status badge-expired"><i class="fas fa-hourglass-end"></i> Expired</span>';
            infoBox = '<div class="info-box danger"><i class="fas fa-ban"></i> <strong>EXPIRED!</strong> No longer valid</div>';
            cardClass = 'expired';
            expiryColor = 'expired';
        } else if (v.status === 'used') {
            const usedDate = v.used_at ? new Date(v.used_at).toLocaleDateString('en-GB') : 'Unknown';
            badge = '<span class="badge-status badge-used"><i class="fas fa-check-circle"></i> Used</span>';
            infoBox = `<div class="info-box success"><i class="fas fa-check-circle"></i> Redeemed on ${usedDate}</div>`;
            cardClass = 'used';
            expiryColor = 'valid';
        } else {
            badge = '<span class="badge-status badge-unused"><i class="fas fa-circle"></i> Active</span>';
            const vendor = v.vendor_name || v.vendor_id || 'the vendor';
            infoBox = `<div class="info-box info"><i class="fas fa-info-circle"></i> Show QR at <strong>${escapeHtml(vendor)}</strong></div>`;
            cardClass = 'active';
            expiryColor = 'valid';
        }
        
        const vendorDisplay = v.vendor_name || v.vendor_id || 'Unknown';
        const expiryIcon = (isExpired && v.status !== 'used') ? '<i class="fas fa-exclamation-circle ms-1"></i>' : '';
        
        html += `
            <div class="col-md-6 col-lg-4">
                <div class="voucher-card ${cardClass}">
                    <div class="d-flex justify-content-end mb-2">
                        ${badge}
                    </div>
                    
                    <div class="mb-2 p-2 rounded-3" style="background: #f8fafc; border: 1px solid #edf2f7;">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="vendor-label"><i class="fas fa-store"></i> Redeemable at:</small>
                            <span class="vendor-name">${escapeHtml(vendorDisplay)}</span>
                        </div>
                        ${v.vendor_code ? `
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <small class="vendor-label"><i class="fas fa-qrcode"></i> Vendor Code:</small>
                            <small style="color: #6c757d;">${escapeHtml(v.vendor_code)}</small>
                        </div>
                        ` : ''}
                    </div>
                    
                    <div class="mb-2">
                        <small class="vendor-label">Voucher Code</small>
                        <h6 class="fw-bold mb-0"><code>${escapeHtml(v.voucher_code)}</code></h6>
                    </div>
                    
                    <div class="qr-container mb-2">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?data=${v.hash_code}&size=100" alt="QR">
                    </div>
                    
                    <div class="row g-2 mb-2">
                        <div class="col-6">
                            <div class="rounded-3 p-1" style="background: #f8fafc;">
                                <small class="vendor-label d-block">Amount</small>
                                <span class="amount-text">RM ${parseFloat(v.amount).toFixed(2)}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="rounded-3 p-1" style="background: #f8fafc;">
                                <small class="vendor-label d-block">Expires</small>
                                <span class="expiry-text ${expiryColor}">
                                    ${new Date(v.expiry_date).toLocaleDateString('en-GB')}
                                    ${expiryIcon}
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    ${infoBox}
                    
                    <button onclick="downloadQR('${v.hash_code}', '${v.voucher_code}')" 
                            class="btn-outline-voucher"
                            ${(isExpired && v.status !== 'used') ? 'disabled' : ''}>
                        <i class="fas fa-download"></i> Download QR
                    </button>
                </div>
            </div>
        `;
    });
    
    container.innerHTML = html;
}

document.addEventListener('DOMContentLoaded', function() {
    renderVouchers();
});
</script>

<?= $this->endSection() ?>