<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* Custom Styles for Student Dashboard */
    .summary-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 20px;
        padding: 15px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    .summary-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    
    .nav-tabs-custom {
        border-bottom: 2px solid #e9ecef;
        margin-bottom: 25px;
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }
    
    .nav-tabs-custom .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 600;
        padding: 10px 20px;
        transition: all 0.3s ease;
        border-radius: 12px;
        background: transparent;
        cursor: pointer;
    }
    
    .nav-tabs-custom .nav-link:hover {
        color: #667eea;
        background: rgba(102, 126, 234, 0.1);
    }
    
    .nav-tabs-custom .nav-link.active {
        color: #667eea;
        background: linear-gradient(135deg, #667eea20 0%, #764ba220 100%);
        border-bottom: 3px solid #667eea;
    }
    
    .sort-select {
        border-radius: 12px;
        border: 2px solid #e0e0e0;
        padding: 8px 15px;
        font-size: 14px;
        background: white;
    }
    
    .sort-select:focus {
        border-color: #667eea;
        outline: none;
    }
    
    .voucher-card {
        background: rgba(255, 255, 255, 0.95);
        transition: all 0.3s ease;
        border-radius: 24px;
    }
    
    .voucher-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }
    
    .empty-state {
        padding: 60px 20px;
        text-align: center;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 24px;
    }
    
    .empty-state i {
        font-size: 64px;
        color: #cbd5e1;
        margin-bottom: 20px;
    }
    
    .input-group-text {
        border-radius: 12px 0 0 12px;
        border: 2px solid #e0e0e0;
        border-right: none;
        background: white;
    }
    
    #searchVoucher {
        border-radius: 0 12px 12px 0;
        border: 2px solid #e0e0e0;
        border-left: none;
    }
    
    #searchVoucher:focus {
        border-color: #667eea;
        box-shadow: none;
    }
    
    code {
        background: #f1f5f9;
        padding: 4px 8px;
        border-radius: 8px;
        font-size: 12px;
    }
    
    .bg-light {
        background-color: #f8f9fa !important;
    }
    
    .alert-info {
        background-color: #e3f2fd;
        border: none;
        border-radius: 8px;
    }
    
    .alert-danger {
        background-color: #fee2e2;
        border: none;
        border-radius: 8px;
    }
    
    .alert-secondary {
        background-color: #f3f4f6;
        border: none;
        border-radius: 8px;
    }
    
    .opacity-75 {
        opacity: 0.75;
    }
    
    .badge-status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }
    
    .badge-unused {
        background: #10b981;
        color: white;
    }
    
    .badge-used {
        background: #ef4444;
        color: white;
    }
    
    .badge-expired {
        background: #f59e0b;
        color: white;
    }
    
    .qr-container {
        background: white;
        padding: 10px;
        border-radius: 16px;
        display: inline-block;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>

<div class="fade-in-up">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <h2 class="text-white fw-bold">
            <i class="fas fa-ticket-alt"></i> My Vouchers
        </h2>
        <div class="d-flex gap-2">
            <button class="btn btn-light btn-sm" onclick="window.location.reload()">
                <i class="fas fa-sync-alt"></i> Refresh
            </button>
        </div>
    </div>

    <!-- Summary Cards -->
    <?php 
        // Calculate statistics - FIXED
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
                // Check if unused voucher is expired
                $isExpired = strtotime($v['expiry_date']) < strtotime($today);
                if($isExpired) {
                    $totalExpired++;
                } else {
                    $totalActive++;
                }
            }
        }
        
        // Debug log (will appear in browser console)
        $debugStats = "Total: $totalVouchers, Active: $totalActive, Used: $totalUsed, Expired: $totalExpired";
    ?>
    
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-6">
            <div class="summary-card text-center">
                <div class="mb-2">
                    <i class="fas fa-ticket-alt fa-2x" style="color: #667eea"></i>
                </div>
                <h6 class="text-muted mb-1">Total Vouchers</h6>
                <h3 class="fw-bold mb-0" style="color: #667eea"><?= $totalVouchers ?></h3>
            </div>
        </div>
        
        <div class="col-md-3 col-6">
            <div class="summary-card text-center">
                <div class="mb-2">
                    <i class="fas fa-ring fa-2x" style="color: #f59e0b"></i>
                </div>
                <h6 class="text-muted mb-1">Total Value Received</h6>
                <h3 class="fw-bold mb-0 text-warning">RM <?= number_format($totalValue, 2) ?></h3>
            </div>
        </div>
        
        <div class="col-md-3 col-6">
            <div class="summary-card text-center">
                <div class="mb-2">
                    <i class="fas fa-check-circle fa-2x" style="color: #10b981"></i>
                </div>
                <h6 class="text-muted mb-1">Redeemed Value</h6>
                <h3 class="fw-bold mb-0 text-success">RM <?= number_format($totalRedeemed, 2) ?></h3>
            </div>
        </div>
        
        <div class="col-md-3 col-6">
            <div class="summary-card text-center">
                <div class="mb-2">
                    <i class="fas fa-clock fa-2x" style="color: #ef4444"></i>
                </div>
                <h6 class="text-muted mb-1">Expired Vouchers</h6>
                <h3 class="fw-bold mb-0 text-danger"><?= $totalExpired ?></h3>
            </div>
        </div>
    </div>

    <?php if(empty($vouchers)): ?>
        <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <h5 class="text-muted">No vouchers found</h5>
            <p class="text-muted">You don't have any vouchers yet. Contact your administrator.</p>
        </div>
    <?php else: ?>
        
        <!-- Tabs and Filters -->
        <div class="card-modern p-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
                <ul class="nav nav-tabs-custom" id="voucherTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-filter="all" onclick="filterVouchers('all')">
                            <i class="fas fa-layer-group"></i> All (<?= $totalVouchers ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-filter="active" onclick="filterVouchers('active')">
                            <i class="fas fa-circle" style="color: #10b981"></i> Active (<?= $totalActive ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-filter="used" onclick="filterVouchers('used')">
                            <i class="fas fa-check-circle" style="color: #6c757d"></i> Used (<?= $totalUsed ?>)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-filter="expired" onclick="filterVouchers('expired')">
                            <i class="fas fa-hourglass-end" style="color: #ef4444"></i> Expired (<?= $totalExpired ?>)
                        </button>
                    </li>
                </ul>
                
                <div class="d-flex gap-2">
                    <select id="sortBy" class="sort-select" onchange="sortVouchers()">
                        <option value="date_desc">Latest First</option>
                        <option value="date_asc">Oldest First</option>
                        <option value="amount_desc">Highest Value</option>
                        <option value="amount_asc">Lowest Value</option>
                        <option value="vendor_asc">Vendor A-Z</option>
                        <option value="expiry_asc">Expiring Soon</option>
                    </select>
                </div>
            </div>
            
            <!-- Search Bar -->
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" id="searchVoucher" class="form-control border-start-0" 
                           placeholder="Search by voucher code or vendor name..." 
                           onkeyup="searchVouchers()">
                </div>
            </div>
            
            <!-- Vouchers Grid -->
            <div id="vouchersContainer">
                <div class="row g-3" id="vouchersGrid">
                    <!-- Vouchers will be rendered here by JavaScript -->
                </div>
            </div>
            
            <!-- No Results Message -->
            <div id="noResults" class="text-center py-5" style="display: none;">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <p class="text-muted">No vouchers match your search criteria</p>
            </div>
        </div>
        
    <?php endif; ?>
</div>

<script>
// Vouchers data from PHP
const vouchersData = <?= json_encode($vouchers) ?>;
let currentFilter = 'all';
let currentSort = 'date_desc';
let currentSearch = '';

// Helper function to check if voucher is expired - FIXED
function isVoucherExpired(voucher) {
    // Used vouchers are not considered expired for display
    if (voucher.status === 'used') {
        return false;
    }
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    const expiryDate = new Date(voucher.expiry_date);
    expiryDate.setHours(0, 0, 0, 0);
    return expiryDate < today;
}

// Helper function to get voucher status for filtering - FIXED
function getVoucherFilterStatus(voucher) {
    // Check if used first
    if (voucher.status === 'used') {
        return 'used';
    }
    // Then check if expired
    if (isVoucherExpired(voucher)) {
        return 'expired';
    }
    // Otherwise it's active
    return 'active';
}

// Filter vouchers based on current filter
function filterVouchers(filter) {
    currentFilter = filter;
    
    // Update active tab
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
        if(link.getAttribute('data-filter') === filter) {
            link.classList.add('active');
        }
    });
    
    renderVouchers();
}

