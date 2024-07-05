<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Monitoring Parameter
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Monitoring Parameter</h2>
<form action="/monitoring_parameters/update/<?= $parameter['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="monitor_category">Monitor Category</label>
        <select name="monitor_category" id="monitor_category" class="form-control chosen-select" required>
            <option value="">Select Category</option>
            <option value="server" <?= $parameter['monitor_category'] == 'server' ? 'selected' : '' ?>>Server</option>
            <option value="services" <?= $parameter['monitor_category'] == 'services' ? 'selected' : '' ?>>Services</option>
        </select>
    </div>
    <div class="form-group">
        <label for="ip_server">IP Server</label>
        <input type="text" name="ip_server" class="form-control" value="<?= $parameter['ip_server'] ?>" required>
    </div>
    <div class="form-group">
        <label for="environment">Environment</label>
        <input type="text" name="environment" class="form-control" value="<?= $parameter['environment'] ?>" required>
    </div>
    <div id="server_fields" style="display: <?= $parameter['monitor_category'] == 'server' ? 'block' : 'none' ?>;">
        <div class="form-group">
            <label for="resources">Resources (JSON format)</label>
            <textarea name="resources" class="form-control" rows="3"><?= json_encode(json_decode($parameter['resources'], true)) ?></textarea>
        </div>
        <div class="form-group">
            <label for="warning_thresholds">Warning Thresholds (JSON format)</label>
            <textarea name="warning_thresholds" class="form-control" rows="3"><?= json_encode(json_decode($parameter['warning_thresholds'], true)) ?></textarea>
        </div>
        <div class="form-group">
            <label for="err_thresholds">Error Thresholds (JSON format)</label>
            <textarea name="err_thresholds" class="form-control" rows="3"><?= json_encode(json_decode($parameter['err_thresholds'], true)) ?></textarea>
        </div>
    </div>
    <div id="services_fields" style="display: <?= $parameter['monitor_category'] == 'services' ? 'block' : 'none' ?>;">
        <div class="form-group">
            <label for="services_name">Services Name (JSON format)</label>
            <textarea name="services_name" class="form-control" rows="3"><?= json_encode(json_decode($parameter['services_name'], true)) ?></textarea>
        </div>
        <div class="form-group">
            <label for="service_ports">Service Ports (JSON format)</label>
            <textarea name="service_ports" class="form-control" rows="3"><?= json_encode(json_decode($parameter['service_ports'], true)) ?></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status (JSON format)</label>
            <textarea name="status" class="form-control" rows="3"><?= json_encode(json_decode($parameter['status'], true)) ?></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Parameter</button>
</form>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('.chosen-select').chosen();
    $('#monitor_category').change(function() {
        var category = $(this).val();
        if (category == 'server') {
            $('#server_fields').show();
            $('#services_fields').hide();
        } else if (category == 'services') {
            $('#server_fields').hide();
            $('#services_fields').show();
        } else {
            $('#server_fields').hide();
            $('#services_fields').hide();
        }
    });
});
</script>
<?= $this->endSection() ?>
