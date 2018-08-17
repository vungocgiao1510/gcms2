<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (isset($title)) ? $title : 'GCMS'; ?></title>
    <base href="<?php echo base_url(); ?>">

    <!-- Bootstrap -->
    <link href="public/gcms/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/gcms/css/style.css" rel="stylesheet">
    <link href="public/gcms/css/all.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="public/ckeditor/ckeditor.js"></script>
</head>

<body>
<?php
require_once ("menu.php");
?>