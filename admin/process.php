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
    
            $sql = "SELECT * FROM `admin` WHERE user='$username'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
    
            if(is_array($row)){
    
                $_SESSION['admin'] = $row['user'];
                header('location: dashboard.php');
    
            }
            if($row){

                if(!empty($_POST["remember"]))
                {
                setcookie ("admin", $_POST["user"], time() + (60 * 60));
                setcookie ("password", $_POST["password"], time() + (60 * 60));
                }else{
                    if(isset($_COOKIE["admin"]))
                {
                    setcookie ("admin", "");
                }
                if(isset($_COOKIE["password"]))
                {
                    setcookie ("password", "");
                }
            }header("Location: dashboard.php");
            }else{
                $msg = "Wrong username or password !";
                $css_class = "alert-danger";
            }

        }

        if(isset($_POST['add-book'])){
            $price = $_POST['bookprice'];
            $name = $_POST['bookname'];
            $target_dir = "img/";
            $target_file = $target_dir . rand() . time() . '_' . basename($_FILES['image']['name']);
            
    
            if(move_uploaded_file($_FILES['image']['tmp_name'], '../' . $target_file)){
                $sql = "INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES (NULL, '$name', '$target_file', '$price')";
                if (mysqli_query($conn, $sql)){
                    $msg = "Image Uploaded to the website";
                    $css_class = "alert-success";
                } else {
                    $msg = "Database Error: Failed to save user";
                    $css_class = "alert-danger";
                }
                } else {
                    $msg = "Failed to upload the Image";
                    $css_class = "alert-danger";
            };
        }
?>