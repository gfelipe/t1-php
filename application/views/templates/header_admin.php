
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="/assets/css/admin/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/assets/css/admin/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/css/admin/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/assets/css/admin/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/assets/css/admin/font-awesome.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .alert-fix {
            padding-left: 260px;
        }
    </style>
</head>

<body>

<div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin">Infinity - Admin</a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="/"><i class="fa fa-arrow-circle-right"></i> Ver Loja</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i> Produtos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="/admin/products">Todos produtos</a>
                            </li>
                            <li>
                                <a href="/admin/products/create">Novo produto</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="/admin/users"><i class="fa fa-user fa-fw"></i> Usuários</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
    <div id="page-wrapper">