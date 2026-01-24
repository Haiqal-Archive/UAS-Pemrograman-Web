<!DOCTYPE html>
<html>
<head>
    <title>Edit Artikel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Edit Artikel</h2>
    <div class="card p-4 mt-3">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?= base_url('admin/edit/'.$artikel['id']) ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" name="judul" class="form-control" value="<?= $artikel['judul'] ?>">
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control">
                <?php if($artikel['gambar']): ?>
                    <small>Gambar saat ini: <img src="<?= base_url('uploads/artikel/'.$artikel['gambar']) ?>" width="100"></small>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Konten</label>
                <textarea name="konten" class="form-control" rows="10"><?= $artikel['konten'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Perbarui Artikel</button>
            <a href="<?= base_url('admin') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
</body>
</html>