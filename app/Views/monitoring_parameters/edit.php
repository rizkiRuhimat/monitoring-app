<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Monitoring Parameter
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Monitoring Parameter</h2>
<form action="/monitoring_parameters/update/<?= $parameter['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="monitoring_tool">Monitoring Tool</label>
        <input type="text" name="monitoring_tool" class="form-control" value="<?= $parameter['monitoring_tool'] ?>" required>
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
        <input type="text" name="functional_server" class="form-control" value="<?= $parameter['functional_server'] ?>" required>
    </div>
    <div class="form-group">
        <label for="services">Services</label>
        <select name="services" class="form-control" required>
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
        <select name="resources" class="form-control" required>
            <?php foreach ($parameter_names as $name): ?>
                <option value="<?= $name ?>" <?= $parameter['resources'] == $name ? 'selected' : '' ?>><?= $name ?></option>
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
        <label for="tags">Tags</label>
        <textarea name="tags" class="form-control"><?= $parameter['tags'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"><?= $parameter['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update Parameter</button>
</form>
<?= $this->endSection() ?>
