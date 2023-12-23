<!-- redirected from app/Controller/Book.php index() -->

<!-- borrowing from layouts/matrix/ -->
<?= $this->extend('layouts/matrix') ?>

<!-- define content section -->
<?= $this->section('content') ?>

<?php
if (session()->getFlashdata('message')):
?>
    <div class="alert alert-success" role="alert">
        <!-- invoke this particular code from Book.php -->
        <?= session()->getFlashdata('message')?>
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
                            <th scope="column"> <strong>Title</strong> </th>
                            <th scope="column"> <strong>Author</strong> </th>
                            <th scope="column"> <strong>Publisher</strong> </th>
                            <th scope="column"> <strong>Option</strong> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($bookData as $data):
                        ?>

                        <tr>
                            <th scope="row"> <strong><?= $no; ?>.</strong> </th>
                            <td> <?= $data['title']; ?> </td>                    
                            <td> <?= $data['author']; ?> </td>
                            <td> <?= $data['publisher']; ?> </td>
                            <td>
                                <a href="/book/details/<?= $data['id'] ?>">
                                    Detail
                                </a>
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