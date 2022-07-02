<?php 
    include 'process.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/sign.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.js"></script>
</head>
<style>
    .container 
    {
        padding: 30px;
        margin-top: 100px;
    }
</style>
<body>
    <div class="container" style="width: 600px">
        <form action="" method="post">
            <h3 class="text-center">Admin Login </h3>
            <?php if(!empty($msg)): ?>
                <div class="alert <?php echo $css_class; ?>">
                    <?php echo $msg; ?>
                </div>
                    <?php endif; ?>
                    <br>
            <div class="form-group">
                <label for="">Username:</label>
                <input type="text" name="user" value="<?php if(isset($_COOKIE["admin"])) {echo $_COOKIE["admin"];} ?>" class="form-control" placeholder="Enter Username">
                <br>
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <input type="password" value="<?php if(isset($_COOKIE["password"])) {echo $_COOKIE["password"];}?>" name="password" class="form-control" placeholder="Enter Password">
                <br>
            </div>
            <div class="form-group">
                <input type="checkbox" id="chk" name="remember" <?php if(isset($_COOKIE["user"])) { ?> checked <?php }?>/>
                <label for="chk" style="transform: translatey(-17px);">Remember me</label><br/><br/>
            </div>
            <div class="form-group">
                <input type="submit" value="Confirm" name="submit" style="font-weight: 500" class="btn btn-primary">
                <br>
            </div>
        </form>
        <br>
    </div>
</body>
</html>