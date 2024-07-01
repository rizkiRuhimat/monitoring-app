<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplianceModel extends Model
{
    protected $table = 'compliance';
    protected $allowedFields = [
        'compliance_metric', 'description', 'status',
        'issue_date', 'resolution_date', 'file_path', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
}

