<?php
    namespace App\Controllers;

    class Book extends BaseController {
        public function index() {
            return view('book_list');
        }
        public function formInsert() {
            // data validator before commiting to database using CI4 validation component
            session();
            $dataValidator = [ 'validation' => \Config\Services::validation() ];

            // go to insert new book, form page
            // use data validator component for form_insert.php
            return view('form_insert', $dataValidator);
        }

        // this codeblock below provides connection to the desired database,
        // using model construction of dbBookModel class
        // and storing the model in a protected variable
        protected $databaseModel;
        public function __construct()
        {
            $this->databaseModel = new \App\Models\dbBookModel();
        }

        // for inserting new book into db
        public function save() {
            // need to validate datas before inserting into db to prevent error on db
            // book title is unique tag, no two or more entry can be the same
            // if it is not fulfilled
            if (!$this->validate([
                'title' => 'required|is_unique[books.title]',
                'author' => 'required',
                'publisher' => 'required',
                'total_pages' => 'required',
                'book_cover' => 'required'
            ])) {

                // one-time error message
                session()->setFlashdata('error', 'Save error, check your input again!');
                // then return back to form with latest input values (must be defined inside input form too)
                return redirect()->to('/book/new')->withInput();
            };

            // using CI4 base model save function with Key Value Pair array into our custom database model
            $this->databaseModel->save([
                'title' => $this->request->getVar('title'),
                'author' => $this->request->getVar('author'),
                'publisher' => $this->request->getVar('publisher'),
                'total_pages' => $this->request->getVar('total_pages'),
                'book_cover' => $this->request->getVar('book_cover')
            ]);

            // display one-time message that KVP array above has been inputted. will transferred to redirect() below this
            session()->setFlashdata('message', 'Book has been successfully saved!');
            // after saving will redirect to localhost/index.php/book page (same as localhost/book)
            return redirect()->to('/book');
        }
    }
    // custom controllers for books
    // flow goes from Routes -> this -> said file inside app\Views\ dir.
?>