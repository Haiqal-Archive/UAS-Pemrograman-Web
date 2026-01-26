<!DOCTYPE html>
<html>
<head>
    <title>Edit Article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Edit Article</h2>
    <div class="card p-4 mt-3">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?= base_url('admin/edit/'.$article['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Article Title</label>
                <input type="text" name="title" class="form-control" value="<?= $article['judul'] ?>">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                <?php if($article['gambar']): ?>
                    <small>Current Image: <img src="<?= base_url('uploads/articles/'.$article['gambar']) ?>" width="100"></small>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" class="form-control" rows="10"><?= $article['konten'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Article</button>
            <a href="<?= base_url('admin') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</body>
</html>