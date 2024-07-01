<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Edit Incident
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Edit Incident</h2>
<form action="/incident-management/update/<?= $incident['id'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="<?= $incident['title'] ?>" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" required><?= $incident['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="severity">Severity</label>
        <select name="severity" class="form-control" required>
            <option value="low" <?= $incident['severity'] == 'low' ? 'selected' : '' ?>>Low</option>
            <option value="medium" <?= $incident['severity'] == 'medium' ? 'selected' : '' ?>>Medium</option>
            <option value="high" <?= $incident['severity'] == 'high' ? 'selected' : '' ?>>High</option>
            <option value="critical" <?= $incident['severity'] == 'critical' ? 'selected' : '' ?>>Critical</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" required>
            <option value="open" <?= $incident['status'] == 'open' ? 'selected' : '' ?>>Open</option>
            <option value="in_progress" <?= $incident['status'] == 'in_progress' ? 'selected' : '' ?>>In Progress</option>
            <option value="resolved" <?= $incident['status'] == 'resolved' ? 'selected' : '' ?>>Resolved</option>
            <option value="closed" <?= $incident['status'] == 'closed' ? 'selected' : '' ?>>Closed</option>
        </select>
    </div>
    <div class="form-group">
        <label for="escalation_level">Escalation Level</label>
        <input type="text" name="escalation_level" class="form-control" value="<?= $incident['escalation_level'] ?>">
    </div>
    <div class="form-group">
        <label for="actions_taken">Actions Taken</label>
        <textarea name="actions_taken" class="form-control"><?= $incident['actions_taken'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<?= $this->endSection() ?>
