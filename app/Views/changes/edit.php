<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Change
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Change</h2>
<form action="/changes/update/<?= $change['id'] ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="<?= $change['title'] ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required><?= $change['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="requested" <?= $change['status'] == 'requested' ? 'selected' : '' ?>>Requested</option>
            <option value="approved" <?= $change['status'] == 'approved' ? 'selected' : '' ?>>Approved</option>
            <option value="rejected" <?= $change['status'] == 'rejected' ? 'selected' : '' ?>>Rejected</option>
            <option value="implemented" <?= $change['status'] == 'implemented' ? 'selected' : '' ?>>Implemented</option>
        </select>
    </div>
    <div class="form-group">
        <label for="requested_by">Requested By</label>
        <input type="text" name="requested_by" class="form-control" value="<?= $change['requested_by'] ?>" required>
    </div>
    <div class="form-group">
        <label for="approved_by">Approved By</label>
        <input type="text" name="approved_by" class="form-control" value="<?= $change['approved_by'] ?>">
    </div>
    <div class="form-group">
        <label for="file">Upload File</label>
        <input type="file" name="file" class="form-control">
        <?php if ($change['file_path']): ?>
            <p>Current File: <a href="<?= base_url('changes/download/' . $change['file_path']) ?>" target="_blank"><?= $change['file_path'] ?></a></p>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Update Change</button>
</form>
<?= $this->endSection() ?>
