<?php
namespace App\Models;

use CodeIgniter\Model;

class MonitoringParametersModel extends Model
{
    protected $table = 'monitoring_parameters';
    protected $allowedFields = [
        'monitoring_tool','ip_address','name_server','functional_server','services','ports_service','resources','thresholds','kpi_indicator','tags','description','created_at','updated_at'
    ];
    protected $useTimestamps = true;
}
