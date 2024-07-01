<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Create New Alert
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
<h2>Create New Alert</h2>
<form action="/alerts/store" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="type">Type</label>
        <input type="text" name="type" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="threshold">Threshold</label>
        <input type="number" name="threshold" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="chat_id">Telegram Chat ID</label>
        <input type="text" name="chat_id" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-4">Create Alert</button>
</form>
</div>
<?= $this->endSection() ?>
