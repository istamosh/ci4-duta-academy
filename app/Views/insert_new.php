<!-- redirected from app/Controller/Book.php index() -->

<!-- borrowing from layouts/matrix/ -->
<?= $this->extend('layouts/matrix') ?>

<!-- define content section -->
<?= $this->section('content') ?>
    <div class="row">
        <div class="col">

            <form action="/book/save" method="post">
                <!-- cross site request forgery - hidden input field -->
                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="title" autofocus>
                    </div>
                </div>
                <div class="row-mb-3">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="author" id="author">
                    </div>
                </div>
                <div class="row-mb-3">
                    <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="publisher" id="publisher">
                    </div>
                </div>
                <div class="row-mb-3">
                    <label for="total_pages" class="col-sm-2 col-form-label">Total Pages</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="total_pages" id="total_pages">
                    </div>
                </div>
                <div class="row-mb-3">
                    <label for="book_cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="book_cover" id="book_cover">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Save Data</button>
            </form>

        </div>
    </div>
<?= $this->endsection() ?>