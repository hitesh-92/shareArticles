<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL; ?>/assets/css/bootstrap.min.css">
    <title>Posts Board</title>
</head>
<body>

    <nav style="display: flex; padding: 1em;">
        <p>Posts Board</p>
        <a href="<?php echo ROOT_URL; ?>">Home</a>
        <a href="<?php echo ROOT_URL; ?>/posts">Posts</a>
        <?php if ( isset($_SESSION['is_logged_in']) ) : ?>
            <p>Post an something to remember</p>
            <p><?php echo $_SESSION['user_data']['email']; ?></p>
            <a href="<?php echo ROOT_URL.'/users/logout'; ?>">Log Out</a>
        <?php else : ?>
            <a href="<?php echo ROOT_URL; ?>/users/login">Log In</a>
            <a href="<?php echo ROOT_URL; ?>/users/register">Register</a>
        <?php endif; ?>
    </nav>

    <br>
    
    <div class="container">
        <div class="row"><?php require($view); ?></div>
    </div>
    
</body>
</html>