<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar Navigation (Same as Home for consistency) -->
        <div class="col-lg-3 col-md-4 mb-4 d-none d-md-block">
            <div class="card shadow-sm position-sticky" style="top: 80px;">
                <div class="card-header text-uppercase text-muted fw-bold space-1">
                    Navigation
                </div>
                <div class="card-body p-2">
                    <nav class="nav flex-column">
                        <a class="sidebar-link" href="<?= base_url() ?>">&larr; Back to Home</a>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Doc Content -->
        <div class="col-lg-8 col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background: transparent; padding: 0;">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Docs</a></li>
                    <li class="breadcrumb-item active text-secondary" aria-current="page"><?= html_escape($artikel['judul']) ?></li>
                </ol>
            </nav>

            <h1 class="display-4 fw-bold mb-4 text-white"><?= html_escape($artikel['judul']) ?></h1>
            
            <?php if(!empty($artikel['gambar']) && $artikel['gambar'] !== 'default.jpg'): ?>
                <div class="mb-4 text-center p-3" style="background:#2d333b; border-radius:8px;">
                    <img src="<?= base_url('uploads/artikel/'.$artikel['gambar']) ?>" class="img-fluid rounded" style="max-height: 400px;" alt="Doc Image">
                </div>
            <?php endif; ?>

            <div class="card p-4 shadow-sm" style="background-color: #1f2428; border: none;">
                <!-- Main Content with styling for Code blocks -->
                <article class="article-content" style="color: #e1e4e8;">
                    <?= $artikel['konten'] ?> 
                </article>
            </div>

            <div class="mt-5 pt-3 border-top border-secondary text-muted d-flex justify-content-between">
                <span>Last commit: <?= date('M d, Y', strtotime($artikel['tanggal_dibuat'] ?? 'now')) ?></span>
                <a href="#" class="text-secondary">Edit this page on GitHub</a>
            </div>
        </div>
        
        <!-- Right TOC (Table of Contents) - Decorative for now -->
        <div class="col-lg-1 d-none d-lg-block">
            <div class="position-sticky" style="top: 80px; font-size: 0.8rem; color: #666;">
                <strong>On this page</strong>
                <ul class="list-unstyled mt-2">
                    <li class="mb-2">Overview</li>
                    <li class="mb-2">Usage</li>
                    <li class="mb-2">Examples</li>
                </ul>
            </div>
        </div>
    </div>
</div>
