<?php include_once 'includes/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <?php if ($this->errors): ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php foreach ($this->errors as $error): ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="index.php?action=Update&amp;id=<?= $this->message->id ?>" method="post">
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
                        <input type="text" value="<?= $this->message->homepage ?>" class="form-control" name="homepage"
                               id="homepage">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message"
                              rows="10"><?= $this->message->message ?></textarea>
                    </div>
                    <div class="form-group">
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

