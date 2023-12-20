<?php
    namespace App\Models;
    
    use CodeIgniter\Model;

    class dbBookModel extends Model {
        // using database group (example: database.grouped.hostname properties in .env or Database.php)
        // if 'grouped' is not exist, then use 'default'
        //protected $DBGroup = 'grouped';

        // custom database settings (ignoring Database.php vars. if these variables are invoked(?))
        protected $table = 'books';
        //protected $primaryKey = 'id'; // no need if db already has PK set
        //protected $useAutoIncrement = true; // for ID management, no need if the table already has AutoIncrement set to true
        //protected $returnType = 'array';
        //protected $useSoftDeletes = true;
        protected $allowedFields = ['title', 'author', 'publisher', 'total_pages', 'book_cover'];
        protected $useTimestamps = true; // will fills and take control of created_at and updated_at columns
        //protected $createdField = 'created_at'; // handled by ci4
        //protected $updatedField = 'updated_at'; // handled by ci4
        //protected $deletedField = 'deleted_at';
        //protected $validationRules = [];
        //protected $validationMessages = [];
        //protected $skipValidation = false;
    }
?>