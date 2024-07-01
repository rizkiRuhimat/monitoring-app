<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Asset
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Asset</h2>
<form action="/assets/update/<?= $asset['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="asset_name">Asset Name</label>
        <input type="text" name="asset_name" class="form-control" value="<?= $asset['asset_name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" name="type" class="form-control" value="<?= $asset['type'] ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required><?= $asset['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" name="location" class="form-control" value="<?= $asset['location'] ?>" required>
    </div>
    <div class="form-group">
        <label for="purchase_date">Purchase Date</label>
        <input type="date" name="purchase_date" class="form-control" value="<?= $asset['purchase_date'] ?>" required>
    </div>
    <div class="form-group ml-4">
        <input type="checkbox" name="critical_status" class="form-check-input" <?= $asset['critical_status'] ? 'checked' : '' ?>>
        <label for="critical_status">Critical Status</label>
    </div>
    <button type="submit" class="btn btn-primary">Update Asset</button>
</form>
<?= $this->endSection() ?>
