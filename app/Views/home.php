<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center mt-5">
    <div class="col-md-6 col-lg-5">
        <div class="card-modern p-5 text-center fade-in-up">
            
            <div class="mb-4">
                <h4 class="fw-bold" style="color: #1a365d;">Welcome to Workspace</h4>
                <p class="text-muted">Select an action below to proceed</p>
            </div>

            <div class="d-grid gap-3">
                <a href="/generate" class="btn btn-primary">
                    <i class="fas fa-qrcode me-2"></i> Generate Voucher
                </a>
                <a href="/scan" class="btn btn-success">
                    <i class="fas fa-camera me-2"></i> Scan Voucher
                </a>
                <a href="/logout" class="btn btn-outline-danger mt-2">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </div>

        </div>
    </div>
</div>

<!-- ===== SWEETALERT ===== -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
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