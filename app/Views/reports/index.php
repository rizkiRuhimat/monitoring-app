<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Reports
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
<h2>Generate Incident Report</h2>
<form action="/reports/generate" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="from_date">From Date</label>
        <input type="date" name="from_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="to_date">To Date</label>
        <input type="date" name="to_date" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="severity">Severity</label>
        <select name="severity" class="form-control">
            <option value="">All</option>
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
            <option value="critical">Critical</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="">All</option>
            <option value="open">Open</option>
            <option value="in_progress">In Progress</option>
            <option value="resolved">Resolved</option>
            <option value="closed">Closed</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Generate Report</button>
</form>
<form action="/reports/download" method="post" class="mt-3">
    <?= csrf_field() ?>
    <input type="hidden" name="from_date" value="<?= $fromDate ?? '' ?>">
    <input type="hidden" name="to_date" value="<?= $toDate ?? '' ?>">
    <input type="hidden" name="severity" value="<?= $severity ?? '' ?>">
    <input type="hidden" name="status" value="<?= $status ?? '' ?>">
    <button type="submit" class="btn btn-secondary">Download Report as CSV</button>
</form>
</div>
<?= $this->endSection() ?>
