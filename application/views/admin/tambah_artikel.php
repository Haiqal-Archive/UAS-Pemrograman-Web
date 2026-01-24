<!DOCTYPE html>
<html>
<head>
    <title>Tambah Artikel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Tambah Artikel Baru</h2>
    <div class="card p-4 mt-3">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?= base_url('admin/tambah') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan judul...">
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" class="form-control">
            </div>
            <div class="form-group">
                <label>Konten</label>
                <textarea name="konten" class="form-control" rows="10" placeholder="Tulis konten di sini..."></textarea>
            </div>
            <button type="submit" class="btn btn-success">Simpan Artikel</button>
            <a href="<?= base_url('admin') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
</body>
</html>