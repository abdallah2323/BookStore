<?php 
    session_start();
    include 'header.php';
    include 'process.php';

    if (!isset($_SESSION['admin'])) {
    header("location: login.php");
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
    <script src="../js/bootstrap.js"></script>

</head>
<style>
    .container 
    {
        padding: 30px;
    }
</style>
<body>


    <div class='spinner-wrapper'>
        <div class="spinner"></div>
    </div>



    <script>
    let spinnerWrapper = document.querySelector('.spinner-wrapper');

    window.addEventListener('load', function () {
        // spinnerWrapper.style.display = 'none';
        spinnerWrapper.parentElement.removeChild(spinnerWrapper);
    });
    </script>
</body>
</html>