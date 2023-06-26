<!DOCTYPE html>
<html>
<head>
    <title>CATAFA - Installation</title>
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/fonts/roboto.css">
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/catafa/assets/fontawesome/js/all.min.js"></script>
</head>
<style type="text/css">
    body {
        background-color: #e4e6ed;
        font-family: 'Roboto', sans-serif !important;

    }
</style>
<body>
    <div class="row mt-4">
        <p class="text-center display-6">Installation:</p>
    </div>
    <div id="login-form" class="container col bg-white pt-4 px-5 position-absolute top-50 start-50 translate-middle rounded-3 shadow-lg" style="width: 420px; height: 400px;">
        <div class="row text-secondary">
            <h3 class="text-center my-0">CATAFA</h3>
            <h4 class="text-center">Management Information System</h4>
        </div>
        <div class="row bg-success text-white rounded-3 p-1 mt-4 shadow-sm">
            <small>Make sure the Apache and MySQL in XAMPP are running before clicking "Install". </small>
        </div>
        <div class="row mt-5">
            <a href="create-db.php" class="btn btn-primary">Install</a>
        </div>
        <hr class="mt-4">
        <div class="row-4">
            <p class="text-center">&copy; 2023 CATAFA MIS. All Rights Reserved.</p>
        </div>

    </div>
</body>
</html>