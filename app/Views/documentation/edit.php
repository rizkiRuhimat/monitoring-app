<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Document
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Document</h2>
<form action="/documentation/update/<?= $documentation['id'] ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="<?= $documentation['title'] ?>" required>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" class="form-control" required><?= $documentation['content'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="file">Upload File</label>
        <input type="file" name="file" class="form-control">
        <?php if ($documentation['file_path']): ?>
            <p>Current File: <a href="<?= base_url('uploads/' . $documentation['file_path']) ?>" target="_blank"><?= $documentation['file_path'] ?></a></p>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Update Document</button>
</form>
<?= $this->endSection() ?>
