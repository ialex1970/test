<?php include_once 'includes/header.php'?>
<div class="container">
    <row>
        <div class="col-md-10 col-md-offset-1">
            <h1>Гостевая книга</h1>
            <table id="myTable" class="table table-striped tablesorter">
                <thead>
                <tr>
                    <th class="header">Name</th>
                    <th class="header">Email</th>
                    <th class="header">Added</th>
                    <th class="header">Message</th>
                </tr>
                </thead>
                <tbody>
                <!--                    <tr>
                                        <td><input type="text"><i class="fa fa-search" aria-hidden="true"></i></td>
                                        <td><input type="text"><i class="fa fa-search" aria-hidden="true"></i></td>
                                        <td><input type="text"><i class="fa fa-search" aria-hidden="true"></i></td>
                                        <td><input type="text"><i class="fa fa-search" aria-hidden="true"></i></td>
                                    </tr>-->
                <?php foreach ($this->messages as $message): ?>
                    <tr>
                        <td><a href="index.php?action=Single&id=<?= $message->id ?>"><?= $message->name ?></a></td>
                        <td><?= $message->email ?></td>
                        <td><?=  $message->published_at ?></td>
                        <td><?= $message->message ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
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
