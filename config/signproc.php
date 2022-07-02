<?php 

    $userErr = $nameErr = $passwordErr = $phoneErr = "";
    $msg = "";
    $css_class = "";
    
    $conn = mysqli_connect('localhost', 'root', '', 'tbl_product');

    if(isset($_POST['submit'])){
        $username = $_POST['user'];
        $fullname = $_POST['name'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];

        if (empty($_POST["user"])) {
            $userErr = "Username is required";
          } else {
              $user = test_input($_POST["user"]);
            if (!preg_match("/^[a-zA-Z\d\-']*$/",$user)) {
              $userErr = "Only letters and white space allowed";
            }
          }
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
          } else {
              $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z\s\-']*$/",$name)) {
              $nameErr = "Only letters and white space allowed";
            }
          }
        if (empty($_POST["password"])) {
            $passwordErr = "Password is required";
          }
          else {
            $password = test_input($_POST["password"]);
            if( strlen($password ) <= 8 ) {
                $passwordErr = "Password too short";
                }
            if( !(preg_match("/[a-z]+/", $password ) && preg_match("/[\d]+/", $password ))) {
                $passwordErr = "Password must include at least one number Or Letter!";
                }
            }
        if (empty($_POST["phone"])) {
                $phoneErr = "Phone is required";
              } else {
                $phone = test_input($_POST["phone"]);
              if (!preg_match("/^[0-9]{7,10}$/", $phone)){
                $phoneErr = "Invalid phone";
                }
            }
        if($userErr == "" && $nameErr == "" && $passwordErr == "" && $phoneErr == ""){
            $sql = "SELECT * FROM `users` WHERE username='$user'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, full_name, password, phone)
                VALUES ('$username', '$fullname','$password', '$phone')";
        if(mysqli_query($conn, $sql)){
            $msg = "Registration completed";
            $css_class = "alert-success";
            }
        }
        else{
            $msg = "Oops this username was existing";
            $css_class = "alert-danger";
        }
        }else {
            $msg = "Please fill in the information as required";
            $css_class = "alert-danger";
        }
        
    }



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>