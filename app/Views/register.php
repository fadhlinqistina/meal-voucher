<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* Halang sebarang container Bootstrap dari mengganggu lebar form */
    .container { max-width: 100% !important; padding: 0 !important; margin: 0 !important; width: 100% !important; }

    /* Latar belakang gelap bergradien penuh */
    body {
        background: radial-gradient(circle at center, #26425b 0%, #152738 100%) !important;
        padding: 0 !important;
        margin: 0 !important;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    /* Flexbox wrapper utama */
    .register-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 50px 20px;
        box-sizing: border-box;
    }

    /* Reka bentuk kad - DIPAKSA LEBAR KEPADA 600px */
    .register-card {
        background: #ffffff;
        border-radius: 16px !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        width: 600px !important; /* Paksa kelebaran mutlak 600px */
        max-width: 95% !important; /* Supaya tak pecah di skrin telefon */
        padding: 50px !important; /* Ruang dalaman lebih luas */
        box-sizing: border-box;
        text-align: center; 
    }

    /* Logo & Tajuk */
    .register-logo {
        max-height: 70px;
        width: auto;
        margin: 0 auto 15px auto;
        display: block;
    }

    .register-title {
        color: #1a365d;
        font-size: 26px; /* Dibesarkan */
        font-weight: 700;
        margin-bottom: 5px;
        font-family: 'Inter', sans-serif;
    }

    .register-subtitle {
        color: #718096;
        font-size: 15px; /* Dibesarkan sikit */
        margin-bottom: 30px;
        display: block;
    }

    /* Susunan Borang dan Input */
    .form-group {
        margin-bottom: 22px; /* Jarak antara kotak dilebarkan */
        text-align: left;
    }

    .form-label {
        display: block !important;
        font-size: 14px !important; /* Label lebih besar */
        color: #1a365d !important;
        font-weight: 700 !important;
        margin-bottom: 8px !important;
    }

    .form-label i {
        color: #4a5568;
        margin-right: 5px;
    }

    /* Kotak Input (Biru Pucat) - DIBUAT LEBIH TEBAL/TINGGI */
    .register-input {
        display: block !important;
        width: 100% !important;
        background-color: #eef4f9 !important;
        border: 1px solid #d1deea !important;
        padding: 14px 18px !important; /* Ketinggian kotak ditambah */
        font-size: 15px !important; /* Teks dalam kotak lebih besar */
        border-radius: 10px !important; /* Bucu lebih bulat seimbang dengan saiz baru */
        color: #2d3748 !important;
        box-sizing: border-box !important;
        transition: all 0.3s ease;
    }

    .register-input:focus {
        background-color: #ffffff !important;
        border-color: #3182ce !important;
        box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.15) !important;
        outline: none;
    }

    /* Nota kaki di bawah kotak input */
    .help-text {
        font-size: 12px;
        color: #718096;
        margin-top: 6px;
        display: block;
    }

    /* Butang Daftar - DIBESARKAN */
    .btn-register {
        display: block !important;
        width: 100% !important;
        background: #1a4975 !important;
        color: #ffffff !important;
        border: none !important;
        font-weight: 600 !important;
        padding: 16px !important; /* Butang lebih tinggi */
        border-radius: 10px !important;
        font-size: 17px !important; /* Teks butang lebih besar */
        margin-top: 35px !important;
        cursor: pointer;
        box-sizing: border-box !important;
        transition: background 0.3s ease;
        text-align: center !important;
        text-decoration: none !important;
    }
    
    .btn-register:hover {
        background: #123556 !important;
    }

    /* Pautan di Bawah */
    .register-footer-link {
        font-size: 14px;
        color: #718096;
        margin-top: 25px;
        display: block;
    }

    .register-footer-link a {
        color: #3182ce;
        font-weight: 600;
        text-decoration: none;
    }
</style>

