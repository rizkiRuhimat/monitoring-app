<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Monitoring Parameters
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Monitoring Parameters</h2>
<a href="/monitoring-parameters/create" class="btn btn-primary mb-3">Add New Parameter</a>
<table id="datatable" class="display">
    <thead>
        <tr>
            <th>IP Server</th>
            <th>Server Name</th>
            <th>Parameter Name</th>
            <th>Threshold</th>
            <th>KPI Indicator</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parameters as $parameter): ?>
            <tr>
                <td><?= $parameter['ip_address'] ?></td>
                <td><?= $parameter['hostname'] ?></td>
                <td><?= $parameter['parameter_name'] ?></td>
                <td><?= $parameter['threshold'] ?></td>
                <td><?= $parameter['kpi_indicator'] ? 'Yes' : 'No' ?></td>
                <td><?= $parameter['description'] ?></td>
                <td>
                    <a href="/monitoring-parameters/edit/<?= $parameter['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/monitoring-parameters/delete/<?= $parameter['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?= $this->endSection() ?>
