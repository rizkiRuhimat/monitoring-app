<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Monitoring Parameter
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
<h2>Edit Monitoring Parameter</h2>
<form action="/monitoring-parameters/update/<?= $parameter['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="hostname">Hostname</label>
        <input type="text" name="hostname" class="form-control" value="<?= $parameter['hostname'] ?>" required>
    </div>
    <div class="form-group">
        <label for="ip_address">IP Address</label>
        <input type="text" name="ip_address" class="form-control" value="<?= $parameter['ip_address'] ?>" required>
    </div>
    <div class="form-group">
        <label for="parameter_name">Parameter Name</label>
        <select name="parameter_name" class="form-control" required>
            <?php foreach ($parameter_names as $name): ?>
                <option value="<?= $name ?>" <?= $parameter['parameter_name'] == $name ? 'selected' : '' ?>><?= $name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="service_name">Service Name</label>
        <select name="service_name" class="form-control" required>
            <?php foreach ($service_names as $service): ?>
                <option value="<?= $service ?>" <?= $parameter['service_name'] == $service ? 'selected' : '' ?>><?= $service ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="threshold">Threshold</label>
        <input type="text" name="threshold" class="form-control" value="<?= $parameter['threshold'] ?>" required>
    </div>
    <div class="form-group ml-4">
        <input type="checkbox" name="kpi_indicator" class="form-check-input" <?= $parameter['kpi_indicator'] ? 'checked' : '' ?>>
        <label for="kpi_indicator">KPI Indicator</label>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required><?= $parameter['description'] ?></textarea>
    </div>


    <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>
<?= $this->endSection() ?>
