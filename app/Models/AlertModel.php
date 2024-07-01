<?php

namespace App\Models;

use CodeIgniter\Model;

class AlertModel extends Model
{
    protected $table = 'alerts';
    protected $allowedFields = ['type', 'threshold', 'email', 'chat_id', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}


