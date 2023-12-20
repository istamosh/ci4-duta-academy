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
<?= $this->endsection() ?>