<?php
    // Placeholder Model component
    namespace App\Models;
    
    use CodeIgniter\Model;

    class userModels extends Model {
        // using database group (example: database.grouped.hostname properties in .env or Database.php)
        // if 'grouped' is not exist, then use 'default'
        protected $DBGroup = 'grouped';

        // custom database settings (ignoring Database.php vars. if these variables are invoked(?))
        protected $table = 'users';
        protected $primaryKey = 'id';
        protected $useAutoIncrement = true;
        protected $returnType = 'array';
        protected $useSoftDeletes = true;
        protected $allowedFields = ['name', 'email'];
        protected $useTimestamps = false;
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';
        protected $deletedField = 'deleted_at';
        protected $validationRules = [];
        protected $validationMessages = [];
        protected $skipValidation = false;
    }
?>