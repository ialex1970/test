<?php
session_start();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>
<?php include_once 'includes/header.php' ?>
<div class="container">
    <div class="row">
        <?php if ($this->errors): ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php foreach ($this->errors as $error): ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="col-md-8 col-md-offset-2">
            <form id="new" action="#" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name"
                           value="<?= $_POST['name'] ? $_POST['name'] : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                           value="<?= $_POST['email'] ? $_POST['email'] : '' ?>" required>
                </div>

                <div class="form-group">
                    <label for="homepage">Home Page</label>
                    <input type="text" class="form-control" name="homepage" id="homepage"
                           value="<?= $_POST['homepage'] ? $_POST['homepage'] : '' ?>">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message"
                              rows="10"><?= $_POST['message'] ? $_POST['message'] : '' ?></textarea>
                </div>
                <div class="form-group">
                    <label for="file">File input</label>
                    <input type="file" name="file" id="file">
                </div>
                <h4>Проверчный код</h4>
                <?php session_start() ?>
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p><?= $_SESSION['error'] ?></p>
                        <?php unset($_SESSION['error']) ?>
                    </div>
                <?php endif; ?>
                <div class="captcha">
                    <img src="<?= $_SESSION['captcha']['image_src'] ?>" alt="CAPTCHA code">
                    <input type="text" name="captcha"/>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php include_once 'includes/footer.php' ?>
