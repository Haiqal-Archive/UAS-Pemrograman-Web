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
        <a href="<?= base_url('admin/tambah') ?>" class="btn btn-primary">Tambah Artikel Baru</a>
    </div>
    
    <table class="table table-bordered bg-white">
        <thead class="thead-dark">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($artikel as $a): ?>
            <tr>
                <td><?= $a['judul'] ?></td>
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