<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Alert
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
<h2>Edit Alert</h2>
<form action="/alerts/update/<?= $alert['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" name="type" class="form-control" value="<?= $alert['type'] ?>" required>
    </div>
    <div class="form-group">
        <label for="threshold">Threshold</label>
        <input type="number" name="threshold" class="form-control" value="<?= $alert['threshold'] ?>" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?= $alert['email'] ?>" required>
    </div>
    <div class="form-group">
        <label for="chat_id">Telegram Chat ID</label>
        <input type="text" name="chat_id" class="form-control" value="<?= $alert['chat_id'] ?>">
    </div>
    <button type="submit" class="btn btn-primary mt-4">Update Alert</button>
</form>
</div>
<?= $this->endSection() ?>
