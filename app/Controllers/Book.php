<?php
    namespace App\Controllers;

    class Book extends BaseController {

        // this codeblock below provides connection to the desired database,
        // using model construction of dbBookModel class
        // and storing the model in a protected variable
        protected $databaseModel;
        public function __construct()
        {
            $this->databaseModel = new \App\Models\dbBookModel();
        }

        public function index() {
            // define how the book database model works, then fetch the book data
            // and then sends that to be displayed in book list page

            // this function access the book databases, if the database is offline then the page will hit 404
            $bookData = $this->databaseModel->findAll();
            $data = [
                'bookData' => $bookData
            ];

            return view('book_list', $data);
        }
        public function formInsert() {
            // data validator before commiting to database using CI4 validation component
            session();
            $dataValidator = [ 'validation' => \Config\Services::validation() ];

            // go to insert new book, form page
            // use data validator component for form_insert.php
            return view('form_insert', $dataValidator);
        }

        // for inserting new book into db
        public function save() {

            $validationRule =
            [
                'title' => 'required|is_unique[books.title]',
                'author' => 'required',
                'publisher' => 'required',
                'total_pages' => 'required|is_natural_no_zero'
                ,'book_cover' =>
                [
                    'rules' => 'uploaded[book_cover]|is_image[book_cover]|max_size[book_cover,1024]|max_dims[book_cover,4096,4096]|mime_in[book_cover,image/jpg,image/jpeg,image/png]|ext_in[book_cover,jpg,jpeg,png]'
                ]
            ];

            // need to validate datas before inserting into db to prevent error on db
            // book title is unique tag, no two or more entry can be the same
            // if it is not fulfilled
            if (!$this->validate($validationRule)) {
                // one-time error message
                session()->setFlashdata('error', 'Save error, make sure there are no empty field, zero page, or duplicate title!');
                // then return back to form with latest input values (must be defined inside input form too)
                return redirect()->to('/book/new')->withInput();
            };

            // fetch image file entry (blob)
            $fileUpload = $this->request->getFile('book_cover');
            // and generate random name for uploaded file
            $randomName = $fileUpload->getRandomName();
            // and then move to /public/blob_images dir (excluded for different machines because of local db)
            $fileUpload->move('blob_images', $randomName);

            // using CI4 base model save function with Key Value Pair array into our custom database model
            // while book_cover save only the file name
            $this->databaseModel->save(
                [
                    'title' => $this->request->getVar('title'),
                    'author' => $this->request->getVar('author'),
                    'publisher' => $this->request->getVar('publisher'),
                    'total_pages' => $this->request->getVar('total_pages'),
                    'book_cover' => $randomName
                ]
            );

            // display one-time message that KVP array above has been inputted. will transferred to redirect() below this
            session()->setFlashdata('message', 'Book has been successfully saved!');
            // after saving will redirect to localhost/index.php/book page (same as localhost/book)
            return redirect()->to('/book/save')->withInput();
        }

        // catch the edit id for updating book purpose
        public function update() {
            $id = $this->request->getVar('id_for_editing');

            session();

            // get the rest of data from database structure based on id
            // using custom function from this to dbBookModel.php
            // sending the validator and display the chosen book as bookDetails var.
            $componentsAndDossier = [
                'validation' => \Config\Services::validation(),
                'bookDetails' => $this->databaseModel->fetchBookData($id)
            ];

            return view('update_book', $componentsAndDossier);
        }

        // function for processing database update
        public function executeUpdate() {
            // catch id_edit var from input->name request from update_book.php
            $id = $this->request->getVar('id_edit');

            // state the current book data by fetching, by not updating the book title
            // will allow changes into the database entry
            $currentBook = $this->databaseModel->fetchBookData($id);
            // using ternary if-statement
            ($this->request->getVar('title') == $currentBook['title']) 
                ? $newRule = 'required' 
                : $newRule = 'required|is_unique[books.title]';

            // validate function for database
            if (!$this->validate([
                'title' => $newRule,
                'author' => 'required',
                'publisher' => 'required',
                'total_pages' => 'required|is_natural_no_zero',
                'book_cover' => 'required'
            ])) {
                return redirect()->to('/book/edit')->withInput();
            };

            // invoke updateBookData with provided id and request for changes of book details as an array union, as args.
            // $this->databaseModel->updateBookData(
            //     $id, 
            //     [
            //         'title' => $this->request->getVar('title'),
            //         'author' => $this->request->getVar('author'),
            //         'publisher' => $this->request->getVar('publisher'),
            //         'total_pages' => $this->request->getVar('total_pages'),
            //         'book_cover' => $this->request->getVar('book_cover')
            //     ]
            // );
            // alternate function: using inbuilt save() rather than above function (updateBookData()), works the same.
            $this->databaseModel->save(
                [
                    'id' => $id,
                    'title' => $this->request->getVar('title'),
                    'author' => $this->request->getVar('author'),
                    'publisher' => $this->request->getVar('publisher'),
                    'total_pages' => $this->request->getVar('total_pages'),
                    'book_cover' => $this->request->getVar('book_cover')
                ]
            );

            // Add flash data information (success message) and return to book_list
            session()->setFlashdata('updates', 'Book has been successfully updated!');
            return redirect()->to('/book');
        }

        public function delete() {
            // triggered from delete button on book_list.php
            $id = $this->request->getVar('id_for_deletion');
            
            // call the database function and delete the entry by their respective ids
            $this->databaseModel->delete($id);

            // one-time popup while redirected back to /book
            session()->setFlashdata('updated', 'Book successfully deleted.');
            return redirect()->to('/book');
        }
    }
    // custom controllers for books
    // flow goes from Routes -> this -> said file inside app\Views\ dir.
?>