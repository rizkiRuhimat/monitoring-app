<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Add New Document
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Add New Document</h2>
<form action="/documentation/store" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="file">Upload File</label>
        <input type="file" name="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-4">Add Document</button>
</form>
<?= $this->endSection() ?>
