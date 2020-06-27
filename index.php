<?php
    // Check For submit
    if(filter_has_var(INPUT_POST, 'submit')){
        echo 'Submitted';
    }

?>
<!DOCTYPE html>
<html>
<head>


    <title>Contact Us</title>
     <!-- Using customized bootstrap bootswatch -->
    <link rel="stylesheet" href="https://bootswatch.com/3/cosmo/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-default">
<div class="container">
    <div class="navbar-header">
        <a href="index.php" class="navbar-brand">My Website</a>
    </div>
</div>
</nav>
<div class="container">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="">
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="">
        </div>
        <div class="form-group">
        <label>Message</label>
        <textarea name="message" class="form-control"></textarea>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div> 
</body>
</html>