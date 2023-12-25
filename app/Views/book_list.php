<!-- redirected from app/Controller/Book.php index() -->

<!-- borrowing from layouts/matrix/ -->
<?= $this->extend('layouts/matrix') ?>

<!-- define content section -->
<?= $this->section('content') ?>

<?php
if (session()->getFlashdata('success')):
?>
    <div class="alert alert-success" role="alert">
        <!-- invoke this created book alert success message from Book.php -->
        <?= session()->getFlashdata('success')?>
    </div>
<?php 
elseif (session()->getFlashdata('update')):
?>
    <div class="alert alert-info" role="alert">
        <!-- invoke this updated book alert message from Book.php -->
        <?= session()->getFlashdata('update')?>
    </div>
<?php
endif;
?>

<!-- serve and tabulate data from Book Controller -->
<div class="row">
    <div class="columns">

        <!-- Card is a bootstrap 5 table class -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Book List</h4>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="column"> <strong>No.</strong> </th>
                            <th scope="column"> <strong>Preview</strong></th>
                            <th scope="column"> <strong>Title</strong> </th>
                            <th scope="column"> <strong>Author</strong> </th>
                            <th scope="column"> <strong>Publisher</strong> </th>
                            <th scope="column"> <strong>Action</strong> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($bookData as $data):
                        ?>

                        <tr>
                            <th scope="row"> <strong><?= $no; ?>.</strong> </th>
                            <td>
                                <img 
                                    src="/blob_images/<?= $data['book_cover']; ?>" 
                                    alt="book_cover"
                                    class="img-fluid rounded-start"
                                    width="100px"
                                >
                            </td>
                            <td> <?= $data['title']; ?> </td>                    
                            <td> <?= $data['author']; ?> </td>
                            <td> <?= $data['publisher']; ?> </td>

                            <!-- set page detail address based on their respective ID's on database -->
                            <td>
                                <!-- update book button -->
                                <form action="/book/edit" method="post" class="inline-data">
                                    <?= csrf_field() ?>

                                    <input 
                                        type="hidden" 
                                        value="<?= $data['id'] ?>" 
                                        name="id_for_editing"
                                    >

                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>

                                <!-- delete button -->
                                <form action="<?= base_url('delete-book')?>" method="post" class="inline-data">
                                    <?= csrf_field() ?>
                                    <input 
                                        type="hidden" 
                                        name="id_for_deletion"
                                        value="<?= $data['id'] ?>"
                                    />
                                    <!-- prepare corresponding image for deletion -->
                                    <input 
                                        type="hidden" 
                                        name="cover_for_deletion"
                                        value="<?= $data['book_cover'] ?>"
                                    />
                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <?php
                            $no++;
                            endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endsection() ?>