<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Asset Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Asset Management</h2>
<a href="/assets/create" class="btn btn-primary mb-3">Add New Asset</a>
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Asset Name</th>
            <th>Type</th>
            <th>Description</th>
            <th>Location</th>
            <th>Purchase Date</th>
            <th>Critical Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($assets as $asset): ?>
            <tr>
                <td><?= $asset['asset_name'] ?></td>
                <td><?= $asset['type'] ?></td>
                <td><?= $asset['description'] ?></td>
                <td><?= $asset['location'] ?></td>
                <td><?= $asset['purchase_date'] ?></td>
                <td><?= $asset['critical_status'] ? 'Yes' : 'No' ?></td>
                <td>
                    <a href="/assets/edit/<?= $asset['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/assets/delete/<?= $asset['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
