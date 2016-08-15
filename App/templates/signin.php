<?php include_once 'includes/header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php if ($this->error) : ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><?= $this->error ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form id="form" class="form-horizontal" action='#' method="POST" data-parsley-validate=''>
                <fieldset>
                    <div id="legend">
                        <legend class="">Вход</legend>
                    </div>
                    <div class="form-group">
                        <!-- Username -->
                        <label for="name">Имя пользователя</label>
                        <input type="text" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" id="name"
                               name="name" placeholder="" class="form-control">
                        <p class="help-block">Имя пользователя должно содержать буквы и цифры</p>
                    </div>
                    <div class="form-group">
                        <!-- Password-->
                        <label for="password">Пароль</label>
                        <input type="password" id="password" name="password" placeholder="" class="form-control"
                        >
                        <p class="help-block">Пароль должен быть не менее 4 символов</p>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success btn-block">Войти</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php' ?>
