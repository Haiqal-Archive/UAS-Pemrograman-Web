<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Login - RustHub Admin' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600&family=Fira+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --rust-bg: #1f2428;
            --rust-card: #24292e;
            --rust-text: #e1e4e8;
            --rust-accent: #ce412b;
            --rust-input-bg: #2d333b;
        }
        
        body { 
            background: linear-gradient(135deg, #1f2428 0%, #24292e 100%);
            color: var(--rust-text);
            font-family: 'Fira Sans', sans-serif;
            min-height: 100vh;
        }
        
        .login-container { 
            margin-top: 100px; 
            max-width: 420px; 
        }
        
        .card { 
            background-color: var(--rust-card);
            border: 1px solid #444c56;
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.4);
        }
        
        .card-title {
            color: #fff;
            font-family: 'Fira Code', monospace;
            font-weight: 600;
        }
        
        .rust-logo {
            color: var(--rust-accent);
        }
        
        .form-label {
            color: var(--rust-text);
            font-weight: 500;
        }
        
        .form-control {
            background-color: var(--rust-input-bg);
            border: 1px solid #444c56;
            color: var(--rust-text);
            border-radius: 6px;
            padding: 10px 12px;
        }
        
        .form-control:focus {
            background-color: var(--rust-input-bg);
            border-color: var(--rust-accent);
            color: var(--rust-text);
            box-shadow: 0 0 0 0.2rem rgba(206, 65, 43, 0.25);
        }
        
        .form-control::placeholder {
            color: #8b949e;
        }
        
        .btn-rust {
            background-color: var(--rust-accent);
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-rust:hover {
            background-color: #b33522;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(206, 65, 43, 0.4);
        }
        
        .btn-link {
            color: #58a6ff;
        }
        
        .btn-link:hover {
            color: #79c0ff;
        }
        
        .alert-danger {
            background-color: #f85149;
            border-color: #d73a49;
            color: #fff;
        }
    </style>
</head>
<body>
<div class="container login-container">
    <div class="card p-4">
        <div class="card-body">
            <h3 class="text-center mb-2 card-title"><span class="rust-logo">&gt;_</span> RustHub Admin</h3>
            <p class="text-center mb-4" style="color: #8b949e;">Sign in to manage documentation</p>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <form action="<?= base_url('login/verify'); ?>" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@email.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <?php if (method_exists($this->security, 'get_csrf_hash') && $this->config->item('csrf_protection')): ?>
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                <?php endif; ?>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-rust">Sign In</button>
                    <a href="<?= base_url() ?>" class="btn btn-link mt-2 text-center">← Back to Documentation</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
