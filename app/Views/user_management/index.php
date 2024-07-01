<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
User Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>User Management</h2>
<a href="/user-management/create" class="btn btn-primary mb-3">Create User</a>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>Username</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['username'] ?></td>
                <td><?= $user['role'] ?></td>
                <td>
                    <a href="/user-management/edit/<?= $user['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/user-management/delete/<?= $user['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
