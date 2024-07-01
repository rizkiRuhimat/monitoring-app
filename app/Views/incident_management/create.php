<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Report New Incident
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Report New Incident</h2>
<form action="/incident-management/store" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="severity">Severity</label>
        <select name="severity" class="form-control" required>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
            <option value="critical">Critical</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="open">Open</option>
            <option value="in_progress">In Progress</option>
            <option value="resolved">Resolved</option>
            <option value="closed">Closed</option>
        </select>
    </div>
    <div class="form-group">
        <label for="escalation_level">Escalation Level</label>
        <input type="text" name="escalation_level" class="form-control">
    </div>
    <div class="form-group">
        <label for="actions_taken">Actions Taken</label>
        <textarea name="actions_taken" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Report</button>
</form>
<?= $this->endSection() ?>
