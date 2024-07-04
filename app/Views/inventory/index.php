<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Inventory List
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Inventory List</h2>
<a href="/inventory/create" class="btn btn-primary mb-3">Add New Item</a>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>Asset Name</th>
            <th>Asset Type</th>
            <th>Criticality</th>
            <th>Owner</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($inventory as $item): ?>
            <tr>
                <td><?= $item['assetName'] ?></td>
                <td><?= $item['assetType'] ?></td>
                <td><?= $item['criticality'] ?></td>
                <td><?= $item['owner'] ?></td>
                <td><?= $item['description'] ?></td>
                <td>
                    <a href="/inventory/edit/<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/inventory/delete/<?= $item['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
