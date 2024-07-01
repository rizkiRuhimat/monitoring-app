<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Incident Report
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Incident Report</h2>
<table id="datatable" class="display cell-border">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Severity</th>
            <th>Status</th>
            <th>Escalation Level</th>
            <th>Actions Taken</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($incidents as $incident): ?>
            <tr>
                <td><?= $incident['id'] ?></td>
                <td><?= $incident['title'] ?></td>
                <td><?= $incident['description'] ?></td>
                <td><?= ucfirst($incident['severity']) ?></td>
                <td><?= ucfirst($incident['status']) ?></td>
                <td><?= $incident['escalation_level'] ?></td>
                <td><?= $incident['actions_taken'] ?></td>
                <td><?= $incident['created_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- Include DataTables and Buttons extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

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
