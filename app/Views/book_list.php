<!-- redirected from app/Controller/Book.php index() -->

<!-- borrowing from layouts/matrix/ -->
<?= $this->extend('layouts/matrix') ?>

<!-- define content section -->
<?= $this->section('content') ?>
<hr>
<strong>Book List:</strong> <br>
- Atomic Habits <br>
- The Subtle Art of Not Giving A F*ck <br>
- Meditations <br>
<hr>
<?= $this->endsection() ?>