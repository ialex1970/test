<?php include_once 'includes/header.php'?>
<div class="container">
    <row>
        <div class="col-md-8 col-md-offset-2">
            <h1>Гостевая книга</h1>
            <?php foreach ($this->messages as $message): ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $message->message ?></div>
                    <?php if(!isset($message->user->name)): ?>
                        <div class="panel-body">Автор: <?= $message->name ?></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

        </div>
    </row>

</div>
<div class="container">
    <div class="row col-md-8 col-md-offset-2">
        <a href="index.php?action=NewMessage" class="btn btn-primary">Новое сообщение</a>
    </div>
</div>
<?php include_once 'includes/footer.php'?>

