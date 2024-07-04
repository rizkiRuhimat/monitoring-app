<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Monitoring Parameter
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
<h2>Edit Monitoring Parameter</h2>
<form action="/monitoring_parameters/update/<?= $parameter['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="monitoring_tool">Monitoring Tool</label>
        <?php foreach ($tools_names as $tools): ?>
                <option value="<?= $tools ?>" <?= $parameter['tools_names'] == $tools ? 'selected' : '' ?>><?= $tools ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="ip_address">IP Address</label>
        <input type="text" name="ip_address" class="form-control" value="<?= $parameter['ip_address'] ?>" required>
    </div>
    <div class="form-group">
        <label for="name_server">Name Server</label>
        <input type="text" name="name_server" class="form-control" value="<?= $parameter['name_server'] ?>" required>
    </div>
    <div class="form-group">
        <label for="functional_server">Functional Server</label>
        <select name="functional_server" class="form-control chosen-select" required>
            <?php foreach ($functional_servers as $server): ?>
                <option value="<?= $server ?>" <?= $parameter['functional_server'] == $server ? 'selected' : '' ?>><?= $server ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="services">Services</label>
        <select name="services" class="form-control chosen-select" required>
            <?php foreach ($service_names as $name): ?>
                <option value="<?= $name ?>" <?= $parameter['services'] == $name ? 'selected' : '' ?>><?= $name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="ports_service">Ports Service</label>
        <input type="text" name="ports_service" class="form-control" value="<?= $parameter['ports_service'] ?>" required>
    </div>
    <div class="form-group">
        <label for="resources">Resources</label>
        <select name="resources" class="form-control chosen-select" required>
            <?php foreach ($resource_names as $resource): ?>
                <option value="<?= $resource ?>" <?= $parameter['resources'] == $resource ? 'selected' : '' ?>><?= $resource ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="thresholds">Thresholds</label>
        <input type="number" name="thresholds" class="form-control" value="<?= $parameter['thresholds'] ?>" required>
    </div>
    <div class="form-group">
        <label for="kpi_indicator">KPI Indicator</label>
        <select name="kpi_indicator" class="form-control" required>
            <option value="1" <?= $parameter['kpi_indicator'] == '1' ? 'selected' : '' ?>>Yes</option>
            <option value="0" <?= $parameter['kpi_indicator'] == '0' ? 'selected' : '' ?>>No</option>
        </select>
    </div>
    <div class="form-group">
        <label for="tags">Tags (JSON format)</label>
        <textarea name="tags" class="form-control" rows="3" required><?= json_encode(json_decode($parameter['tags'], true)) ?></textarea>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"><?= $parameter['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Update Parameter</button>
</form>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.chosen-select').chosen();
});
</script>
</div>
<?= $this->endSection() ?>
