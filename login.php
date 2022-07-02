<?php 
    $msg = "";
    $css_class = "";
    
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "tbl_product";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

    if(isset($_POST['submit'])){
            
            session_start();

            $username = $_POST['user'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `users` WHERE username='$username' AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

            if(is_array($row)){

                $_SESSION['user'] = $row['username'];
                header("location: index.php");

            }else{
                $msg = "Wrong username or password !";
                $css_class = "alert-danger";
            }
            if($row){

                if(!empty($_POST["remember"]))
                {
                setcookie ("user", $_POST["user"], time() + (60 * 60));
                setcookie ("pass", $_POST["password"], time() + (60 * 60));
                }else{
                    if(isset($_COOKIE["user"]))
                {
                    setcookie ("user", "");
                }
                if(isset($_COOKIE["pass"]))
                {
                    setcookie ("pass", "");
                }
            }header("Location:index.php");
        }else{
        $msg = "Invalid Username or Password";
        }
    }
        

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
    body 
    {
        height : 85vh;
    }
    .container 
    {
        margin-top: 120px
    }
</style>
<body>
<div class="container" style="width: 600px">
        <form action="" method="post">
            <h3 class="text-center">Login</h3>
            <?php if(!empty($msg)): ?>
                <div class="alert <?php echo $css_class; ?>">
                    <?php echo $msg; ?>
                </div>
                    <?php endif; ?>
            <div class="form-group">
                <label for="">Username:</label>
                <input type="text" name="user" value="<?php if(isset($_COOKIE["user"])) {echo $_COOKIE["user"];} ?>" class="form-control" placeholder="Enter Username">
                <br>
            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <input type="password" value="<?php if(isset($_COOKIE["pass"])) {echo $_COOKIE["pass"];}?>" name="password" class="form-control" placeholder="Enter Password">
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
        <p class="text-center">Don't have an account? <a href="sign.php"">Signup</a></p>
    </div>
</body>
</html>