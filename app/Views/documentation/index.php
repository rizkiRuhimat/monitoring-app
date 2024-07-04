<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Documentation Management
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Documentation Management</h2>
<a href="/documentation/create" class="btn btn-primary mb-3">Add New Document</a>
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>File</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($documentation as $item): ?>
            <tr>
                <td><?= $item['title'] ?></td>
                <td><?= substr($item['content'], 0, 100) ?>...</td>
                <td>
                    <?php if ($item['file_path']): ?>
                        <a href="<?= base_url('uploads/' . $item['file_path']) ?>" target="_blank">Download</a>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/documentation/edit/<?= $item['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/documentation/delete/<?= $item['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
