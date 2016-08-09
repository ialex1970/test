<?php include_once 'includes/header.php'?>
<div class="container">
    <row>
        <div class="col-md-10 col-md-offset-1">
<?php echo '<pre>';
    print_r($_SESSION);
echo '</pre>'; ?>
            <h1 class="well">Гостевая книга</h1>
            <?php foreach ($this->messages as $message): ?>
                    <div class="panel panel-warning">
                        <div class="panel-heading"><strong><?= $message->name ?></strong> write (<span class="date"><?=  $message->published_at ?></span>):</div>
                        <div class="panel-body">
                            <?= $message->message ?>
                        </div>
                    </div>
            <?php endforeach; ?>
        </div>
    </row>
    <div id="pager" class="pager">
        <form>
            <img src="js/addons/pager/icons/first.png" class="first"/>
            <img src="js/addons/pager/icons/prev.png" class="prev"/>
            <input type="text" class="pagedisplay"/>
            <img src="js/addons/pager/icons/next.png" class="next"/>
            <img src="js/addons/pager/icons/last.png" class="last"/>
            <select class="pagesize">
                <option selected="selected"  value="10">10</option>
                <option value="20">20</option>
                <option value="30">30</option>
                <option  value="40">40</option>
            </select>
        </form>
    </div>

</div>
<div class="container link">
    <div class="row col-md-10 col-md-offset-1">
        <a href="index.php?action=NewMessage" class="btn btn-primary">Новое сообщение</a>
    </div>
</div>
<?php include_once 'includes/footer.php'?>

