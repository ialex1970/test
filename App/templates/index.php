<?php include_once 'includes/header.php' ?>
<div class="container">
    <row>
        <div class="col-md-10 col-md-offset-1">

        <?php if ($this->errors): ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><?= $this->errors ?></p>
        </div>
        <?php endif; ?>

        <h1 class="page-header text-center">Гостевая книга</h1>
        <table id="table" class="table table-striped tablesorter">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th  width="150px">Added</th>
                <th class="sorter-false">Message</th>
                <?php if (isset($_SESSION['user'])): ?>
                    <th></th>Action</th>
                <?php endif; ?>
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
                    <td><?= $message->name ?></td>
                    <td><?= $message->email ?></td>
                    <td><?= $message->published_at ?></td>
                    <td><?= $message->message ?></td>
                    <?php if (isset($_SESSION['user'])): ?>
                        <td><a href="index.php?action=Single&amp;id=<?= $message->id ?>"
                               class="btn btn-success">Edit</a></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-center">
            <ul class="pagination pagination-lg text-center">
                <?php if (count($this->numbers) > 25): ?>
                    <?php for ($i = 1; $i <= count($this->numbers); $i++): ?>
                        <?php if ($_GET['page'] == $i): ?>
                            <li class="active"><a href="index.php?page=<?= $i ?> "><?= $i ?></a></li>
                        <?php else: ?>
                            <li><a href="index.php?page=<?= $i ?> "><?= $i ?></a></li>
                        <?php endif; ?>
                    <?php endfor; ?>
                <?php endif; ?>
            </ul>
        </div>
</div>
</row>

</div>
<div class="container link">
    <div class="row col-md-10 col-md-offset-1">
        <a href="index.php?action=NewMessage" class="btn btn-default btn-sm">Новое сообщение</a>
    </div>
</div>
<?php include_once 'includes/footer.php' ?>
