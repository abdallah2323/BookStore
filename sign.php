<?php 
    include 'config/signproc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sign.css">
</head>
    <style>
        .error {
            color: #FF0000;
            font-weight:500;
        }
    </style>
<body>
    <div class="container">
        <form action="" method="post">
            <h3 class="text-center">Signup</h3>
            <?php if(!empty($msg)): ?>
                <div class="alert <?php echo $css_class; ?>">
                    <?php echo $msg; ?>
                </div>
                    <?php endif; ?>
            <div class="form-group">
                <label for="">Username:</label>
                <input type="text" name="user" class="form-control" placeholder="Enter Username">
                <span class="error"> <?php echo $userErr;?></span>
                <br>
            </div>
            <div class="form-group">
                <label for="">Full name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Full name">
                <span class="error"> <?php echo $nameErr;?></span>
                <br>
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                <span class="error"> <?php echo $passwordErr;?></span>
                <br>
            </div>
            <div class="form-group">
                <label for="">Phone:</label>
                <input type="text" name="phone" class="form-control" placeholder="Enter Your phone">
                <span class="error"> <?php echo $phoneErr;?></span>
                <br>
            </div>
            <div class="form-group">
                <input type="submit" value="Confirm" name="submit" style="font-weight: 500" class="btn btn-primary">
                <br>
            </div>
        </form>
        <br>
        <p class="text-center">Did you sign up ? <a href="login.php"">Login</a></p>
    </div>


</body>
</html>