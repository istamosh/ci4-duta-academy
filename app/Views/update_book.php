<!-- redirected from app/Controller/Book.php index() -->

<!-- borrowing from layouts/matrix/ -->
<?= $this->extend('layouts/matrix') ?>

<!-- define content section -->
<?= $this->section('content') ?>

    <?php
    if (session()->getFlashdata('error')):
    ?>
        <div class="alert alert-danger" role="alert">
            <!-- classes above derived from (https://getbootstrap.com/docs/5.0/components/alerts/) -->
            <!-- invoke this particular code from Book.php -->
            <?= session()->getFlashdata('error')?>
        </div>
    <?php
    endif;

    // // (debugging purpose) catch the bookDetails var. from Book.php
    // print_r($bookDetails);
    ?>

    <div class="row">
        <div class="col">

            <!-- using Card table -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Book</h4>

                    <!-- /book/execute_update will be routed to Book.php->executeUpdate() -->
                    <form class="needs-validation" action="/book/execute_update" method="post">
                        <!-- cross site request forgery - hidden input field -->
                        <?= csrf_field(); ?>

                        <div class="row mb-3">
                            <label for="title" class="col-sm-4 col-form-label">Book Title</label>
                            <div class="col-sm-10">
                                <!-- if data validation has error, points to the error sector form -->
                                <!-- using data validator component as $validation from Book.php -->
                                <!-- grab value from last input form -->
                                <input 
                                    type="text" 
                                    class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" 
                                    name="title" 
                                    id="id_title" 
                                    value="<?= old("title") ? old('title') : $bookDetails['title']; ?>"
                                    autofocus
                                    required
                                >

                                <!-- feedback from corresponding form -->
                                <div id="titleFeedback" class="invalid-feedback">
                                    This field is empty. <?= $validation->getError('title') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row-mb-3">
                            <label for="author" class="col-sm-2 col-form-label">Author</label>
                            <div class="col-sm-10">
                                <input 
                                    type="text" 
                                    class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : ''; ?>" 
                                    name="author" 
                                    id="id_author"
                                    value="<?= old("author") ? old('author') : $bookDetails['author']; ?>"
                                    required
                                >

                                <!-- feedback from corresponding form -->
                                <div id="authorFeedback" class="invalid-feedback">
                                    This field is empty. <?= $validation->getError('author') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row-mb-3">
                            <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                            <div class="col-sm-10">
                                <input 
                                    type="text" 
                                    class="form-control <?= ($validation->hasError('publisher')) ? 'is-invalid' : ''; ?>" 
                                    name="publisher" 
                                    id="id_publisher"
                                    value="<?= old("publisher") ? old("publisher") : $bookDetails['publisher']; ?>"
                                    required
                                >

                                <!-- feedback from corresponding form -->
                                <div id="publisherFeedback" class="invalid-feedback">
                                    This field is empty. <?= $validation->getError('publisher') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row-mb-3">
                            <label for="total_pages" class="col-sm-2 col-form-label">Total Pages</label>
                            <div class="col-sm-10">
                                <input 
                                    type="number" 
                                    class="form-control <?= ($validation->hasError('total_pages')) ? 'is-invalid' : ''; ?>" 
                                    name="total_pages" 
                                    id="id_total_pages"
                                    value="<?= old("total_pages") ? old("total_pages") : $bookDetails['total_pages']; ?>"
                                    required
                                >

                                <!-- feedback from corresponding form -->
                                <div id="total_pagesFeedback" class="invalid-feedback">
                                    This field is empty or not a number. <?= $validation->getError('total_pages') ?>
                                </div>
                            </div>
                        </div>
                        <div class="row-mb-3">
                            <label for="book_cover" class="col-sm-2 col-form-label">Book Cover</label>
                            <div class="col-sm-10">
                                <input 
                                    type="text" 
                                    class="form-control <?= ($validation->hasError('book_cover')) ? 'is-invalid' : ''; ?>" 
                                    name="book_cover" 
                                    id="id_book_cover"
                                    value="<?= old("book_cover") ? old('book_cover') : $bookDetails['book_cover']; ?>"
                                    required
                                >

                                <!-- feedback from corresponding form -->
                                <div id="book_coverFeedback" class="invalid-feedback">
                                    This field is empty. <?= $validation->getError('book_cover') ?>
                                </div>
                            </div>
                        </div>

                        <!-- submit with input id as attachment pointer -->
                        <input 
                            type="hidden" 
                            name="id_edit" 
                            value="<?= $bookDetails['id']; ?>"
                        >
                        <button id="button" type="submit" class="btn btn-primary">Update Book Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // store all desired class into one variable
        // check forms for every typing inside either one of them
        // if any form is not invalid, disable button and validate forms with error output for every forms available
        document.getElementById("button").disabled = true;
        (function(){
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function(form){
                form.addEventListener('input', function(event){
                    !form.checkValidity() ?
                        document.getElementById("button").disabled = true :
                        document.getElementById("button").disabled = false;
                    form.classList.add('was-validated');
                }, false);
            });
        })
        ();
    </script>

<?= $this->endsection() ?>