<div class="register-wrapper">
    <div class="register-card fade-in-up">
        
        <img src="<?= base_url('images/system-logo.png') ?>" alt="System Logo" class="register-logo">
        <div class="register-title">Create Account</div>
        <div class="register-subtitle">Register as Student or Vendor</div>

        <?php if(session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger" style="font-size: 14px; padding: 15px; margin-bottom: 25px; border-radius: 10px; text-align: left;">
                <i class="fas fa-exclamation-circle"></i> 
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <div style="margin-top: 4px; padding-left: 5px;">- <?= $error ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('register') ?>" id="registerForm">
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-user"></i> Full Name
                </label>
                <input type="text" name="name" class="register-input" placeholder="Enter your full name" value="<?= old('name') ?>">
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-user-circle"></i> Username <span class="text-danger">*</span>
                </label>
                <input type="text" name="username" class="register-input" placeholder="Choose a username" value="<?= old('username') ?>" required>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-lock"></i> Password <span class="text-danger">*</span>
                </label>
                <input type="password" name="password" class="register-input" placeholder="Choose a password" required>
                <span class="help-text">Minimum 3 characters</span>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-user-tag"></i> Register As <span class="text-danger">*</span>
                </label>
                <select name="role" id="role" class="register-input" required style="appearance: auto;">
                    <option value="">-- Select Role --</option>
                    <option value="student" <?= old('role') == 'student' ? 'selected' : '' ?>>Student</option>
                    <option value="vendor" <?= old('role') == 'vendor' ? 'selected' : '' ?>>Vendor</option>
                </select>
            </div>

            <div id="studentFields" style="display: none;">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-id-card"></i> Matric Number
                    </label>
                    <input type="text" name="matric_no" class="register-input" placeholder="e.g., A12345" value="<?= old('matric_no') ?>">
                </div>
            </div>

            <div id="vendorFields" style="display: none;">
                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-store"></i> Vendor Code
                    </label>
                    <input type="text" name="vendor_code" class="register-input" placeholder="e.g., VCH001" value="<?= old('vendor_code') ?>">
                    <span class="help-text">Optional unique code for your business</span>
                </div>
            </div>

            <button type="submit" class="btn-register">
                <i class="fas fa-user-plus me-1"></i> Register
            </button>
        </form>

        <div class="register-footer-link">
            Already have an account? <a href="<?= base_url('login') ?>">Login here</a>
        </div>
        
    </div>
</div>

<script>
document.getElementById('role').addEventListener('change', function() {
    const studentFields = document.getElementById('studentFields');
    const vendorFields = document.getElementById('vendorFields');
    
    if (this.value === 'student') {
        studentFields.style.display = 'block';
        vendorFields.style.display = 'none';
    } else if (this.value === 'vendor') {
        studentFields.style.display = 'none';
        vendorFields.style.display = 'block';
    } else {
        studentFields.style.display = 'none';
        vendorFields.style.display = 'none';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const role = document.getElementById('role').value;
    if (role === 'student') {
        document.getElementById('studentFields').style.display = 'block';
    } else if (role === 'vendor') {
        document.getElementById('vendorFields').style.display = 'block';
    }
});
</script>

<!-- ===== SWEETALERT ===== -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(session()->getFlashdata('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Registration Successful!',
        text: '<?= session()->getFlashdata('success') ?>',
        confirmButtonColor: '#1a4975',
        confirmButtonText: 'Login Now',
        timer: 4000
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = '/login';
        }
    });
</script>
<?php endif; ?>

<?php if(session()->getFlashdata('errors')): ?>
<script>
    Swal.fire({
        icon: 'error',
        title: 'Registration Failed!',
        html: `<?php foreach(session()->getFlashdata('errors') as $error): ?><div>- <?= $error ?></div><?php endforeach; ?>`,
        confirmButtonColor: '#ef4444',
        confirmButtonText: 'Try Again'
    });
</script>
<?php endif; ?>

<?= $this->endSection() ?>