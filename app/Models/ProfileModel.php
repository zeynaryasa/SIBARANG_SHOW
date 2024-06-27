<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table            = 'profile';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['appName', 'companyName'];
}
