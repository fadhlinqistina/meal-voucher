<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card-modern p-4 p-md-5">
                <h3 class="fw-bold mb-4 text-center" style="color: #1a365d;">
                    <i class="fas fa-plus-circle me-2"></i> Generate Voucher
                </h3>
                
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger" style="border-radius: 8px;">
                        <i class="fas fa-exclamation-circle me-2"></i> <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                
                <?php if(session()->getFlashdata('success')): ?>
                    <div class="alert alert-success" style="border-radius: 8px;">
                        <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                
                <div class="card mb-5 shadow-sm" style="border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;">
                    <div class="card-header fw-bold py-3" style="background-color: #1a365d; color: #ffffff; border-bottom: none;">
                        <i class="fas fa-user-graduate me-2"></i> Generate for Single Student
                    </div>
                    <div class="card-body p-4" style="background-color: #ffffff;">
                        <form action="/admin/generate" method="post" id="singleGenerateForm">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold" style="color: #2d3748;">Select Student <span class="text-danger">*</span></label>
                                    <select name="student_id" id="studentSelect" class="form-select" required style="width: 100%;">
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
                                    <small class="text-muted mt-1 d-block"><i class="fas fa-search me-1"></i> Ketik untuk mencari nama / matrik</small>
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label fw-bold" style="color: #2d3748;">Select Vendor <span class="text-danger">*</span></label>
                                    <select name="vendor_id" class="form-select form-modern" required>
                                        <option value="">-- Choose Vendor --</option>
                                        <?php foreach($vendors as $v): ?>
                                            <option value="<?= $v['username'] ?>">
                                                <?= $v['name'] ?? $v['username'] ?> (<?= $v['vendor_code'] ?? '' ?>)
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label fw-bold" style="color: #2d3748;">Amount (RM) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #eef4f9; border: 1px solid #d1deea; color: #1a365d; font-weight: bold;">RM</span>
                                        <input type="number" name="amount" class="form-control form-modern" style="border-left: none;"
                                               step="0.01" min="1" max="500" value="10.00" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label class="form-label fw-bold" style="color: #2d3748;">Expiry Date <span class="text-danger">*</span></label>
                                    <input type="date" name="expiry_date" class="form-control form-modern" 
                                           min="<?= date('Y-m-d') ?>" 
                                           value="<?= date('Y-m-d', strtotime('+30 days')) ?>" required>
                                </div>
                                
                                <div class="col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary w-100 py-2">
                                        <i class="fas fa-ticket-alt me-2"></i> Generate
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card mb-4 shadow-sm" style="border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;">
                    <div class="card-header fw-bold py-3" style="background-color: #2d3748; color: #ffffff; border-bottom: none;">
                        <div class="d-flex justify-content-between align-items-center">
                            <div><i class="fas fa-layer-group me-2"></i> Bulk Generate (All Students)</div>
                            <span class="badge" style="background-color: #00a3c4; font-size: 0.85rem;"><?= count($students) ?> students</span>
                        </div>
                    </div>
                    <div class="card-body p-4" style="background-color: #ffffff;">
                        <form action="/admin/bulk-generate" method="post">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold" style="color: #2d3748;">Select Vendor <span class="text-danger">*</span></label>
                                    <select name="vendor_id" class="form-select form-modern" required>
                                        <option value="">-- Choose Vendor --</option>
                                        <?php foreach($vendors as $v): ?>
                                            <option value="<?= $v['username'] ?>">
                                                <?= $v['name'] ?? $v['username'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-3">
                                    <label class="form-label fw-bold" style="color: #2d3748;">Amount (RM) <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background-color: #eef4f9; border: 1px solid #d1deea; color: #1a365d; font-weight: bold;">RM</span>
                                        <input type="number" name="amount" class="form-control form-modern" style="border-left: none;"
                                               step="0.01" min="1" max="500" value="10.00" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <label class="form-label fw-bold" style="color: #2d3748;">Expiry Date <span class="text-danger">*</span></label>
                                    <input type="date" name="expiry_date" class="form-control form-modern" 
                                           min="<?= date('Y-m-d') ?>" 
                                           value="<?= date('Y-m-d', strtotime('+30 days')) ?>" required>
                                </div>
                                
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-warning w-100 py-2 fw-bold" style="color: #ffffff; background-color: #d69e2e; border-color: #d69e2e;"
                                            onclick="return confirm('Generate vouchers for ALL <?= count($students) ?> students?')">
                                        <i class="fas fa-play me-1"></i> Run All
                                    </button>
                                </div>
                            </div>
                            <div class="mt-4 p-3 rounded" style="background-color: #fffaf0; border: 1px solid #feebc8; color: #c05621; font-size: 0.9rem;">
                                <i class="fas fa-exclamation-triangle me-1"></i> 
                                <strong>Peringatan:</strong> Tindakan ini akan meng-generate voucher satu per satu untuk KESELURUHAN <?= count($students) ?> siswa yang terdaftar di dalam sistem.
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <a href="/admin" class="btn btn-outline-secondary px-4 py-2" style="border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

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
        confirmButtonColor: '#1a365d',
        timer: 4000
    });
</script>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Generate Gagal!',
        text: '<?= session()->getFlashdata('error') ?>',
        confirmButtonColor: '#e53e3e'
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

<style>
.select2-container--bootstrap-5 .select2-selection {
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    padding: 6px 12px;
    min-height: 48px;
    display: flex;
    align-items: center;
}
.select2-container--bootstrap-5 .select2-selection--single .select2-selection__placeholder { color: #a0aec0; }
.select2-container--bootstrap-5 .select2-dropdown { border-radius: 8px; border: 1px solid #e2e8f0; box-shadow: 0 10px 25px rgba(0,0,0,0.1); }
.select2-container--bootstrap-5 .select2-results__option--highlighted { background-color: #3182ce; }
</style>

<?= $this->endSection() ?>