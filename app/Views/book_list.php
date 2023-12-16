<!-- redirected from app/Controller/Book.php index() -->

<!-- borrowing from layouts/matrix/ -->
<?= $this->extend('layouts/matrix') ?>

<!-- define content section -->
<?= $this->section('content') ?>
    <hr>
    <h1>Welcome to Our Book List!</h1>
    <strong>Monthly Best Selling:</strong> <br>
    - Atomic Habits <br>
    - The Subtle Art of Not Giving A F*ck <br>
    - Meditations <br>
    - The Inner Citadel <br>
    <hr>
<?= $this->endsection() ?>