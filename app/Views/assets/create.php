<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Add New Asset
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Add New Asset</h2>
<form action="/assets/store" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="asset_name">Asset Name</label>
        <input type="text" name="asset_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" name="type" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="purchase_date">Purchase Date</label>
        <input type="date" name="purchase_date" class="form-control" required>
    </div>
    <div class="form-group ml-4">
        <input type="checkbox" name="critical_status" class="form-check-input">
        <label for="critical_status">Critical Status</label>
    </div>
    <button type="submit" class="btn btn-primary">Add Asset</button>
</form>
<?= $this->endSection() ?>
