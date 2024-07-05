<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Add New Monitoring Parameter
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Add New Monitoring Parameter</h2>
<form action="/monitoring_parameters/store" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="monitor_category">Monitor Category</label>
        <select name="monitor_category" id="monitor_category" class="form-control chosen-select" required>
            <option value="">Select Category</option>
            <option value="server">Server</option>
            <option value="services">Services</option>
        </select>
    </div>
    <div class="form-group">
        <label for="ip_server">IP Server</label>
        <input type="text" name="ip_server" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="environment">Environment</label>
        <input type="text" name="environment" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" name="id" class="form-control" required>
    </div>
    <div id="server_fields" style="display: none;">
        <div class="form-group">
            <label for="resources">Resources (JSON format)</label>
            <textarea name="resources" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="warning_thresholds">Warning Thresholds (JSON format)</label>
            <textarea name="warning_thresholds" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="err_thresholds">Error Thresholds (JSON format)</label>
            <textarea name="err_thresholds" class="form-control" rows="3"></textarea>
        </div>
    </div>
    <div id="services_fields" style="display: none;">
        <div class="form-group">
            <label for="services_name">Services Name (JSON format)</label>
            <textarea name="services_name" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="service_ports">Service Ports (JSON format)</label>
            <textarea name="service_ports" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status (JSON format)</label>
            <textarea name="status" class="form-control" rows="3"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Add Parameter</button>
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
