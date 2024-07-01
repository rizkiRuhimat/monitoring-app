<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Alert Configuration
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Alert Configuration</h2>
<a href="/alerts/create" class="btn btn-primary mb-3">Create New Alert</a>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>Type</th>
            <th>Threshold</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($alerts as $alert): ?>
            <tr>
                <td><?= $alert['type'] ?></td>
                <td><?= $alert['threshold'] ?></td>
                <td><?= $alert['email'] ?></td>
                <td>
                    <a href="/alerts/edit/<?= $alert['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/alerts/delete/<?= $alert['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });
});
</script>
<?= $this->endSection() ?>
