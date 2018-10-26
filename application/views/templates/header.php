
<!DOCTYPE html>
<html>
<head>
    <!-- Site made with Mobirise Website Builder v4.3.5, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.3.5, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/assets/img/logo8.png" type="image/x-icon">
    <meta name="description" content="New Bootstrap HTML5 eCommerce Shop Template - Download Now">
    <title>Infinity</title>
    <link rel="stylesheet" href="/assets/web/assets/mobirise-icons/mobirise-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="/assets/socicon/css/styles.css">
    <link rel="stylesheet" href="/assets/dropdown/css/style.css">
    <link rel="stylesheet" href="/assets/theme/css/style.css">
    <link rel="stylesheet" href="/assets/mobirise-gallery/style.css">
    <link rel="stylesheet" href="/assets/mobirise/css/mbr-additional.css" type="text/css">
    <style>
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
        }

        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
        }

        .alert-fix {
            margin-top: 76px; margin-bottom: 0px;
        }
    </style>


</head>
<body>

<section class="menu cid-qyXbdnYc0C" once="menu" id="menu3-40" data-rv-view="2429" style="padding: 0px;">

    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="navbar-brand">
            <span class="navbar-logo">
                <a href="/">
                    <img src="/assets/img/logo88.png" alt="Mobirise" title="" media-simple="true" style="height: 3.3rem;">
                </a>
            </span>
            <span class="navbar-caption-wrap"><a class="navbar-caption text-white display-5" href="/">
                    Infinity
                </a></span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <?php if (isset($this->session->userdata()['logged_in']) && isset($this->session->userdata()['profile']) && $this->session->userdata()['logged_in'] && $this->session->userdata()['profile'] == "ADMIN"): ?>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="/admin">ADMIN</a>
                </li>
                <?php endif; ?>
                <?php if (isset($this->session->userdata()['logged_in']) && $this->session->userdata()['logged_in']): ?>
                <li class="nav-item dropdown open">
                    <a class="nav-link link text-white dropdown-toggle display-4" href="#"
                       data-toggle="dropdown-submenu" aria-expanded="true"
                       style="text-align: center;justify-content: center;">
                        <?php echo $this->session->userdata()['user']?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="text-white dropdown-item display-4" href="/user/edit">Alterar dados</a>
                        <a class="text-white dropdown-item display-4" href="/user/orders">Meus pedidos</a>
                        <a class="text-white dropdown-item display-4" href="/user/favorites">Favoritos</a>
                    </div>
                </li>
                <?php endif; ?>
            </ul>

            <div class="navbar-buttons mbr-section-btn">
                <?php if (isset($this->session->userdata()['logged_in']) && $this->session->userdata()['logged_in']): ?>
                    <a class="btn btn-sm btn-white-outline display-4" href="/logout">Logout</a>
                <?php else: ?>
                    <a class="btn btn-sm btn-white-outline display-4" href="/login">Login</a>
                <?php endif; ?>

            </div>
        </div>
    </nav>
</section>
<?php if($this->session->flashdata('message')): ?>
    <div class="alert alert-success alert-fix" role="alert">
        <?php echo $this->session->flashdata('message') ?>
    </div>
<?php elseif($this->session->flashdata('warning_message')): ?>
    <div class="alert alert-warning alert-fix" role="alert">
        <?php echo $this->session->flashdata('warning_message') ?>
    </div>
<?php elseif($this->session->flashdata('error_message')): ?>
    <div class="alert alert-danger alert-fix" role="alert">
        <?php echo $this->session->flashdata('error_message') ?>
    </div>
<?php endif;?>