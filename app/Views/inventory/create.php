<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Create Inventory Item
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Create Inventory Item</h2>
<form action="/inventory/store" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="assetName">Asset Name</label>
        <input type="text" name="assetName" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="assetType">Asset Type</label>
        <input type="text" name="assetType" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="criticality">Criticality</label>
        <input type="text" name="criticality" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="owner">Owner</label>
        <input type="text" name="owner" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Create</button>
</form>
<?= $this->endSection() ?>
