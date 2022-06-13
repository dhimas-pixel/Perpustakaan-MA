<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title; ?> </title>
    <!-- Favicon-->
    <link rel="icon" type="image/gif" href="<?= base_url('assets/image'); ?>/favicon.ico" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/navbar-style.css">
    <script defer src="<?= base_url('assets/'); ?>vendor/fontawesome/svg-with-js/js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/jquery.dataTables.min.css" type="text/css">
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/jquery.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/jquery.dataTables.min.js"></script>

    <!-- autocomplete -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/jquery-ui.css">
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/jquery-ui.js">
    </script>
</head>

<body>
    <input type="checkbox" id="check">
    <div class="topbar">
        <div class="left-area">
            <a href="<?= base_url('user'); ?>">
                <img src="<?= base_url('assets/'); ?>image/LogoMA.png" class="logo-ma">
                <span>RIDUS</span>
            </a>
        </div>

        <label for="check">
            <i class="fas fa-bars menu-burger"></i>
        </label>

        <div class="right-area">
            <a href="<?= base_url('auth/logout'); ?>" class="btn-logout">Logout</a>
        </div>
    </div>