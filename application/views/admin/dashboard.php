<!DOCTYPE html>
<html>
<head>
    <title>CMS Admin - Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Artikel</h2>
        <div>
            <a href="<?= base_url() ?>" class="btn btn-outline-secondary mr-2">&larr; Public Home</a>
            <a href="<?= base_url('admin/tambah') ?>" class="btn btn-primary">Tambah Artikel Baru</a>
            <a href="<?= base_url('login/logout') ?>" class="btn btn-danger ml-2">Logout</a>
        </div>
    </div>
    
    <table class="table table-bordered bg-white">
        <thead class="thead-dark">
            <tr>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($artikel as $a): ?>
            <tr>
                <td><?= $a['judul'] ?></td>
                <td>
                    <?php if($a['gambar'] && $a['gambar'] !== 'default.jpg'): ?>
                        <img src="<?= base_url('uploads/artikel/'.$a['gambar']) ?>" width="80">
                    <?php else: ?>
                        <span class="text-muted">No Image</span>
                    <?php endif; ?>
                </td>
                <td><?= $a['tanggal_dibuat'] ?></td>
                <td>
                    <a href="<?= base_url('admin/edit/'.$a['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('admin/hapus/'.$a['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>