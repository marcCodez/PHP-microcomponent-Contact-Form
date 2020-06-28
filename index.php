<?php
    // Message Variables
    $msg = '';
    $msgClass = '';
    // Check For submit
    if(filter_has_var(INPUT_POST, 'submit')){
        // Get form Data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Check Required Fields
        if(!empty($email) && !empty($name) && !empty($message)){
            // Passed
            // Check email
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                // Failed
                $msg = 'Please use a valid email';
                $msgClass = 'alert-danger';
            } else {
                // Passed
                // Recipient Email
                $toEmail = 'marc_pulumbarit@hotmail.com';
                $tosubject = 'Contact Request From '.$name;
                $body = '<h2>Contact Request</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Message</h4><p>'.$message.'</p>
                ';

                // Multipurpose Internet Mail Extension is an internet standard, encoded file format used by email programs. 
                // \r = Carriage return means to return to the beginning of the current line without advancing downward.
                // \n = new line
                // .= means append not overwrite the variable
                // Email Headers
                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";

                // Additional Headers
                $headers .= "From: " .$name. "<".$email.">". "\r\n";

                // Use mail function in if statement to say it sends or it doesnt
                if(mail($toEmail, $subject, $body, $headers)){
                    // Email Sent
                    $msg = 'Your email has been sent';
                    $msgClass = 'alert-success';
                } else {
                    $msg = 'Your email was not sent';
                    $msgClass = 'alert-danger';

                }

            }
        } else {
            // Failed
            $msg = 'Please fill in all fields';
            $msgClass = 'alert-danger';
        }
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
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Name</label>
    <!-- set the value so the value will remain on the form if theres an error -->
    <!-- if post name is set output the value if not output nothing, using ternary -->
            <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name: ''; ?>">
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email: ''; ?>">
        </div>
        <div class="form-group">
        <label>Message</label>
        <textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message: ''; ?></textarea>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div> 
</body>
</html>