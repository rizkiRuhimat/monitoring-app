<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $table = 'assets';
    protected $allowedFields = [
        'asset_name', 'type', 'description', 'location',
        'purchase_date', 'critical_status', 'created_at', 'updated_at'
    ];
    protected $useTimestamps = true;
}

