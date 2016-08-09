<?php include_once 'includes/header.php' ?>

<div class="container">
    <row>
        <div class="col-md-6 col-md-offset-3">
            <?= $_SESSION['user'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?= $_SESSION['error'] ?>
                </div>
            <?php endif; ?>
            <form class="form-horizontal" action='#' method="POST">
                <fieldset>
                    <div id="legend">
                        <legend class="">Регистрация</legend>
                    </div>
                    <div class="form-group">
                        <!-- Username -->
                        <label for="name">Имя пользователя</label>
                        <input type="text" id="name" name="name" placeholder="" class="form-control" required>
                        <p class="help-block">Имя пользователя должно содержать буквы и цифры</p>
                    </div>

                    <!--                    <div class="form-group">
                                            <!-- E-mail -->
                    <!--<label for="email">Адрес E-mail</label>
                        <input type="text" id="email" name="email" placeholder="" class="form-control">
                        <p class="help-block">Введите правильный email адрес</p>
                </div>-->
                    <div class="form-group">
                        <!-- Password-->
                        <label for="password">Пароль</label>
                        <input type="password" id="password" name="password" placeholder="" class="form-control"
                               required>
                        <p class="help-block">Пароль должен быть не менее 4 символов</p>
                    </div>
                    <div class="form-group">
                        <!-- Password-->
                        <label for="password_confirm">Пароль (Подтверждение)</label>
                        <input type="password" id="password_confirm" name="password_confirm" placeholder=""
                               class="form-control" required>
                        <p class="help-block">Пожалуйста подтвердите пароль</p>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="controls">
                            <button class="btn btn-success btn-block">Регистрация</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </row>
</div>

<?php include_once 'includes/footer.php.php' ?>