// Sort vouchers
function sortVouchers() {
    const sortSelect = document.getElementById('sortBy');
    currentSort = sortSelect.value;
    renderVouchers();
}

// Search vouchers
function searchVouchers() {
    const searchInput = document.getElementById('searchVoucher');
    currentSearch = searchInput.value.toLowerCase();
    renderVouchers();
}

// Main render function
function renderVouchers() {
    let filteredVouchers = [...vouchersData];
    
    // Debug - log all vouchers status
    console.log('All vouchers:', vouchersData.map(v => ({
        code: v.voucher_code,
        status: v.status,
        expiry: v.expiry_date,
        isExpired: isVoucherExpired(v),
        filterStatus: getVoucherFilterStatus(v)
    })));
    
    // Apply filter
    filteredVouchers = filteredVouchers.filter(voucher => {
        const filterStatus = getVoucherFilterStatus(voucher);
        if (currentFilter === 'all') return true;
        return filterStatus === currentFilter;
    });
    
    // Log filtered count
    console.log(`Filter: ${currentFilter}, Count: ${filteredVouchers.length}`);
    
    // Apply search
    if (currentSearch) {
        filteredVouchers = filteredVouchers.filter(voucher => {
            return (voucher.voucher_code && voucher.voucher_code.toLowerCase().includes(currentSearch)) ||
                   (voucher.vendor_name && voucher.vendor_name.toLowerCase().includes(currentSearch)) ||
                   (voucher.vendor_id && voucher.vendor_id.toLowerCase().includes(currentSearch));
        });
    }
    
    // Apply sort
    filteredVouchers.sort((a, b) => {
        switch(currentSort) {
            case 'date_desc':
                return new Date(b.created_at || b.generated_at || 0) - new Date(a.created_at || a.generated_at || 0);
            case 'date_asc':
                return new Date(a.created_at || a.generated_at || 0) - new Date(b.created_at || b.generated_at || 0);
            case 'amount_desc':
                return parseFloat(b.amount) - parseFloat(a.amount);
            case 'amount_asc':
                return parseFloat(a.amount) - parseFloat(b.amount);
            case 'vendor_asc':
                const vendorA = (a.vendor_name || a.vendor_id || '').toLowerCase();
                const vendorB = (b.vendor_name || b.vendor_id || '').toLowerCase();
                return vendorA.localeCompare(vendorB);
            case 'expiry_asc':
                return new Date(a.expiry_date) - new Date(b.expiry_date);
            default:
                return 0;
        }
    });
    
    // Render HTML
    const container = document.getElementById('vouchersGrid');
    const noResults = document.getElementById('noResults');
    
    if (filteredVouchers.length === 0) {
        container.innerHTML = '';
        noResults.style.display = 'block';
        return;
    }
    
    noResults.style.display = 'none';
    
    let html = '';
    filteredVouchers.forEach(voucher => {
        const isExpired = isVoucherExpired(voucher);
        const filterStatus = getVoucherFilterStatus(voucher);
        
        let statusBadge = '';
        let statusClass = '';
        let instructionText = '';
        
        if (isExpired && voucher.status !== 'used') {
            statusBadge = '<span class="badge-status badge-expired"><i class="fas fa-hourglass-end"></i> Expired</span>';
            instructionText = '<div class="alert alert-danger py-1 px-2 mb-2" style="font-size: 11px;"><i class="fas fa-ban"></i> <strong>EXPIRED!</strong> This voucher is no longer valid.</div>';
            statusClass = 'opacity-75';
        } else if (voucher.status === 'used') {
            statusBadge = '<span class="badge-status badge-used"><i class="fas fa-check-circle"></i> Used</span>';
            const usedDate = voucher.used_at ? new Date(voucher.used_at).toLocaleDateString('en-GB') : 'Unknown';
            instructionText = `<div class="alert alert-secondary py-1 px-2 mb-2" style="font-size: 11px;"><i class="fas fa-check-circle"></i> Redeemed on ${usedDate}</div>`;
            statusClass = 'opacity-75';
        } else {
            statusBadge = '<span class="badge-status badge-unused"><i class="fas fa-circle"></i> Active</span>';
            const vendorName = voucher.vendor_name || voucher.vendor_id || 'the vendor';
            instructionText = `<div class="alert alert-info py-1 px-2 mb-2" style="font-size: 11px;"><i class="fas fa-info-circle"></i> Show this QR code at <strong>${escapeHtml(vendorName)}</strong> counter</div>`;
        }
        
        const vendorDisplay = voucher.vendor_name || voucher.vendor_id || 'Unknown Vendor';
        const expiryClass = (isExpired && voucher.status !== 'used') ? 'text-danger' : '';
        const expiryIcon = (isExpired && voucher.status !== 'used') ? '<i class="fas fa-exclamation-circle ms-1"></i>' : '';
        
        html += `
            <div class="col-md-6 col-lg-4">
                <div class="card-modern voucher-card p-3 text-center h-100 ${statusClass}">
                    <div class="text-end mb-2">
                        ${statusBadge}
                    </div>
                    
                    <div class="mb-2 p-2 bg-light rounded-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="fas fa-store"></i> Redeemable at:</small>
                            <span class="fw-bold text-primary">${escapeHtml(vendorDisplay)}</span>
                        </div>
                        ${voucher.vendor_code ? `
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <small class="text-muted"><i class="fas fa-qrcode"></i> Vendor Code:</small>
                            <small class="text-muted">${escapeHtml(voucher.vendor_code)}</small>
                        </div>
                        ` : ''}
                    </div>
                    
                    <div class="mb-3">
                        <small class="text-muted">Voucher Code</small>
                        <h6 class="fw-bold mb-0"><code>${escapeHtml(voucher.voucher_code)}</code></h6>
                    </div>
                    
                    <div class="qr-container mb-3">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?data=${voucher.hash_code}&size=150" 
                             alt="QR Code" style="width: 120px; height: 120px;">
                    </div>
                    
                    <div class="row g-2 mb-2">
                        <div class="col-6">
                            <div class="bg-light rounded-3 p-1">
                                <small class="text-muted d-block">Amount</small>
                                <span class="fw-bold text-success">RM ${parseFloat(voucher.amount).toFixed(2)}</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-light rounded-3 p-1">
                                <small class="text-muted d-block">Expires</small>
                                <small class="fw-bold ${expiryClass}">
                                    ${new Date(voucher.expiry_date).toLocaleDateString('en-GB')}
                                    ${expiryIcon}
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    ${instructionText}
                    
                    <button onclick="downloadQR('${voucher.hash_code}', '${voucher.voucher_code}')" 
                            class="btn btn-sm ${(isExpired && voucher.status !== 'used') ? 'btn-secondary' : 'btn-outline-primary'} w-100"
                            ${(isExpired && voucher.status !== 'used') ? 'disabled' : ''}>
                        <i class="fas fa-download"></i> Download QR
                    </button>
                </div>
            </div>
        `;
    });
    
    container.innerHTML = html;
}

// Escape HTML to prevent XSS
function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// Download QR function
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

// Initial render
document.addEventListener('DOMContentLoaded', function() {
    renderVouchers();
    
    // Debug: Log voucher counts
    console.log('Total vouchers:', vouchersData.length);
    const activeCount = vouchersData.filter(v => !isVoucherExpired(v) && v.status === 'unused').length;
    const usedCount = vouchersData.filter(v => v.status === 'used').length;
    const expiredCount = vouchersData.filter(v => isVoucherExpired(v) && v.status !== 'used').length;
    console.log('Active:', activeCount, 'Used:', usedCount, 'Expired:', expiredCount);
});
</script>

<?= $this->endSection() ?>