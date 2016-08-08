<?php include_once 'includes/header.php'?>

<div class="container">
    <row>
        <div class="col-md-8 col-md-offset-2">
            <h1>Регистрация</h1>
            <form class="form-horizontal" action='#' method="POST">
                <fieldset>
                    <div id="legend">
                        <legend class="">Register</legend>
                    </div>
                    <div class="control-group">
                        <!-- Username -->
                        <label class="control-label"  for="name">Username</label>
                        <div class="controls">
                            <input type="text" id="name" name="name" placeholder="" class="input-xlarge">
                            <p class="help-block">Username can contain any letters or numbers, without spaces</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- E-mail -->
                        <label class="control-label" for="email">E-mail</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                            <p class="help-block">Please provide your E-mail</p>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Homepage -->
                        <label class="control-label" for="homepage">Homepage</label>
                        <div class="controls">
                            <input type="text" id="homepage" name="homepage" placeholder="" class="input-xlarge">
                            <p class="help-block">Please provide your URL</p>
                        </div>
                    </div>
                    <div class="control-group">
                        <!-- Password-->
                        <label class="control-label" for="password">Password</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                            <p class="help-block">Password should be at least 4 characters</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Password -->
                        <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                        <div class="controls">
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
                            <p class="help-block">Please confirm password</p>
                        </div>
                    </div>

                    <div class="control-group">
                        <!-- Button -->
                        <div class="controls">
                            <input type="submit">
                            <button class="btn btn-success">Register</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </row>
</div>

<?php include_once 'includes/footer.php.php'?>

