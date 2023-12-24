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

        // get the given id then give those back by picking the first occurence
        // 'where' is a ci4 query command for finding an element inside a database
        public function fetchBookData($param) {
            return $this->where([
                'id' => $param
            ])->first();
        }

        // function engine for updating book entry by ID (function invoked from Book.php)
        public function updateBookData($bookId, $bookDetails) {
            // using database query/command builder to access and modify the entries, by pointing which $table wants to be altered on
            $queryBuilder = $this->db->table($this->table);

            // find where the requested id is located (books->id)
            $queryBuilder->where('id', $bookId);

            // then execute the database 'Update' function using this code, and return
            return $queryBuilder->update($bookDetails);
        }
    }
?>