<?php include_once 'includes/header.php' ?>
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <?php if ($this->errors) : ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php foreach ($this->errors as $error) : ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="index.php?action=Update&amp;id=<?= $this->message->id ?>" method="post"
                  enctype="multipart/form-data">
                <fieldset>
                    <legend>Редактировать сообщение</legend>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="<?= $this->message->name ?>" class="form-control" name="name"
                               id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="<?= $this->message->email ?>" class="form-control" name="email"
                               id="email">
                    </div>

                    <div class="form-group">
                        <label for="homepage">Home Page</label>
                        <input type="text" value="<?= $this->message->homepage ?: '' ?>" class="form-control"
                               name="homepage"
                               id="homepage">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message"
                              rows="10"><?= $this->message->message ?></textarea>
                    </div>
                    <?php if ($this->message->file && preg_match('/[^\s]+(\.(?i)(jpg|png|gif))$/', $this->message->file)) : ?>
                        <div id="image">
                            <img src="<?= $this->message->file ?>" alt="image"><a
                                href="index.php?action=DeleteFile&amp;id=<?= $this->message->id ?>"
                                title="удалить"><span class="glyphicon glyphicon-remove delete"></span></a>
                        </div>
                        <?php elseif ($this->message->file && preg_match('/[^\s]+(\.(?i)(txt))$/', $this->message->file)) : ?>
                        <div class="text-file">
                            <p><strong>User's file:</strong> <?= $this->message->file ?></p><a
                                href="index.php?action=DeleteFile&amp;id=<?= $this->message->id ?>"
                                title="удалить"><span class="glyphicon glyphicon-remove delete"></span></a>
                        </div>
                    <?php endif; ?>
                    <div class="form-group clearfix">
                        <label for="file">File input</label>
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="form-group">
                        <label for="ip">IP</label>
                        <input type="text" value="<?= $this->message->ip ?>" class="form-control" name="ip" id="ip"
                               disabled>
                    </div>
                    <div class="form-group">
                        <label for="browser">Browser</label>
                        <input type="text" value="<?= $this->message->browser ?>" class="form-control" name="browser"
                               id="browser" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="index.php?action=Delete&amp;id=<?= $this->message->id ?>" class="btn btn-danger">Delete</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php' ?>

