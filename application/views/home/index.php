<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3 col-md-4 mb-4">
            <div class="card shadow-sm position-sticky" style="top: 80px;">
                <div class="card-header text-uppercase text-muted fw-bold space-1">
                    Docs & Modules
                </div>
                <div class="card-body p-2">
                    <nav class="nav flex-column">
                        <a class="sidebar-link active" href="#"><i class="bi bi-book"></i> Getting Started</a>
                        
                        <?php if(!empty($articles)): ?>
                            <?php foreach($articles as $a): ?>
                                <a class="sidebar-link" href="<?= base_url('artikel/'.$a['slug']) ?>">
                                    <?= html_escape($a['judul']) ?>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <span class="p-2 text-muted small">No modules documentation yet.</span>
                        <?php endif; ?>

                        <div class="border-top border-secondary my-2"></div>
                        <a class="sidebar-link text-muted small" href="#">Crate: serde</a>
                        <a class="sidebar-link text-muted small" href="#">Crate: tokio</a>
                        <a class="sidebar-link text-muted small" href="#">Crate: actix-web</a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Documentation Content -->
        <div class="col-lg-9 col-md-8">
            <div class="p-5 rounded-3 mb-4" style="background: linear-gradient(145deg, #2d333b 0%, #1f2428 100%); border: 1px solid #444c56;">
                <h1 class="display-5 fw-bold mb-3">Welcome to RustHub</h1>
                <p class="lead text-secondary">The unofficial, community-driven documentation hub for the Rust programming language. Learn ownership, borrowing, and lifetimes with specific examples.</p>
                <hr class="border-secondary my-4">
                <div class="d-flex gap-3">
                    <a href="#" class="btn btn-rust btn-lg">Install Rust</a>
                    <a href="#" class="btn btn-outline-light btn-lg">Read the Book</a>
                </div>
            </div>
            
            <h3 class="border-bottom border-secondary pb-2 mb-4">Recent Updates</h3>
            
            <div class="row">
            <?php foreach($articles as $a): ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title text-white">
                                <a href="<?= base_url('artikel/'.$a['slug']) ?>" class="text-white text-decoration-none">
                                    <?= html_escape($a['judul']) ?>
                                </a>
                            </h5>
                            <h6 class="card-subtitle mb-3 text-muted">
                                Last updated: <?= date('M d, Y', strtotime($a['tanggal_dibuat'] ?? 'now')) ?>
                            </h6>
                            <p class="card-text text-secondary">
                                <?= word_limiter(strip_tags($a['konten']), 20) ?>
                            </p>
                            <a href="<?= base_url('artikel/'.$a['slug']) ?>" class="btn btn-sm btn-outline-info stretched-link">Read Docs</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
