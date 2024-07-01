<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Compliance
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Compliance</h2>
<form action="/compliance/update/<?= $compliance['id'] ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="compliance_metric">Compliance Metric</label>
        <input type="text" name="compliance_metric" class="form-control" value="<?= $compliance['compliance_metric'] ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required><?= $compliance['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="compliant" <?= $compliance['status'] == 'compliant' ? 'selected' : '' ?>>Compliant</option>
            <option value="non_compliant" <?= $compliance['status'] == 'non_compliant' ? 'selected' : '' ?>>Non-Compliant</option>
        </select>
    </div>
    <div class="form-group">
        <label for="issue_date">Issue Date</label>
        <input type="datetime-local" name="issue_date" class="form-control" value="<?= $compliance['issue_date'] ?>">
    </div>
    <div class="form-group">
        <label for="resolution_date">Resolution Date</label>
        <input type="datetime-local" name="resolution_date" class="form-control" value="<?= $compliance['resolution_date'] ?>">
    </div>
    <div class="form-group">
        <label for="file">Upload File</label>
        <input type="file" name="file" class="form-control">
        <?php if ($compliance['file_path']): ?>
            <p>Current File: <a href="<?= base_url('uploads/' . $compliance['file_path']) ?>" target="_blank"><?= $compliance['file_path'] ?></a></p>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Update Compliance</button>
</form>
<?= $this->endSection() ?>
