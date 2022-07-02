<?php 
    include 'process.php';

    if(isset($_GET['deleteid'])){

        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `tbl_product` WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("location: books.php");
        }else{
            echo "<script>alert('Book not Deleted')</script>";
            die(mysqli_error($conn));
        }
    }
?>