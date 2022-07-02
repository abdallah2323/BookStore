<?php 
    $user = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

    <input type="checkbox" name="" id="check">

    <header>

        <label for="check">
            <i class="fal fa-bars" id="btn"></i>
        </label>

        <div class="left_area">
            <h3> Admin <span>Dashboard</span></h3>
            <div class="right_area">
                <a href="logout.php" class="logout_btn">Logout</a>
            </div>
        </div> 

    </header>

    <div class="sidebar">
        <center>
            <img src="../img/1.jpg" class="image" width="300" height= "300" alt="">
            <h4><?php echo $user; ?></h4>
        </center>
        <a href="dashboard.php"><i class="fal fa-desktop"></i><span>Dashboard</span></a>
        <a href="joiners.php"><i class="fal fa-table"></i><span>Joiners</span></a>
        <a href="books.php"><i class="fal fa-books"></i><span>Books</span></a>
        <a href="settings.php"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
        <a href="users.php"><i class="fal fa-users"></i><span>Users</span></a>
    </div>
</body>
</html>