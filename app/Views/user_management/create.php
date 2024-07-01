<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Create User
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
<h2>Create User</h2>
<form action="/user-management/store" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role" class="form-control" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
            <option value="viewer">Viewer</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Create</button>
</form>
</div>
<?= $this->endSection() ?>
