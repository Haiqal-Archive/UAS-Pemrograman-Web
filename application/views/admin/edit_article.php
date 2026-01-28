<!DOCTYPE html>
<html>
<head>
    <title>Edit Article - RustHub Admin</title>
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
        
        .card {
            background-color: var(--rust-card);
            border: 1px solid #444c56;
            border-radius: 8px;
        }
        
        .form-label {
            color: var(--rust-text);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .form-control, .form-control:focus {
            background-color: var(--rust-input-bg);
            border: 1px solid #444c56;
            color: var(--rust-text);
            border-radius: 6px;
        }
        
        .form-control:focus {
            border-color: var(--rust-accent);
            box-shadow: 0 0 0 0.2rem rgba(206, 65, 43, 0.25);
        }
        
        textarea.form-control {
            font-family: 'Fira Code', monospace;
            font-size: 0.9rem;
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
        
        .btn-dark-outline {
            border: 1px solid #444c56;
            color: var(--rust-text);
            background: transparent;
        }
        
        .btn-dark-outline:hover {
            background-color: var(--rust-input-bg);
            color: #fff;
        }
        
        .alert-danger {
            background-color: #f85149;
            border-color: #d73a49;
            color: #fff;
        }
        
        .current-image {
            background-color: var(--rust-input-bg);
            border: 1px solid #444c56;
            border-radius: 6px;
            padding: 8px;
            display: inline-block;
            margin-top: 8px;
        }
        
        .markdown-hint {
            background-color: var(--rust-input-bg);
            border: 1px solid #444c56;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 1rem;
            font-family: 'Fira Code', monospace;
            font-size: 0.85rem;
            color: #8b949e;
        }
        
        .markdown-hint code {
            color: #ff7b72;
            background-color: rgba(110, 118, 129, 0.2);
            padding: 2px 6px;
            border-radius: 3px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2><span class="rust-logo">&gt;_</span> Edit Article</h2>
    <div class="card p-4 mt-3">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?= base_url('admin/edit/'.$article['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Article Title</label>
                <input type="text" name="title" class="form-control" value="<?= html_escape($article['judul']) ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Featured Image</label>
                <input type="file" name="image" class="form-control">
                <?php if($article['gambar'] && $article['gambar'] !== 'default.jpg'): ?>
                    <div class="current-image mt-2">
                        <small style="color: #8b949e; display: block; margin-bottom: 4px;">Current Image:</small>
                        <img src="<?= base_url('uploads/articles/'.$article['gambar']) ?>" width="120" style="border-radius: 4px;">
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <div class="markdown-hint">
                    <strong>Markdown Support:</strong> Use <code>##</code> for headers, <code>**bold**</code>, <code>*italic*</code>, and <code>```rust</code> for code blocks
                </div>
                <textarea name="content" class="form-control" rows="15"><?= html_escape($article['konten']) ?></textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-rust">Update Article</button>
                <a href="<?= base_url('admin') ?>" class="btn btn-dark-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>