<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>public/gcms/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/gcms/css/login.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="jumbotron">
    <div class="container">
        <h1>Hello, world!</h1>
        <p>...</p>
    </div>
</div>
<div class="container">
    <div class="col-md-4"></div>
    <div class="form_login col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $title; ?></h3>
            </div>
            <div class="panel-body">
                <?php if (isset($error)): ?>
                    <div class="alert alert-warning" role="alert"><?php echo $error; ?></div>
                <?php endif; ?>
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control" id="" placeholder="Tên đăng nhập..">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="" placeholder="Mật khẩu..">
                    </div>
                    <button type="submit" name="ok" class="btn btn-default pull-right">Đăng nhập</button>
                </form>
            </div>
        </div>

    </div>

    <div class="col-md-4"></div>

</div>
<script src="<?php echo base_url(); ?>public/gcms/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>public/gcms/js/bootstrap.min.js"></script>
</body>
</html>