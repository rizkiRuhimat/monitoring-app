<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Compliance Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Compliance Management</h2>
<a href="/compliance/create" class="btn btn-primary mb-3">Add New Compliance</a>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>Compliance Metric</th>
            <th>Description</th>
            <th>Status</th>
            <th>Issue Date</th>
            <th>Resolution Date</th>
            <th>File</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($compliance as $item): ?>
            <tr>
                <td><?= $item['compliance_metric'] ?></td>
                <td><?= $item['description'] ?></td>
                <td><?= ucfirst($item['status']) ?></td>
                <td><?= $item['issue_date'] ?></td>
                <td><?= $item['resolution_date'] ?></td>
                <td>
                    <?php if ($item['file_path']): ?>
                        <a href="<?= base_url('compliance/download/' . $item['file_path']) ?>" target="_blank">Download</a>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/compliance/edit/<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/compliance/delete/<?= $item['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
