<?php include_once 'includes/header.php'?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <form action="#" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>

                <div class="form-group">
                    <label for="homepage">Home Page</label>
                    <input type="text" class="form-control" name="homepage" id="homepage">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="file">File input</label>
                    <input type="file" name="file" id="file">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include_once 'includes/footer.php'?>
