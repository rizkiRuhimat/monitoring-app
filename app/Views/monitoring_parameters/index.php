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
            <th>IP Server</th>
            <th>Environment</th>
            <th>Monitor Category</th>
            <th>Resources / Services</th>
            <th>Thresholds / Ports</th>
            <th>Status / Error Thresholds</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parameters as $parameter): ?>
            <tr>
                <td><?= $parameter['id'] ?></td>
                <td><?= $parameter['ip_server'] ?></td>
                <td><?= $parameter['environment'] ?></td>
                <td><?= $parameter['monitor_category'] ?></td>
                <td>
                    <?php 
                    if ($parameter['monitor_category'] == 'server') {
                        echo 'Resources: ' . json_encode(json_decode($parameter['resources'], true));
                    } elseif ($parameter['monitor_category'] == 'services') {
                        echo 'Services: ' . json_encode(json_decode($parameter['services_name'], true));
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if ($parameter['monitor_category'] == 'server') {
                        echo 'Warning: ' . json_encode(json_decode($parameter['warning_thresholds'], true));
                    } elseif ($parameter['monitor_category'] == 'services') {
                        echo 'Ports: ' . json_encode(json_decode($parameter['service_ports'], true));
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if ($parameter['monitor_category'] == 'server') {
                        echo 'Error: ' . json_encode(json_decode($parameter['err_thresholds'], true));
                    } elseif ($parameter['monitor_category'] == 'services') {
                        echo 'Status: ' . json_encode(json_decode($parameter['status'], true));
                    }
                    ?>
                </td>
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
