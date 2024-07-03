<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Add New Monitoring Parameter
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Add New Monitoring Parameter</h2>
<form action="/monitoring_parameters/store" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="monitoring_tool">Monitoring Tool</label>
        <input type="text" name="monitoring_tool" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="ip_address">IP Address</label>
        <input type="text" name="ip_address" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="name_server">Name Server</label>
        <input type="text" name="name_server" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="functional_server">Functional Server</label>
        <input type="text" name="functional_server" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="services">Services</label>
        <select name="services" class="form-control" required>
            <?php foreach ($service_names as $name): ?>
                <option value="<?= $name ?>"><?= $name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="ports_service">Ports Service</label>
        <input type="text" name="ports_service" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="resources">Resources</label>
        <select name="resources" class="form-control" required>
            <?php foreach ($parameter_names as $name): ?>
                <option value="<?= $name ?>"><?= $name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="thresholds">Thresholds</label>
        <input type="number" name="thresholds" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="kpi_indicator">KPI Indicator</label>
        <select name="kpi_indicator" class="form-control" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <textarea name="tags" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Parameter</button>
</form>
<?= $this->endSection() ?>
