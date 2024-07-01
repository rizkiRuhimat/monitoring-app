<?php

namespace App\Models;

use CodeIgniter\Model;

class DocumentationModel extends Model
{
    protected $table = 'documentation';
    protected $allowedFields = ['title', 'content', 'file_path', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}


