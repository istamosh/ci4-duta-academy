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
    ?>

    <div class="row">
        <div class="col">
            <!-- /book/save will be routed to Book.php->save() -->
            <form action="/book/save" method="post">
                <!-- cross site request forgery - hidden input field -->
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Book Title</label>
                    <div class="col-sm-10">
                        <!-- if data validation has error, points to the error sector form -->
                        <!-- using data validator component as $validation from Book.php -->
                        <!-- grab value from last input form -->
                        <input 
                            type="text" 
                            class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" 
                            name="title" 
                            id="id_title" 
                            value="<?= old("title") ?>"
                            autofocus
                            required
                        >

                        <!-- feedback from corresponding form -->
                        <div id="titleFeedback" class="invalid-feedback">
                            <?= $validation->getError('title') ?>
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
                            value="<?= old("author") ?>"
                            required
                        >

                        <!-- feedback from corresponding form -->
                        <div id="authorFeedback" class="invalid-feedback">
                            <?= $validation->getError('author') ?>
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
                            value="<?= old("publisher") ?>"
                            required
                        >

                        <!-- feedback from corresponding form -->
                        <div id="publisherFeedback" class="invalid-feedback">
                            <?= $validation->getError('publisher') ?>
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
                            value="<?= old("total_pages") ?>"
                            required
                        >

                        <!-- feedback from corresponding form -->
                        <div id="total_pagesFeedback" class="invalid-feedback">
                            <?= $validation->getError('total_pages') ?>
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
                            value="<?= old("book_cover") ?>"
                            required
                        >

                        <!-- feedback from corresponding form -->
                        <div id="book_coverFeedback" class="invalid-feedback">
                            <?= $validation->getError('book_cover') ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Data</button>
            </form>

        </div>
    </div>

    <!-- testing section from Bootstrap 5 page -->
    <!-- <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">First name</label>
            <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Username</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">City</label>
            <input type="text" class="form-control" id="validationCustom03" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">State</label>
            <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom05" class="form-label">Zip</label>
            <input type="text" class="form-control" id="validationCustom05" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form> -->
    <!-- <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script> -->

<?= $this->endsection() ?>