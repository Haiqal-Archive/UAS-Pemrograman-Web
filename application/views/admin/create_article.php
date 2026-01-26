<!DOCTYPE html>
<html>
<head>
    <title>Create Article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Create New Article</h2>
    <div class="card p-4 mt-3">
        <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?= base_url('admin/create') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Article Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter title...">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="content" class="form-control" rows="10" placeholder="Write content here..."></textarea>
            </div>
            <button type="submit" class="btn btn-success">Save Article</button>
            <a href="<?= base_url('admin') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</body>
</html>