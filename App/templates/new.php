<?php include_once 'includes/header.php'?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action='#' method="POST">
                <div class="form-group">
                    <label for="username">Имя пользователя</label>
                    <input type="text" class="form-control" id="username" placeholder="Имя" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="homepage">Домашняя страница</label>
                    <input type="text" class="form-control" id="homepage" placeholder="homepage">
                </div>
                <!--<div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>-->
                <div class="form-group">
                    <label for="message">Сообщение</label>
                    <textarea class="form-control" id="message" rows="10" placeholder="Сообщение"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
                <input type="submit" class="btn btn-default">
            </form>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php'?>
