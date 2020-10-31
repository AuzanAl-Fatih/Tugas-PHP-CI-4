<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model {
    protected $table      = 'user_data';
    protected $primaryKey = 'user_id';

    protected $returnType     = 'object';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['user_name', 'user_gender','user_phone','user_address','user_photo'];

    protected $useTimestamps = true;
    protected $createdField  = 'user_created_at';
    protected $updatedField  = 'user_updated_at';
    protected $deletedField  = 'user_deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}