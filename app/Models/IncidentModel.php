<?php

namespace App\Models;

use CodeIgniter\Model;

class IncidentModel extends Model
{
    protected $table = 'incidents';
    protected $allowedFields = [
        'title', 'description', 'severity', 'status',
        'escalation_level', 'actions_taken', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
}
