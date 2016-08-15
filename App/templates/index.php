<?php include_once 'includes/header.php' ?>

<div class="container">
    <row>
        <div class="col-md-10 col-md-offset-1">

            <?php if ($this->errors) : ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><?= $this->errors ?></p>
                </div>
            <?php endif; ?>
            <?php session_start() ?>
           
            <h1 class="page-header text-center">Гостевая книга</h1>
            <table id="table" class="table table-striped tablesorter">
                <thead>
                <tr>
                    <th class="header"><a href="index.php?action=Index&amp;col=name&amp;dir=<?= $_GET['dir'] === 'desc' ? 'asc' : 'desc'  ?>">Name <i class="fa fa-sort" aria-hidden="true"></i></a></th>
                    <th class="header"><a href="index.php?action=Index&amp;col=email&amp;dir=<?= $_GET['dir'] === 'desc' ? 'asc' : 'desc'  ?>">Email <i class="fa fa-sort" aria-hidden="true"></i></a></th>
                    <th class="header date"><a href="index.php?action=Index&amp;col=published_at&amp;dir=<?= $_GET['dir'] === 'desc' ? 'asc' : 'desc'  ?>">Added <i class="fa fa-sort" aria-hidden="true"></i></a></th>
                    <th>Message</th>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
             
                <?php foreach ($this->messages as $message) : ?>
                    <tr>
                        <td><?= $message->name ?></td>
                        <td><?= $message->email ?></td>
                        <td><?= $message->published_at ?></td>
                        <td><?= $message->message ?></td>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <td><a href="index.php?action=Single&amp;id=<?= $message->id ?>"
                                   class="btn btn-success">Edit</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
                
                </tbody>
            </table>

            <!-- Pagination-->
            <?php if (count($this->numbers) > 1) : ?>
                <div class="text-center">
                    <ul class="pagination text-center">
                        <?php for ($i = 1; $i <= count($this->numbers); $i++) : ?>
                            <?php if ($_GET['page'] == $i) : ?>
                                <li class="active"><a href="index.php?page=<?= $i ?> "><?= $i ?></a></li>
                            <?php else : ?>
                                <li><a href="index.php?page=<?= $i ?> "><?= $i ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <!-- Pagination-->

        </div>
    </row>

</div>
<div class="container link">
    <div class="row col-md-10 col-md-offset-1">
        <a href="index.php?action=NewMessage" class="btn btn-default btn-sm">Новое сообщение</a>
    </div>
</div>

<?php include_once 'includes/footer.php' ?>
