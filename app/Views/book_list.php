<!-- redirected from app/Controller/Book.php index() -->

<!-- borrowing from layouts/matrix/ -->
<?= $this->extend('layouts/matrix') ?>

<!-- define content section -->
<?= $this->section('content') ?>

<?php
if (session()->getFlashdata('message')):
?>
    <div class="alert alert-primary" role="alert">
        <!-- invoke this particular code from Book.php -->
        <?= session()->getFlashdata('message')?>
    </div>
<?php
endif;
?>

<h1>Book List:</h1>

<?= $this->endsection() ?>