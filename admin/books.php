<?php 
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
    *
    {
        transition: 0.5s all;
    }
    .container 
    {
        width: 100%;
    }
    form
    {
        width: 900px;
        margin: 70px 150px;
    }
    table
    {
        padding-left: 20px;
    }
    img
    {
        width: 200px;
        height: 200px;
    }
</style>
<body>
    <div class="container">
        <div class="table-responsive">
            <form action="post">
                <table class="table table-hover table-bordered text-center">
                    <tr class="table-info">
                        <th width="10%">ID</th>
                        <th width="20%">Book Name</th>
                        <th width="20%">Book Image</th>
                        <th width="20%">Price</th>
                        <th width="20%" colspan="2">Action</th>
                    </tr>
                        <?php
                        $sql = "SELECT * FROM tbl_product ORDER BY id";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_array($result))
                            {
                        ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><img src="../<?php echo $row['image']; ?>" alt=""></td>
                        <td>$ <?php echo $row['price']; ?></td>
                        <td><a href="update.php?updateid=<?php echo $row["id"]; ?>"><span class="btn btn-primary text-light">Update</span></a></td>
                        <td><a href="delete.php?deleteid=<?php echo $row["id"]; ?>"><span class="btn btn-danger text-light">Remove</span></a></td>
                    </tr>
                    <?php 
                        } }
                    ?>
                </table>
            </form>
        </div>
    </div>
</body>
</html>