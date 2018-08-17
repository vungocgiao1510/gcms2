<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <title><?php echo $title; ?></title>
    <base href="<?php echo base_url(); ?>">
    <link rel="stylesheet" href="public/default/css/bootstrap.css">
    <link rel="stylesheet" href="public/default/css/style.css">
    <link href="public/gcms/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar-menu">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php
                    if ($navbar_menu) {
                        foreach ($navbar_menu as $key => $value) {
                            echo '<li class="nav-item">
                        <a class="nav-link" href="' . $value["cate_slug"] . '">' . $value['cate_name'] . '</a>
                    </li>';
                        }
                    }
                    ?>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron jumbotron-header">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo">
                    <a href="/">
                        <img src="<?php echo $des->global_logo; ?>" alt="">
                    </a>
                </div>
                <div class="col-md-6 search_header">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="" placeholder="Tìm kiếm sản phẩm..">
                            <button class="btn btn-default button_search" type="button"><i class="fas fa-search"></i>
                                Tìm kiếm
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <span class="hotline_header">
                        <a href="#">
                            <i class="fas fa-mobile-alt"></i>
                            0978.43.28.82
                        </a>
                    </span>
                </div>
            </div>
            <div class="row pd-15">
                <div class="col-md-2 dmsp <?php echo ($this->uri->segment(1) != "") ? "left_menu_hover" : ""; ?>">
                    <a href="javscript:void(0)" class=""><h2>
                            <i class="fas fa-align-justify"></i>
                            Danh mục sản phẩm</h2></a>
                    <?php
                    if ($this->uri->segment(1) != "") {
                        $this->load->view("template/includes/menu");
                    }
                    ?>
                </div>
                <?php
                if ($icon_header) {
                    foreach ($icon_header as $value) {
                        ?>
                        <div class="col-md-2 icon_header">
                            <img src="<?php echo $value['img_avatar']; ?>" alt="<?php echo $value['img_title']; ?>"
                                 width="30">
                            <span>
                                <?php echo $value['img_title']; ?>
                            </span>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>
</header>
<div class="clearfix"></div>