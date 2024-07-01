<?php

namespace App\Models;

use CodeIgniter\Model;

class ChangeModel extends Model
{
    protected $table = 'changes';
    protected $allowedFields = [
        'title', 'description', 'status', 'requested_by', 'approved_by', 'file_path', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
}
