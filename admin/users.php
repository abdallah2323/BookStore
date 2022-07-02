<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tbl_product";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    include 'index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .container 
    {
        padding: 50px;
        margin-right: 5px;
        width: 100%;
    }
        table 
        {
            position: relative;
            justify-content: center;
            align-items: center;
            margin: 35px 0px;
        }
</style>
<body>
    <div class="container">
    <h3 class="text-center" style="margin-top: 100px; font-weight: 600">ADMINS TABLE</h3>
        <form action="" method="post">
            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <tr class="table-info">
                        <th width="10%">ID</th>
                        <th width="10%">Username</th>
                        <th width="10%">Password</th>
                    </tr>
                    <?php 
                        $query = "SELECT * FROM `admin` ORDER BY id";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                    ?>

                    
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["user"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        
                    </tr>
                    <?php
                        } }
                    ?>
            </div>
        </form>
    </div>
</body>
</html>