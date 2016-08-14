<?php include_once 'includes/header.php' ?>

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

                <?php foreach ($this->messages as $message) : ?>
                    <tr>
                        <td><a href="index.php?action=Single&amp;id=<?= $message->id ?>"><?= $message->name ?></a></td>
                        <td><?= $message->email ?></td>
                        <td><?= $message->published_at ?></td>
                        <td><?= $message->message ?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </row>

</div>
<div class="container link">
    <div class="row col-md-10 col-md-offset-1">
        <a href="index.php?action=NewMessage" class="btn btn-primary">Новое сообщение</a>
    </div>
</div>

<?php include_once 'includes/footer.php' ?>
