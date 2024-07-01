<?php
namespace App\Models;

use CodeIgniter\Model;

class MonitoringParametersModel extends Model
{
    protected $table = 'monitoring_parameters';
    protected $allowedFields = [
        'parameter_name', 'threshold', 'kpi_indicator', 'description',
        'hostname', 'ip_address', 'service_name', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
}
