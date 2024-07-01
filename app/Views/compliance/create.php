<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Add New Compliance
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Add New Compliance</h2>
<form action="/compliance/store" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="compliance_metric">Compliance Metric</label>
        <input type="text" name="compliance_metric" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="compliant">Compliant</option>
            <option value="non_compliant">Non-Compliant</option>
        </select>
    </div>
    <div class="form-group">
        <label for="issue_date">Issue Date</label>
        <input type="datetime-local" name="issue_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="resolution_date">Resolution Date</label>
        <input type="datetime-local" name="resolution_date" class="form-control">
    </div>
    <div class="form-group">
        <label for="file">Upload File</label>
        <input type="file" name="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-4">Add Compliance</button>
</form>
<?= $this->endSection() ?>
