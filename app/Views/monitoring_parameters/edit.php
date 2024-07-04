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
        <select name="monitoring_tool" class="form-control chosen-select" required>
            <?php foreach ($tools_names as $tools): ?>
                <option value="<?= $tools ?>" <?= $parameter['monitoring_tool'] == $tools ? 'selected' : '' ?>><?= $tools ?></option>
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
        <select class="form-control select2" multiple="multiple" name="services[]">
            <?php foreach ($service_names as $name): ?>
                <option value="<?= $name ?>"><?= $name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="ports_service">Ports Service</label>
        <input type="text" name="ports_service" class="form-control" value="<?= $parameter['ports_service'] ?>" required>
    </div>
    <div class="form-group">
        <label for="kpi_indicator">KPI Indicator</label>
        <select name="kpi_indicator" class="form-control" required>
            <option value="1" <?= $parameter['kpi_indicator'] == '1' ? 'selected' : '' ?>>Yes</option>
            <option value="0" <?= $parameter['kpi_indicator'] == '0' ? 'selected' : '' ?>>No</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control"><?= $parameter['description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-4">Update Parameter</button>
</form>

<!-- Load file CSS Bootstrap dan Select2 melalui CDN -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<!-- Load file JS untuk JQuery dan Selec2.js melalui CDN -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $(".select2").select2({
        });
    });
</script>
</div>
<?= $this->endSection() ?>
