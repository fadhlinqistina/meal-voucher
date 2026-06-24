<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* Paksa container global dari layout supaya tidak mengganggu form ini */
    .container { max-width: 100% !important; padding: 0 !important; margin: 0 !important; }

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
    .login-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
    }

    /* Reka bentuk kad (Saling tak tumpah macam ui-login.png) */
    .login-card {
        background: #ffffff;
        border-radius: 16px !important; /* Bucu kad lebih bulat */
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        width: 100%;
        max-width: 360px !important; /* Lebar lebih tepat untuk rupa menegak */
        padding: 40px 30px !important; /* Ruang dalaman (padding) kad */
        box-sizing: border-box;
        text-align: center; 
    }

    /* Logo & Tajuk */
    .login-logo {
        max-height: 75px;
        width: auto;
        margin: 0 auto 15px auto;
        display: block;
    }

    .login-title {
        color: #1a365d;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 5px;
        font-family: 'Inter', sans-serif;
    }

    .login-subtitle {
        color: #718096;
        font-size: 12px;
        margin-bottom: 25px;
        display: block;
    }

    /* Susunan Borang dan Input */
    .form-group {
        margin-bottom: 18px;
        text-align: left; /* Pastikan label berada di kiri */
    }

    .form-label {
        display: block !important;
        font-size: 13px !important;
        color: #1a365d !important;
        font-weight: 700 !important;
        margin-bottom: 6px !important;
    }

    .form-label i {
        color: #4a5568;
        margin-right: 5px;
    }

    /* Kotak Input Tepat (Biru Pucat) */
    .login-input {
        display: block !important;
        width: 100% !important;
        background-color: #eef4f9 !important;
        border: 1px solid #d1deea !important;
        padding: 12px 15px !important;
        font-size: 14px !important;
        border-radius: 8px !important;
        color: #2d3748 !important;
        box-sizing: border-box !important;
        transition: all 0.3s ease;
    }

    .login-input:focus {
        background-color: #ffffff !important;
        border-color: #3182ce !important;
        box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.15) !important;
        outline: none;
    }

    /* Butang Log Masuk Penuh Lebar */
    .btn-login {
        display: block !important;
        width: 100% !important;
        background: #1a4975 !important;
        color: #ffffff !important;
        border: none !important;
        font-weight: 600 !important;
        padding: 12px !important;
        border-radius: 8px !important;
        font-size: 15px !important;
        margin-top: 25px !important;
        cursor: pointer;
        box-sizing: border-box !important;
        transition: background 0.3s ease;
        text-align: center !important;
        text-decoration: none !important;
    }
    
    .btn-login:hover {
        background: #123556 !important;
    }

    /* Pautan & Teks di Bawah */
    .login-footer-link {
        font-size: 13px;
        color: #718096;
        margin-top: 20px;
        display: block;
    }

    .login-footer-link a {
        color: #3182ce;
        font-weight: 600;
        text-decoration: none;
    }

    .login-demo-text {
        border-top: 1px solid #e2e8f0;
        margin-top: 20px;
        padding-top: 15px;
        font-size: 11px;
        color: #a0aec0;
        line-height: 1.5;
    }
</style>

<div class="login-wrapper">
    <div class="login-card fade-in-up">
        
        <img src="<?= base_url('images/system-logo.png') ?>" alt="System Logo" class="login-logo">
        <div class="login-title">Meal Voucher System</div>
        <div class="login-subtitle">Login to access your dashboard</div>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" style="font-size: 13px; padding: 10px; margin-bottom: 20px; border-radius: 8px; text-align: left;">
                <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('login') ?>">
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-user"></i> Username
                </label>
                <input type="text" name="username" class="login-input" placeholder="admin1" required autofocus>
            </div>

            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-key"></i> Password
                </label>
                <input type="password" name="password" class="login-input" placeholder="***" required>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <div class="login-footer-link">
            Don't have an account? <a href="<?= base_url('register') ?>">Register here</a>
        </div>

        <div class="login-demo-text">
            <i class="fas fa-info-circle"></i> Demo Personas: student1 / vendor1 / admin1<br>
            Default credentials password: 123
        </div>
        
    </div>
</div>

<?= $this->endSection() ?>