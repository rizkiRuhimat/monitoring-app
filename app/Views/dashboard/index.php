<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>
Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<h2>Dashboard</h2>
<div class="row">
    <div class="col-md-8">
        <canvas id="incidentChart"></canvas>
    </div>
    <div class="col-md-2">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Inventory Count</h5>
                <p class="card-text"><?= $inventoryCount ?></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('incidentChart').getContext('2d');
    var chartData = <?= $chartData ?>;
    
    var incidentChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'Number of Incidents by Severity',
                data: chartData.data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
<?= $this->endSection() ?>
