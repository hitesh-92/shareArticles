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

    <nav>
        <p>Posts Board</p>
        <a href="<?php echo ROOT_URL; ?>">Home</a>
        <a href="<?php echo ROOT_URL; ?>/posts">Posts</a>
        <a href="<?php echo ROOT_URL; ?>/users/login">Log In</a>
        <a href="<?php echo ROOT_URL; ?>/users/register">Register</a>
    </nav>

    <br>
    
    <div class="container">
        <div class="row"><?php require($view); ?></div>
    </div>
    
</body>
</html>