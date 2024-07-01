<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Inventory Item
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Inventory Item</h2>
<form action="/inventory/update/<?= $inventory['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="assetName">Asset Name</label>
        <input type="text" name="assetName" class="form-control" value="<?= $inventory['assetName'] ?>" required>
    </div>
    <div class="form-group">
        <label for="assetType">Asset Type</label>
        <input type="text" name="assetType" class="form-control" value="<?= $inventory['assetType'] ?>" required>
    </div>
    <div class="form-group">
        <label for="criticality">Criticality</label>
        <input type="text" name="criticality" class="form-control" value="<?= $inventory['criticality'] ?>" required>
    </div>
    <div class="form-group">
        <label for="owner">Owner</label>
        <input type="text" name="owner" class="form-control" value="<?= $inventory['owner'] ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required><?= $inventory['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?= $this->endSection() ?>
