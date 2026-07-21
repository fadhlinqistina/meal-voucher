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
    
    /* ===== ACTION BUTTONS ===== */
    .action-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
    }
    
    .btn-action {
        padding: 14px 16px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 14px;
        border: none;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-align: center;
        cursor: pointer;
    }
    
    .btn-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    
    .btn-action-primary {
        background: linear-gradient(135deg, #1a365d, #2b6cb0);
        color: white;
    }
    
    .btn-action-primary:hover {
        color: white;
    }
    
    .btn-action-info {
        background: linear-gradient(135deg, #065f46, #10b981);
        color: white;
    }
    
    .btn-action-info:hover {
        color: white;
    }
    
    .btn-action-danger {
        background: linear-gradient(135deg, #991b1b, #ef4444);
        color: white;
    }
    
    .btn-action-danger:hover {
        color: white;
    }
    
    .btn-action i {
        font-size: 16px;
    }
    
    /* ===== SYSTEM INFO ===== */
    .info-box {
        background: #f8fafc;
        border-radius: 12px;
        padding: 20px 24px;
        border: 1px dashed #cbd5e1;
        display: flex;
        align-items: center;
        gap: 20px;
        min-height: 100px;
        flex-wrap: wrap;
    }
    
    .info-box .info-number {
        font-size: 32px;
        font-weight: 800;
        color: #3182ce;
        min-width: 80px;
    }
    
    .info-box .info-text {
        color: #4a5568;
        font-size: 14px;
        flex: 1;
    }
    
    /* ===== RECENT VOUCHERS TABLE ===== */
    .recent-table {
        font-size: 13px;
    }
    
    .recent-table th {
        color: #4a5568;
        font-weight: 600;
        border-bottom: 2px solid #e2e8f0;
        padding: 8px 10px;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .recent-table td {
        padding: 8px 10px;
        border-bottom: 1px solid #edf2f7;
        vertical-align: middle;
    }
    
    .recent-table tr:hover {
        background: #f8fafc;
    }
    
    .badge-status {
        padding: 3px 10px;
        border-radius: 50px;
        font-size: 10px;
        font-weight: 600;
    }
    
    .badge-used {
        background: #fee2e2;
        color: #991b1b;
    }
    
    .badge-unused {
        background: #d1fae5;
        color: #065f46;
    }
    
    .badge-expired {
        background: #fed7aa;
        color: #92400e;
    }
    
    /* ===== STUDENT MODAL ===== */
    .modal-content {
        border-radius: 16px;
        border: none;
        box-shadow: 0 25px 60px rgba(0,0,0,0.3);
    }
    
    .modal-header {
        border-bottom: 1px solid #e2e8f0;
        padding: 20px 24px;
        background: #f8fafc;
        border-radius: 16px 16px 0 0;
    }
    
    .modal-body {
        padding: 20px 24px;
        max-height: 500px;
        overflow-y: auto;
    }
    
    .modal-footer {
        border-top: 1px solid #e2e8f0;
        padding: 16px 24px;
        background: #f8fafc;
        border-radius: 0 0 16px 16px;
    }
    
    /* ===== STUDENT ITEM - CLICKABLE ===== */
    .student-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 14px;
        border-bottom: 1px solid #f1f5f9;
        transition: all 0.2s;
        cursor: pointer;
        border-radius: 8px;
    }
    
    .student-item:hover {
        background: #eef4ff;
        transform: translateX(4px);
    }
    
    .student-item.active {
        background: #eef4ff;
        border-left: 3px solid #667eea;
    }
    
    .student-item .student-name {
        font-weight: 600;
        color: #1a365d;
    }
    
    .student-item .student-detail {
        font-size: 12px;
        color: #6c757d;
    }
    
    .student-item .click-hint {
        font-size: 10px;
        color: #a0aec0;
        background: #f1f5f9;
        padding: 2px 10px;
        border-radius: 50px;
    }
    
    .student-search {
        width: 100%;
        padding: 10px 16px;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        font-size: 14px;
        margin-bottom: 12px;
        transition: all 0.3s;
    }
    
    .student-search:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102,126,234,0.15);
        outline: none;
    }
    
    .student-count {
        font-size: 13px;
        color: #6c757d;
        padding: 4px 12px;
        background: #e2e8f0;
        border-radius: 50px;
    }
    
    /* ===== STUDENT VOUCHER TABLE (inside modal) ===== */
    .voucher-table-wrap {
        margin-top: 16px;
        border-top: 2px solid #e2e8f0;
        padding-top: 16px;
    }
    
    .voucher-table-wrap .table-title {
        font-size: 14px;
        font-weight: 700;
        color: #1a365d;
        margin-bottom: 10px;
    }
    
    .voucher-table-wrap .table-title .student-name-display {
        color: #667eea;
    }
    
    .voucher-table-wrap .table {
        font-size: 12px;
    }
    
    .voucher-table-wrap .table th {
        font-size: 10px;
        text-transform: uppercase;
        color: #6c757d;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #e2e8f0;
        padding: 6px 8px;
    }
    
    .voucher-table-wrap .table td {
        padding: 6px 8px;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .voucher-table-wrap .empty-voucher {
        text-align: center;
        padding: 20px;
        color: #a0aec0;
        font-size: 13px;
    }
    
    .voucher-table-wrap .empty-voucher i {
        font-size: 28px;
        display: block;
        margin-bottom: 8px;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .action-grid {
            grid-template-columns: 1fr;
        }
        
        .stat-card .stat-number {
            font-size: 22px;
        }
        
        .info-box {
            flex-direction: column;
            text-align: center;
        }
        
        .info-box .info-number {
            min-width: auto;
        }
        
        .modal-body {
            max-height: 400px;
        }
    }
    
    /* Scrollbar styling */
    .modal-body::-webkit-scrollbar {
        width: 4px;
    }
    
    .modal-body::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    
    .modal-body::-webkit-scrollbar-thumb {
        background: #667eea;
        border-radius: 4px;
    }
</style>

<div class="fade-in-up w-100">
    
    <!-- ===== HEADER ===== -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold m-0 dash-title">
            <i class="fas fa-chart-line me-2"></i> Admin Dashboard
        </h4>
        <div class="fw-medium px-4 py-2 rounded-pill dash-date-pill" style="font-size: 0.85rem;">
            <i class="fas fa-calendar-alt me-2"></i> <?= date('d M Y') ?>
        </div>
    </div>

    <!-- ===== STATS CARDS ===== -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #3182ce;">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div class="stat-label">Total Vouchers</div>
                <div class="stat-number" style="color: #1a365d;"><?= $total ?? 0 ?></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #dd6b20;">
                    <i class="fas fa-ring"></i>
                </div>
                <div class="stat-label">Total Value</div>
                <div class="stat-number" style="color: #dd6b20;">RM <?= number_format($total_value ?? 0, 0) ?></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #38a169;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-label">Used</div>
                <div class="stat-number" style="color: #2f855a;"><?= $used ?? 0 ?></div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 col-6">
            <div class="stat-card">
                <div class="stat-icon" style="color: #e53e3e;">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-label">Expired</div>
                <div class="stat-number" style="color: #c53030;"><?= $expired ?? 0 ?></div>
            </div>
        </div>
    </div>

    <!-- ===== QUICK ACTIONS & SYSTEM INFO ===== -->
    <div class="row g-4">
        
        <!-- LEFT: Quick Actions -->
        <div class="col-lg-6">
            <div class="card-modern p-4 h-100">
                <h5 class="fw-bold mb-3" style="color: #1a365d;">
                    <i class="fas fa-bolt me-2" style="color: #667eea;"></i> Quick Actions
                </h5>
                
                <div class="action-grid">
                    <a href="/security-demo" class="btn-action btn-action-primary">
                        <i class="fas fa-shield-alt"></i> Security Demo
                    </a>
                    <a href="/admin/generate" class="btn-action btn-action-primary">
                        <i class="fas fa-plus-circle"></i> Generate Voucher
                    </a>
                    <button class="btn-action btn-action-info" data-bs-toggle="modal" data-bs-target="#studentModal">
                        <i class="fas fa-users"></i> View Students
                    </button>
                    <a href="/logout" class="btn-action btn-action-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
        
        <!-- RIGHT: System Info -->
        <div class="col-lg-6">
            <div class="card-modern p-4 h-100">
                <h5 class="fw-bold mb-3" style="color: #1a365d;">
                    <i class="fas fa-info-circle me-2" style="color: #667eea;"></i> System Info
                </h5>
                
                <div class="info-box">
                    <div class="info-number">
                        <?= (isset($total) && $total > 0) ? round(($used / $total) * 100, 1) : 0 ?>%
                    </div>
                    <div class="info-text">
                        <strong>Usage Rate</strong><br>
                        <span class="text-muted">The percentage of vouchers that have been successfully used out of the total records.</span>
                    </div>
                </div>
                
                <div class="mt-3 d-flex gap-3 flex-wrap">
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge" style="background: #38a169; width: 10px; height: 10px; border-radius: 50%; padding: 0;"></span>
                        <span class="text-muted small">Used: <?= $used ?? 0 ?></span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge" style="background: #d69e2e; width: 10px; height: 10px; border-radius: 50%; padding: 0;"></span>
                        <span class="text-muted small">Unused: <?= $unused ?? 0 ?></span>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <span class="badge" style="background: #ef4444; width: 10px; height: 10px; border-radius: 50%; padding: 0;"></span>
                        <span class="text-muted small">Expired: <?= $expired ?? 0 ?></span>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <!-- ===== RECENT VOUCHERS ===== -->
    <div class="card-modern p-4 mt-4">
        <h5 class="fw-bold mb-3" style="color: #1a365d;">
            <i class="fas fa-clock me-2" style="color: #667eea;"></i> Recent Vouchers
        </h5>
        
        <?php if(empty($recent_vouchers ?? [])): ?>
            <div class="text-center py-4">
                <i class="fas fa-inbox fa-3x text-muted mb-2"></i>
                <p class="text-muted small">No vouchers generated yet</p>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table recent-table">
                    <thead>
                        <tr>
                            <th>Voucher Code</th>
                            <th>Student</th>
                            <th>Amount</th>
                            <th>Vendor</th>
                            <th>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($recent_vouchers as $v): ?>
                            <tr>
                                <td><code style="font-size:11px;"><?= $v['voucher_code'] ?></code></td>
                                <td><?= $v['student_id'] ?></td>
                                <td class="fw-bold text-success">RM <?= number_format($v['amount'], 2) ?></td>
                                <td><?= $v['vendor_id'] ?></td>
                                <td>
                                    <?php 
                                        $statusClass = $v['status'] == 'used' ? 'badge-used' : ($v['status'] == 'expired' ? 'badge-expired' : 'badge-unused');
                                        $statusLabel = ucfirst($v['status']);
                                    ?>
                                    <span class="badge-status <?= $statusClass ?>"><?= $statusLabel ?></span>
                                </td>
                                <td><?= date('d/m/Y', strtotime($v['created_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
    
</div>

<!-- ============================================ -->
<!-- ===== STUDENT MODAL WITH VOUCHER VIEW ===== -->
<!-- ============================================ -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex align-items-center gap-3">
                    <h5 class="modal-title fw-bold" id="studentModalLabel" style="color: #1a365d;">
                        <i class="fas fa-users me-2" style="color: #667eea;"></i> Student List
                    </h5>
                    <span class="student-count" id="studentCount">0 students</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                
                <!-- Search Bar -->
                <input type="text" id="studentSearch" class="student-search" placeholder="🔍 Search by name, username or matric number...">
                
                <!-- Student List -->
                <div id="studentList">
                    <?php if(empty($students ?? [])): ?>
                        <div class="text-center py-4">
                            <i class="fas fa-user-slash fa-2x text-muted mb-2"></i>
                            <p class="text-muted small">No students registered yet</p>
                        </div>
                    <?php else: ?>
                        <?php foreach($students as $s): ?>
                            <div class="student-item" 
                                 data-student="<?= htmlspecialchars($s['username']) ?>"
                                 data-search="<?= strtolower($s['name'] ?? '') . ' ' . strtolower($s['username']) . ' ' . strtolower($s['matric_no'] ?? '') ?>"
                                 onclick="loadStudentVouchers('<?= htmlspecialchars($s['username']) ?>', '<?= htmlspecialchars($s['name'] ?? $s['username']) ?>')">
                                <div>
                                    <div class="student-name"><?= $s['name'] ?? $s['username'] ?></div>
                                    <div class="student-detail">
                                        <i class="fas fa-user-circle"></i> <?= $s['username'] ?>
                                        <?php if(!empty($s['matric_no'])): ?>
                                            &nbsp;|&nbsp; <i class="fas fa-id-card"></i> <?= $s['matric_no'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <span class="click-hint">
                                    <i class="fas fa-eye"></i> View Vouchers
                                </span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                
                <!-- ===== STUDENT VOUCHER TABLE ===== -->
                <div class="voucher-table-wrap" id="voucherTableWrap" style="display: none;">
                    <div class="table-title">
                        <i class="fas fa-ticket-alt me-1" style="color: #667eea;"></i> 
                        Vouchers for <span class="student-name-display" id="selectedStudentName">-</span>
                        <span class="badge bg-secondary ms-2" id="voucherCount">0</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="voucherTable">
                            <thead>
                                <tr>
                                    <th>Voucher Code</th>
                                    <th>Amount</th>
                                    <th>Vendor</th>
                                    <th>Status</th>
                                    <th>Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody id="voucherTableBody">
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">
                                        <i class="fas fa-spinner fa-spin me-2"></i> Loading...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Close
                </button>
                <a href="/admin/generate" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus-circle"></i> Generate Voucher
                </a>
            </div>
        </div>
    </div>
</div>

<!-- ============================================ -->
<!-- ===== JAVASCRIPT ===== -->
<!-- ============================================ -->
<script>
// Student search filter
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('studentSearch');
    const studentItems = document.querySelectorAll('.student-item');
    const studentCount = document.getElementById('studentCount');
    
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const query = this.value.toLowerCase().trim();
            let visibleCount = 0;
            
            studentItems.forEach(item => {
                const searchData = item.dataset.search || '';
                if (searchData.includes(query)) {
                    item.style.display = 'flex';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });
            
            if (studentCount) {
                studentCount.textContent = visibleCount + ' students';
            }
        });
    }
    
    if (studentCount) {
        studentCount.textContent = studentItems.length + ' students';
    }
});

// Reset when modal opens
document.addEventListener('show.bs.modal', function(event) {
    if (event.target.id === 'studentModal') {
        const searchInput = document.getElementById('studentSearch');
        if (searchInput) {
            searchInput.value = '';
            searchInput.dispatchEvent(new Event('keyup'));
        }
        // Hide voucher table initially
        document.getElementById('voucherTableWrap').style.display = 'none';
        // Remove active class from all students
        document.querySelectorAll('.student-item').forEach(el => el.classList.remove('active'));
    }
});

// ===== LOAD STUDENT VOUCHERS VIA AJAX =====
function loadStudentVouchers(studentId, studentName) {
    // Show loading state
    const wrap = document.getElementById('voucherTableWrap');
    const body = document.getElementById('voucherTableBody');
    const nameDisplay = document.getElementById('selectedStudentName');
    const countDisplay = document.getElementById('voucherCount');
    
    wrap.style.display = 'block';
    nameDisplay.textContent = studentName;
    body.innerHTML = `<tr><td colspan="5" class="text-center text-muted py-3"><i class="fas fa-spinner fa-spin me-2"></i> Loading vouchers...</td></tr>`;
    countDisplay.textContent = '...';
    
    // Highlight selected student
    document.querySelectorAll('.student-item').forEach(el => el.classList.remove('active'));
    event.currentTarget.classList.add('active');
    
    // AJAX call to get student vouchers
    fetch(`/admin/student-vouchers/${encodeURIComponent(studentId)}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                body.innerHTML = `<tr><td colspan="5" class="text-center text-danger py-3">${data.error}</td></tr>`;
                countDisplay.textContent = '0';
                return;
            }
            
            countDisplay.textContent = data.length;
            
            if (data.length === 0) {
                body.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">
                            <i class="fas fa-inbox fa-2x d-block mb-2"></i>
                            No vouchers found for this student
                        </td>
                    </tr>
                `;
                return;
            }
            
            let html = '';
            data.forEach(v => {
                const statusClass = v.status === 'used' ? 'badge-used' : (v.status === 'expired' ? 'badge-expired' : 'badge-unused');
                const statusLabel = v.status.charAt(0).toUpperCase() + v.status.slice(1);
                html += `
                    <tr>
                        <td><code style="font-size:11px;">${v.voucher_code}</code></td>
                        <td class="fw-bold text-success">RM ${parseFloat(v.amount).toFixed(2)}</td>
                        <td>${v.vendor_id}</td>
                        <td><span class="badge-status ${statusClass}">${statusLabel}</span></td>
                        <td>${new Date(v.expiry_date).toLocaleDateString('en-GB')}</td>
                    </tr>
                `;
            });
            
            body.innerHTML = html;
        })
        .catch(error => {
            body.innerHTML = `<tr><td colspan="5" class="text-center text-danger py-3">Error loading vouchers: ${error.message}</td></tr>`;
            countDisplay.textContent = '0';
        });
}
</script>

<!-- ===== SWEETALERT ===== -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Logout confirmation
document.addEventListener('DOMContentLoaded', function() {
    const logoutBtn = document.querySelector('a[href="/logout"]');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will be logged out of the system.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, Logout',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/logout';
                }
            });
        });
    }
});
</script>

<?= $this->endSection() ?>