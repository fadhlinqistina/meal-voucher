<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* ===== PAGE BACKGROUND ===== */
    body {
        background-color: #081225 !important;
        background-image: 
            radial-gradient(circle at 10% 0%, rgba(49, 130, 206, 0.25) 0%, transparent 40%),
            radial-gradient(circle at 90% 10%, rgba(0, 163, 196, 0.2) 0%, transparent 40%),
            radial-gradient(circle at 50% 100%, rgba(26, 54, 93, 0.6) 0%, transparent 60%) !important;
        background-attachment: fixed !important;
    }
    
    /* ===== CARD MODERN ===== */
    .card-modern {
        background: #ffffff !important;
        border: none !important;
        border-radius: 20px !important;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25) !important;
    }
    
    /* ===== HEADER ===== */
    .form-header {
        background: linear-gradient(135deg, #1a365d 0%, #2b6cb0 100%);
        color: white;
        padding: 18px 24px;
        border-radius: 16px 16px 0 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .form-header h5 {
        margin: 0;
        font-weight: 700;
        font-size: 17px;
    }
    
    .form-header .badge-count {
        background: rgba(255,255,255,0.15);
        color: white;
        padding: 4px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 600;
    }
    
    /* ===== FORM STYLES ===== */
    .form-label-custom {
        font-weight: 600;
        font-size: 13px;
        color: #2d3748;
        display: block;
        margin-bottom: 6px;
    }
    
    .form-label-custom .required {
        color: #e53e3e;
        margin-left: 2px;
    }
    
    .form-control-custom {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 14px;
        transition: all 0.3s;
        width: 100%;
        background: #f8fafc;
        height: 46px;
    }
    
    .form-control-custom:focus {
        border-color: #667eea;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(102,126,234,0.1);
        outline: none;
    }
    
    .form-control-custom:hover {
        border-color: #a0aec0;
    }
    
    /* Select - sama style dengan form-control-custom */
    .form-select-custom {
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 14px;
        transition: all 0.3s;
        width: 100%;
        background: #f8fafc url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e") no-repeat right 0.75rem center/16px 16px;
        appearance: none;
        -webkit-appearance: none;
        height: 46px;
    }
    
    .form-select-custom:focus {
        border-color: #667eea;
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(102,126,234,0.1);
        outline: none;
    }
    
    .form-select-custom:hover {
        border-color: #a0aec0;
    }
    
    /* ===== INPUT GROUP FIXED ===== */
    .input-group-custom {
        display: flex;
        align-items: stretch;
        width: 100%;
    }
    
    .input-group-custom .input-group-text {
        background: #eef4f9;
        border: 2px solid #e2e8f0;
        border-right: none;
        border-radius: 10px 0 0 10px;
        font-weight: 700;
        color: #1a365d;
        font-size: 14px;
        padding: 0 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 46px;
        flex-shrink: 0;
    }
    
    .input-group-custom .form-control-custom {
        border-radius: 0 10px 10px 0;
        border-left: none;
        height: 46px;
        flex: 1;
    }
    
    .input-group-custom .form-control-custom:focus {
        border-left: none;
    }
    
    /* ===== BUTTONS - SAME AS QUICK ACTIONS ===== */
    .btn-generate {
        background: linear-gradient(135deg, #1a365d 0%, #2b6cb0 100%);
        color: white;
        border: none;
        padding: 12px 28px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 15px;
        transition: all 0.3s;
        width: 100%;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }
    
    .btn-generate:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(26,54,93,0.3);
        color: white;
    }
    
    .btn-generate:active {
        transform: translateY(0);
    }
    
    .btn-bulk {
        background: linear-gradient(135deg, #065f46 0%, #10b981 100%);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 700;
        font-size: 14px;
        transition: all 0.3s;
        width: 100%;
        height: 46px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }
    
    .btn-bulk:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(6,95,70,0.3);
        color: white;
    }
    
    .btn-back {
        border: 2px solid #e2e8f0;
        background: transparent;
        color: #4a5568;
        padding: 10px 24px;
        border-radius: 10px;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }
    
    .btn-back:hover {
        background: #f8fafc;
        border-color: #a0aec0;
        color: #1a365d;
    }
    
    /* ===== SECTION DIVIDER ===== */
    .section-divider {
        display: flex;
        align-items: center;
        gap: 16px;
        margin: 28px 0 20px;
    }
    
    .section-divider .line {
        flex: 1;
        height: 1px;
        background: #e2e8f0;
    }
    
    .section-divider .label {
        font-size: 12px;
        font-weight: 600;
        color: #a0aec0;
        text-transform: uppercase;
        letter-spacing: 1px;
        white-space: nowrap;
    }
    
    /* ===== WARNING BOX ===== */
    .warning-box {
        background: #fffbeb;
        border: 1px solid #fcd34d;
        border-radius: 10px;
        padding: 12px 16px;
        color: #92400e;
        font-size: 13px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
    }
    
    .warning-box i {
        font-size: 18px;
        color: #d69e2e;
        margin-top: 1px;
        flex-shrink: 0;
    }
    
    .warning-box strong {
        color: #78350f;
    }
    
    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .form-header {
            flex-direction: column;
            text-align: center;
            padding: 14px 18px;
        }
        
        .form-header h5 {
            font-size: 15px;
        }
        
        .btn-generate, .btn-bulk {
            font-size: 13px;
            padding: 10px 16px;
            height: 42px;
        }
        
        .input-group-custom .input-group-text,
        .input-group-custom .form-control-custom,
        .form-control-custom,
        .form-select-custom {
            height: 42px;
        }
    }
    
    @media (max-width: 480px) {
        .card-modern {
            padding: 16px !important;
        }
        
        .form-control-custom, .form-select-custom {
            font-size: 13px;
            padding: 8px 12px;
            height: 38px;
        }
        
        .form-label-custom {
            font-size: 12px;
        }
        
        .input-group-custom .input-group-text {
            height: 38px;
            padding: 0 10px;
            font-size: 12px;
        }
        
        .input-group-custom .form-control-custom {
            height: 38px;
        }
        
        .btn-generate, .btn-bulk {
            height: 38px;
            font-size: 12px;
            padding: 6px 12px;
        }
    }
    
    /* Select2 Override */
    .select2-container--bootstrap-5 .select2-selection {
        border-radius: 10px !important;
        border: 2px solid #e2e8f0 !important;
        background: #f8fafc !important;
        padding: 6px 12px !important;
        min-height: 46px !important;
        display: flex !important;
        align-items: center !important;
    }
    
    .select2-container--bootstrap-5 .select2-selection:hover {
        border-color: #a0aec0 !important;
    }
    
    .select2-container--bootstrap-5 .select2-selection--single .select2-selection__arrow {
        height: 42px !important;
    }
    
    .select2-container--bootstrap-5 .select2-dropdown {
        border-radius: 10px !important;
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
    }
    
    .select2-container--bootstrap-5 .select2-results__option--highlighted {
        background: linear-gradient(135deg, #667eea, #764ba2) !important;
    }
    
    .select2-container--bootstrap-5 .select2-selection__placeholder {
        color: #a0aec0 !important;
    }
    
    /* Fix for select2 on mobile */
    @media (max-width: 768px) {
        .select2-container--bootstrap-5 .select2-selection {
            min-height: 42px !important;
        }
        
        .select2-container--bootstrap-5 .select2-selection--single .select2-selection__arrow {
            height: 38px !important;
        }
    }
</style>

<div class="container mt-4 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <!-- ===== MAIN CARD ===== -->
            <div class="card-modern p-0">
                
                <!-- Header -->
                <div class="form-header">
                    <h5>
                        <i class="fas fa-plus-circle me-2"></i> Generate Voucher
                    </h5>
                    <span class="badge-count">
                        <i class="fas fa-users me-1"></i> <?= count($students) ?> Students
                    </span>
                </div>
                
                <!-- Body -->
                <div class="p-4 p-md-5">
                    
                    <!-- Flash Messages -->
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger d-flex align-items-center gap-2" style="border-radius: 10px; border: none;">
                            <i class="fas fa-exclamation-circle fa-lg"></i>
                            <span><?= session()->getFlashdata('error') ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success d-flex align-items-center gap-2" style="border-radius: 10px; border: none;">
                            <i class="fas fa-check-circle fa-lg"></i>
                            <span><?= session()->getFlashdata('success') ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <!-- ============================================ -->
                    <!-- ===== SINGLE GENERATE ===== -->
                    <!-- ============================================ -->
                    <div class="card shadow-sm" style="border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden;">
                        <div class="card-header" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; padding: 14px 20px;">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge" style="background: #667eea; color: white; padding: 4px 12px; border-radius: 50px; font-size: 11px; font-weight: 700;">
                                    SINGLE
                                </span>
                                <span style="font-weight: 600; color: #1a365d; font-size: 14px;">
                                    <i class="fas fa-user-graduate me-1"></i> Generate for Single Student
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form action="/admin/generate" method="post" id="singleGenerateForm">
                                <div class="row g-4">
                                    
                                    <!-- Student -->
                                    <div class="col-md-6">
                                        <label class="form-label-custom">
                                            <i class="fas fa-user-graduate me-1" style="color: #667eea;"></i> Select Student <span class="required">*</span>
                                        </label>
                                        <select name="student_id" id="studentSelect" class="form-select" required>
                                            <option value="">-- Search Student --</option>
                                            <?php foreach($students as $s): ?>
                                                <option value="<?= $s['id'] ?>" 
                                                        data-matric="<?= $s['matric_no'] ?? '' ?>"
                                                        data-name="<?= $s['name'] ?? '' ?>">
                                                    <?= $s['username'] ?> - <?= $s['name'] ?? $s['username'] ?> 
                                                    (<?= $s['matric_no'] ?? 'No Matric' ?>)
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="text-muted mt-1 d-block" style="font-size: 11px;">
                                            <i class="fas fa-search me-1"></i> Type to search by name or matric number
                                        </small>
                                    </div>
                                    
                                    <!-- Vendor -->
                                    <div class="col-md-6">
                                        <label class="form-label-custom">
                                            <i class="fas fa-store me-1" style="color: #667eea;"></i> Select Vendor <span class="required">*</span>
                                        </label>
                                        <select name="vendor_id" class="form-select-custom" required>
                                            <option value="">-- Choose Vendor --</option>
                                            <?php foreach($vendors as $v): ?>
                                                <option value="<?= $v['username'] ?>">
                                                    <?= $v['name'] ?? $v['username'] ?> (<?= $v['vendor_code'] ?? '' ?>)
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <!-- Amount -->
                                    <div class="col-md-4">
                                        <label class="form-label-custom">
                                            <i class="fas fa-ring me-1" style="color: #667eea;"></i> Amount (RM) <span class="required">*</span>
                                        </label>
                                        <div class="input-group input-group-custom">
                                            <span class="input-group-text">RM</span>
                                            <input type="number" name="amount" class="form-control-custom" 
                                                   step="0.01" min="1" max="500" value="10.00" required>
                                        </div>
                                    </div>
                                    
                                    <!-- Expiry Date -->
                                    <div class="col-md-4">
                                        <label class="form-label-custom">
                                            <i class="fas fa-calendar-alt me-1" style="color: #667eea;"></i> Expiry Date <span class="required">*</span>
                                        </label>
                                        <input type="date" name="expiry_date" class="form-control-custom" 
                                               min="<?= date('Y-m-d') ?>" 
                                               value="<?= date('Y-m-d', strtotime('+30 days')) ?>" required>
                                    </div>
                                    
                                    <!-- Generate Button -->
                                    <div class="col-md-4 d-flex align-items-end">
                                        <button type="submit" class="btn-generate">
                                            <i class="fas fa-ticket-alt me-2"></i> Generate Voucher
                                        </button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- ============================================ -->
                    <!-- ===== DIVIDER ===== -->
                    <!-- ============================================ -->
                    <div class="section-divider">
                        <span class="line"></span>
                        <span class="label">or</span>
                        <span class="line"></span>
                    </div>
                    
                    <!-- ============================================ -->
                    <!-- ===== BULK GENERATE ===== -->
                    <!-- ============================================ -->
                    <div class="card shadow-sm" style="border: 1px solid #e2e8f0; border-radius: 14px; overflow: hidden;">
                        <div class="card-header" style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; padding: 14px 20px;">
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge" style="background: #d69e2e; color: white; padding: 4px 12px; border-radius: 50px; font-size: 11px; font-weight: 700;">
                                    BULK
                                </span>
                                <span style="font-weight: 600; color: #1a365d; font-size: 14px;">
                                    <i class="fas fa-layer-group me-1"></i> Generate for All Students
                                </span>
                                <span class="badge" style="background: #e2e8f0; color: #4a5568; font-size: 11px;">
                                    <?= count($students) ?> students
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <form action="/admin/bulk-generate" method="post">
                                <div class="row g-4">
                                    
                                    <!-- Vendor -->
                                    <div class="col-md-4">
                                        <label class="form-label-custom">
                                            <i class="fas fa-store me-1" style="color: #667eea;"></i> Select Vendor <span class="required">*</span>
                                        </label>
                                        <select name="vendor_id" class="form-select-custom" required>
                                            <option value="">-- Choose Vendor --</option>
                                            <?php foreach($vendors as $v): ?>
                                                <option value="<?= $v['username'] ?>">
                                                    <?= $v['name'] ?? $v['username'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <!-- Amount -->
                                    <div class="col-md-3">
                                        <label class="form-label-custom">
                                            <i class="fas fa-ring me-1" style="color: #667eea;"></i> Amount (RM) <span class="required">*</span>
                                        </label>
                                        <div class="input-group input-group-custom">
                                            <span class="input-group-text">RM</span>
                                            <input type="number" name="amount" class="form-control-custom" 
                                                   step="0.01" min="1" max="500" value="10.00" required>
                                        </div>
                                    </div>
                                    
                                    <!-- Expiry Date -->
                                    <div class="col-md-3">
                                        <label class="form-label-custom">
                                            <i class="fas fa-calendar-alt me-1" style="color: #667eea;"></i> Expiry Date <span class="required">*</span>
                                        </label>
                                        <input type="date" name="expiry_date" class="form-control-custom" 
                                               min="<?= date('Y-m-d') ?>" 
                                               value="<?= date('Y-m-d', strtotime('+30 days')) ?>" required>
                                    </div>
                                    
                                    <!-- Generate Button -->
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="submit" class="btn-bulk" 
                                                onclick="return confirm('Generate vouchers for ALL <?= count($students) ?> students?')">
                                            <i class="fas fa-play me-1"></i> Run All
                                        </button>
                                    </div>
                                    
                                </div>
                                
                                <!-- Warning -->
                                <div class="warning-box mt-4">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    <div>
                                        <strong>Warning:</strong> This action will generate individual vouchers for 
                                        <strong>ALL <?= count($students) ?> registered students</strong> in the system.
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    
                    <!-- ============================================ -->
                    <!-- ===== BACK BUTTON ===== -->
                    <!-- ============================================ -->
                    <div class="text-center mt-4 pt-2 border-top" style="border-color: #e2e8f0 !important;">
                        <a href="/admin" class="btn-back">
                            <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
                        </a>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>

<!-- ============================================ -->
<!-- ===== SCRIPTS ===== -->
<!-- ============================================ -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(session()->getFlashdata('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Generate Berhasil!',
        html: '<?= session()->getFlashdata('success') ?>',
        confirmButtonColor: '#667eea',
        timer: 4000,
        confirmButtonText: 'Great!'
    });
</script>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Generate Gagal!',
        text: '<?= session()->getFlashdata('error') ?>',
        confirmButtonColor: '#ef4444',
        confirmButtonText: 'OK'
    });
</script>
<?php endif; ?>

<script>
$(document).ready(function() {
    $('#studentSelect').select2({
        theme: 'bootstrap-5',
        placeholder: 'Search by name or matric number',
        allowClear: true,
        width: '100%',
        matcher: function(params, data) {
            if ($.trim(params.term) === '') return data;
            var term = params.term.toLowerCase();
            var text = data.text.toLowerCase();
            var matric = $(data.element).data('matric');
            var name = $(data.element).data('name');
            
            if (text.indexOf(term) > -1) return data;
            if (name && name.toLowerCase().indexOf(term) > -1) return data;
            if (matric && matric.toLowerCase().indexOf(term) > -1) return data;
            return null;
        }
    });
});
</script>

<?= $this->endSection() ?>