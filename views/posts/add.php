<div>

    <div>
        <h3>Post Article</h3>
    </div>

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

        <label>Title</label>
        <input type="text" name="title">

        <br><br>

        <label>Body</label>
        <textarea name="body"></textarea>

        <br><br>

        <label>Link</label>
        <input type="text" name="link">

        <br><br>

        <input type="button" value="Submit" name="submit">

        <br><br>

        <a href="<?php echo ROOT_PATH; ?>posts">Cancel Post</a>

    </form>

</div>
