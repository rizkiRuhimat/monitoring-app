<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Change Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Change Management</h2>
<a href="/changes/create" class="btn btn-primary mb-3">Request New Change</a>
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Requested By</th>
            <th>Approved By</th>
            <th>File</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($changes as $change): ?>
            <tr>
                <td><?= $change['title'] ?></td>
                <td><?= substr($change['description'], 0, 100) ?>...</td>
                <td><?= ucfirst($change['status']) ?></td>
                <td><?= $change['requested_by'] ?></td>
                <td><?= $change['approved_by'] ?></td>
                <td>
                    <?php if ($change['file_path']): ?>
                        <a href="<?= base_url('changes/download/' . $change['file_path']) ?>" target="_blank">Download</a>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/changes/edit/<?= $change['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/changes/delete/<?= $change['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
