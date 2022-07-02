<?php 
    include 'index.php';
    $id = $_GET['updateid'];
    $sql = "SELECT * FROM `tbl_product` WHERE id = $id ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $name = $row['name'];
        $image = $row['image'];
        $price = $row['price'];

    if(isset($_POST['update'])){
        $name = $_POST['bookname'];
        $price = $_POST['bookprice'];
        $target_dir = "img/";
        $target_file = $target_dir . rand() . time() . '_' . basename($_FILES['image']['name']);
    
        if(move_uploaded_file($_FILES['image']['tmp_name'], '../' . $target_file)){
                $sql = " UPDATE `tbl_product` SET `id`='$id', `name`='$name', `image`='$target_file', `price`='$price' WHERE id = '$id' ";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $msg = "Data Updated";
                    $css_class = "alert-success";
                }else{
                    die(mysqli_error($conn));
                } 
        }
    }
    if(isset($_POST['re'])){
        header('location:books.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<style>
    .form-div
    {
        margin-top: 100px;
        border: 1px solid #e0e0e0;
        padding: 50px;
        width: 500px;
    }
    .form-div h3 
    {
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    #imageDisp
    {
        display: block;
        width: 60%;
        margin-top: 10px auto;
        border-radius: 50%;
        margin-left: 80px;
    }
    img 
    {
        width: 300px;
        height: 250px;
    }
    input[type="text"]{
        height: 50px;
        border-radius: 8px;
        outline: none;
        border: none;
    }    
</style>
<body>
<div class="container">
        <div class="row">
            <div class="col-5 shadow offset-md-4 form-div">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h3 class="text-center">ADD BOOKS</h3>

                        <?php if(!empty($msg)): ?>
                            <div class="alert <?php echo $css_class; ?>">
                        <?php echo $msg; ?>
                            </div>
                        <?php endif; ?>

                    <div class="form-group text-center">
                        <img src="../<?php echo $image; ?>" id="imageDisp" onclick="triggerClick()">
                        <br>
                        <label for="bookImage" style="font-size: 23px; text-transform: uppercase; font-weight: 600">Book Image</label>
                        <br>
                        <br>
                        <input type="file" name="image" id="bookImage" onchange="displayImage(this)" style="display: none;">
                    </div>
                    <div class="form-group">
                        <label for="bookname" style="font-size: 20px; font-weight: 600; text-transform: uppercase;">Book name:</label>
                        <br>
                        <br>
                        <input type="text" value=<?php echo $name; ?> name="bookname" placeholder="Enter Book Name" required id="name" class="form-control">
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="bookprice" style="font-size: 20px; font-weight: 600; text-transform: uppercase;">Book price:</label>
                        <br>
                        <br>
                        <input type="text" value=<?php echo $price; ?> placeholder="Enter Book Price" name="bookprice" required id="price" class="form-control">
                        <br>
                    </div>
                    <br>
                    <div class="form-group">
                        
                        <input type="submit" class="btn btn-primary" name="update" value="Update">
                        <button style="margin-left: 213px" type="submit" class="btn btn-danger" name="re">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function triggerClick() {
            document.querySelector('#bookImage').click();
        }
        function displayImage(e){
            if (e.files[0]){
                var reader = new FileReader();

                reader.onload = function(e){
                    document.querySelector('#imageDisp').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>
</body>
</html>