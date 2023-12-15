<!-- Placeholder file as references -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Render Section Placeholder Page</title>
</head>
<body>
    <!-- using renderSection() Layout View -->
    <?= $this->renderSection('content') ?>
    
    <!-- everytime View wants to be included in Layout, use extend() before anything else -->
    <?= $this->extend('renderSection') ?>
    <?= $this->section('content') ?>
        <!-- content goes here -->
        <h1>Bonjour.</h1>
    <?= $this->endSection() ?>

    <!-- CI4 allows a View component inside other View component using $this->include() -->
    <?= $this->extend('default') ?>
    <?= $this->section('content') ?>
        <!-- using sidebar.php beside this file -->
        <?= $this->include('sidebar') ?>
        <h1>Bonjour, sidebar is now here.</h1>
    <?= $this->endSection() ?>
</body>
</html>