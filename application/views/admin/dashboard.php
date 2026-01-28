<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - RustHub Admin</title>
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
            background-color: var(--rust-bg);
            color: var(--rust-text);
            font-family: 'Fira Sans', sans-serif;
            min-height: 100vh;
        }
        
        h2 {
            color: #fff;
            font-family: 'Fira Code', monospace;
            font-weight: 600;
        }
        
        .rust-logo {
            color: var(--rust-accent);
        }
        
        .table {
            background-color: var(--rust-card);
            color: var(--rust-text);
            border: 1px solid #444c56;
        }
        
        .table thead {
            background-color: var(--rust-input-bg);
            border-bottom: 2px solid var(--rust-accent);
        }
        
        .table thead th {
            color: #fff;
            font-weight: 600;
            border: none;
        }
        
        .table tbody tr {
            border-bottom: 1px solid #444c56;
            background-color: var(--rust-card);
        }
        
        .table tbody tr:hover {
            background-color: #2d333b;
        }
        
        .table td, .table th {
            border: none;
            vertical-align: middle;
            background-color: transparent;
        }
        
        .table tbody td {
            color: #c9d1d9;
            font-size: 0.95rem;
        }
        
        .table tbody td:first-child {
            color: #fff;
            font-weight: 500;
        }
        
        .text-muted {
            color: #8b949e !important;
        }
        
        .btn-rust {
            background-color: var(--rust-accent);
            color: white;
            border: none;
            font-weight: 500;
        }
        
        .btn-rust:hover {
            background-color: #b33522;
            color: white;
        }
        
        .btn-outline-rust {
            border: 1px solid var(--rust-accent);
            color: var(--rust-accent);
            background: transparent;
        }
        
        .btn-outline-rust:hover {
            background-color: var(--rust-accent);
            color: white;
        }
        
        .btn-dark-outline {
            border: 1px solid #444c56;
            color: var(--rust-text);
            background: transparent;
        }
        
        .btn-dark-outline:hover {
            background-color: var(--rust-input-bg);
            color: #fff;
            border-color: #58a6ff;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><span class="rust-logo">&gt;_</span> Article Management</h2>
        <div>
            <a href="<?= base_url() ?>" class="btn btn-dark-outline me-2">← Documentation</a>
            <a href="<?= base_url('admin/create') ?>" class="btn btn-rust me-2">+ New Article</a>
            <a href="<?= base_url('login/logout') ?>" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($articles as $a): ?>
            <tr>
                <td><?= $a['judul'] ?></td>
                <td>
                    <?php if($a['gambar'] && $a['gambar'] !== 'default.jpg'): ?>
                        <img src="<?= base_url('uploads/articles/'.$a['gambar']) ?>" width="80">
                    <?php else: ?>
                        <span class="text-muted">No Image</span>
                    <?php endif; ?>
                </td>
                <td><?= $a['tanggal_dibuat'] ?></td>
                <td>
                    <a href="<?= base_url('admin/edit/'.$a['id']) ?>" class="btn btn-sm btn-outline-rust">Edit</a>
                    <a href="<?= base_url('admin/delete/'.$a['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this article permanently?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>