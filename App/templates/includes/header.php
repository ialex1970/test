<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $this->title ?></title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/parsley.css">
    <link rel="stylesheet" href="../js/addons/pager/jquery.tablesorter.pager.css">
    <link href="../css/style.css" rel="stylesheet">

    <!-- ******** Раскомментировать для использования TinyMCE ***********-->

   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({
            selector:'textarea',
            statusbar: false,
            plugins: 'link codesample preview code',
            menubar: false,
            toolbar: 'bold italic strikethrough | link | codesample | code | preview',
            schema: 'html5-strict',
            forced_root_block: "",
            extended_valid_elements : 'a[href|title],code,strong,strike',
            invalid_elements : 'pre,img,span,ul,li,p'
        });
    </script>

    <!--*****************************************************************-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<nav class="navbar navbar-default navbar-inverse">
    
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
               <!--   <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>-->
            </ul>
            <form action="index.php?action=Search" method="post" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" name="value" class="form-control" placeholder="Поиск по сообщениям">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php session_start() ?>
                <li><a href="index.php?action=Signup"><?= isset($_SESSION['user']) ? '' : 'Регистрация' ?></a></li>
                <li><a href="index.php?action=Signin"><?= isset($_SESSION['user']) ? '' : 'Вход' ?></a></li>
                
                <?php if (isset($_SESSION['user'])): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?= $_SESSION['user']->name ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?action=Profile">Профиль</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php?action=Logout"><?= isset($_SESSION['user']) ? 'Выход' : '' ?></a></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

