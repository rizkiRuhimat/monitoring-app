<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Incident Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Incident Management</h2>
<a href="/incident-management/create" class="btn btn-primary mb-3">Report New Incident</a>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Severity</th>
            <th>Status</th>
            <th>Escalation Level</th>
            <th>Actions Taken</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($incidents as $incident): ?>
            <tr>
                <td><?= $incident['title'] ?></td>
                <td><?= $incident['description'] ?></td>
                <td><?= ucfirst($incident['severity']) ?></td>
                <td><?= ucfirst($incident['status']) ?></td>
                <td><?= $incident['escalation_level'] ?></td>
                <td><?= $incident['actions_taken'] ?></td>
                <td><?= $incident['created_at'] ?></td>
                <td>
                    <a href="/incident-management/edit/<?= $incident['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/incident-management/delete/<?= $incident['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
$(document).ready(function() {
    if (!$.fn.dataTable.isDataTable('#datatable')) {
        $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    }
});
</script>
<?= $this->endSection() ?>
