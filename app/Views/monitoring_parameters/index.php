<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Monitoring Parameters
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Monitoring Parameters</h2>
<a href="/monitoring_parameters/create" class="btn btn-primary mb-3">Add New Parameter</a>
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Monitoring Tool</th>
            <th>IP Address</th>
            <th>Name Server</th>
            <th>Functional Server</th>
            <th>Services</th>
            <th>Ports Service</th>
            <th>Resources</th>
            <th>Thresholds</th>
            <th>KPI Indicator</th>
            <th>Tags</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parameters as $parameter): ?>
            <tr>
                <td><?= $parameter['id'] ?></td>
                <td><?= $parameter['monitoring_tool'] ?></td>
                <td><?= $parameter['ip_address'] ?></td>
                <td><?= $parameter['name_server'] ?></td>
                <td><?= $parameter['functional_server'] ?></td>
                <td><?= $parameter['services'] ?></td>
                <td><?= $parameter['ports_service'] ?></td>
                <td><?= $parameter['resources'] ?></td>
                <td><?= $parameter['thresholds'] ?></td>
                <td><?= $parameter['kpi_indicator'] == '1' ? 'Yes' : 'No' ?></td>
                <td>
                    <?php 
                    $tags = json_decode($parameter['tags'], true); 
                    if (is_array($tags)) {
                        echo implode(', ', $tags);
                    } else {
                        echo $parameter['tags'];
                    }
                    ?>
                </td>
                <td><?= $parameter['description'] ?></td>
                <td>
                    <a href="/monitoring_parameters/edit/<?= $parameter['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/monitoring_parameters/delete/<?= $parameter['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Include DataTables and Buttons extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>

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
