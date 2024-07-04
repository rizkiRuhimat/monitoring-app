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
            <th>KPI Indicator</th>
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
                <td><?= $parameter['kpi_indicator'] == '1' ? 'Yes' : 'No' ?></td>
                <td><?= $parameter['description'] ?></td>
                <td>
                    <a href="/monitoring_parameters/edit/<?= $parameter['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/monitoring_parameters/delete/<?= $parameter['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
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
