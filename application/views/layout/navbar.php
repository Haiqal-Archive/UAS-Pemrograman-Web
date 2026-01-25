<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="<?= base_url() ?>">
            &#9881; Rust<span>Hub</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navRust">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navRust">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" href="<?= base_url() ?>">Docs</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Community</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Crates</a></li>
            </ul>
            <div class="d-flex">
                <?php if($this->session->userdata('is_login')): ?>
                    <a href="<?= base_url('admin') ?>" class="btn btn-outline-light btn-sm me-2">Settings (Admin)</a>
                    <a href="<?= base_url('login/logout') ?>" class="btn btn-danger btn-sm">Log Out</a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="btn btn-rust btn-sm">Sign In</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
