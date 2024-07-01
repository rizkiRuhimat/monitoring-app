<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Request New Change
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
<h2>Request New Change</h2>
<form action="/changes/store" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="requested">Requested</option>
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>
            <option value="implemented">Implemented</option>
        </select>
    </div>
    <div class="form-group">
        <label for="requested_by">Requested By</label>
        <input type="text" name="requested_by" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="approved_by">Approved By</label>
        <input type="text" name="approved_by" class="form-control">
    </div>
    <div class="form-group">
        <label for="file">Upload File</label>
        <input type="file" name="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-4">Submit Change Request</button>
</form>
</div>
<?= $this->endSection() ?>
