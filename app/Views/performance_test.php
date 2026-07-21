<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    .perf-container {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
    }
    .result-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }
    .result-card h4 {
        color: #1a365d;
        font-weight: 700;
    }
    .hash-box {
        background: #0d1117;
        padding: 12px 16px;
        border-radius: 8px;
        font-family: 'Courier New', monospace;
        font-size: 11px;
        word-break: break-all;
        color: #58a6ff;
    }
    .hash-box.sha256 { border-left: 4px solid #3b82f6; }
    .hash-box.sha512 { border-left: 4px solid #8b5cf6; }
    .time-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 14px;
    }
    .time-badge.fast { background: #d1fae5; color: #065f46; }
    .time-badge.slower { background: #fef3c7; color: #92400e; }
    .optimal-box {
        background: linear-gradient(135deg, #1a365d, #2b6cb0);
        color: white;
        padding: 20px;
        border-radius: 12px;
        text-align: center;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .optimal-box h3 { color: white; font-weight: 800; font-size: 22px; }
    .optimal-box .icon { font-size: 48px; margin-bottom: 10px; }
    .optimal-box p { margin-bottom: 4px; }
    .comparison-table th { background: #f8fafc; font-weight: 700; }
    
    /* Two-column layout */
    .results-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    
    .hash-container {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    
    @media (max-width: 768px) {
        .results-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="perf-container fade-in-up">
    <h4 class="fw-bold text-white mb-3">
        <i class="fas fa-flask me-2"></i> Cryptographic Hashing Performance Test
    </h4>
    <p class="text-white-50 small mb-4">
        SHA-256 vs SHA-512: <?= $iterations ?> iterations each
    </p>

    <!-- ===== MAIN RESULTS CARD ===== -->
    <div class="result-card">
        <h4><i class="fas fa-chart-bar me-2" style="color: #667eea;"></i> Test Results</h4>
        <hr>

        <!-- ===== TWO-COLUMN LAYOUT ===== -->
        <div class="results-grid">
            
            <!-- ===== LEFT COLUMN: Hash Results ===== -->
            <div class="hash-container">
                <!-- SHA-256 -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong style="color: #1a365d;">SHA-256</strong>
                            <span class="badge ms-2" style="background: #bfdbfe; color: #1e40af;">64 chars</span>
                            <span class="badge ms-1" style="background: #d1fae5; color: #065f46;">High Security</span>
                        </div>
                        <span class="time-badge fast">⚡ <?= $sha256['time'] ?></span>
                    </div>
                    <div class="hash-box sha256 mt-2">
                        <small class="text-muted">Hash:</small><br>
                        <?= $sha256['hash'] ?>
                    </div>
                </div>

                <!-- SHA-512 -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong style="color: #1a365d;">SHA-512</strong>
                            <span class="badge ms-2" style="background: #e9d5ff; color: #6b21a8;">128 chars</span>
                            <span class="badge ms-1" style="background: #fef3c7; color: #92400e;">Very High Security</span>
                        </div>
                        <span class="time-badge slower">🐢 <?= $sha512['time'] ?></span>
                    </div>
                    <div class="hash-box sha512 mt-2">
                        <small class="text-muted">Hash:</small><br>
                        <?= $sha512['hash'] ?>
                    </div>
                </div>

                <!-- Comparison Table -->
                <div class="table-responsive mt-2">
                    <table class="table table-bordered comparison-table" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th>Algorithm</th>
                                <th>Avg Time</th>
                                <th>Hash Length</th>
                                <th>Security</th>
                                <th>QR Size</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>SHA-256</strong></td>
                                <td><span class="badge bg-success"><?= $sha256['time'] ?></span></td>
                                <td><?= $sha256['length'] ?> chars</td>
                                <td>High</td>
                                <td>✅ Compact</td>
                            </tr>
                            <tr>
                                <td><strong>SHA-512</strong></td>
                                <td><span class="badge bg-warning"><?= $sha512['time'] ?></span></td>
                                <td><?= $sha512['length'] ?> chars</td>
                                <td>Very High</td>
                                <td>⚠️ Larger QR</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ===== RIGHT COLUMN: Optimal Choice ===== -->
            <div>
                <div class="optimal-box">
                    <div class="icon">🏆</div>
                    <h3>Optimal Choice: <?= $optimal ?></h3>
                    <?php if($optimal == 'SHA-256'): ?>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px;">
                            ✅ Faster generation time<br>
                            <span style="font-size: 13px; color: rgba(255,255,255,0.7);">
                                (<?= $sha256['time'] ?> vs <?= $sha512['time'] ?>)
                            </span>
                        </p>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px;">
                            ✅ More compact QR code<br>
                            <span style="font-size: 13px; color: rgba(255,255,255,0.7);">
                                (64 vs 128 characters)
                            </span>
                        </p>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px;">
                            ✅ Sufficient security<br>
                            <span style="font-size: 13px; color: rgba(255,255,255,0.7);">
                                (Collision-resistant & industry standard)
                            </span>
                        </p>
                    <?php else: ?>
                        <p style="color: rgba(255,255,255,0.9); font-size: 14px;">
                            Higher security level<br>
                            Produces larger QR codes (128 chars)
                        </p>
                    <?php endif; ?>
                    <hr style="border-color: rgba(255,255,255,0.2); width: 80%; margin: 12px auto;">
                    <p style="color: rgba(255,255,255,0.6); font-size: 12px;">
                        <i class="fas fa-info-circle me-1"></i> 
                        Tested with <?= $iterations ?> iterations<br>
                        Time difference: <?= $time_diff ?>
                    </p>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== BACK BUTTON ===== -->
    <div class="text-center mt-4">
        <a href="/admin" class="btn btn-outline-light px-4">
            <i class="fas fa-arrow-left me-2"></i> Back to Dashboard
        </a>
    </div>
</div>

<?= $this->endSection() ?>