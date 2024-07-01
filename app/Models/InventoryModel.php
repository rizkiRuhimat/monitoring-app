<?php
namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = 'inventory';
    protected $allowedFields = ['assetName', 'assetType', 'criticality', 'owner', 'description', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
