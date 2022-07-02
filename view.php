<?php 
    include 'config/process.php';
    include 'header.php';
    if(isset($_POST['sear'])){
        $search = $_POST['search'];
    $sql = 'SELECT * FROM tbl_product WHERE name LIKE "%' . $search . '%"';
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) > 0){

            echo '<table>';
                echo    '<tr>
                            <th> id </th>
                            <th> name </th>
                            <th> image </th>
                            <th> price </th>
                        </tr>';     

        while($row = mysqli_fetch_array($result)){
                echo    '<tr>
                            <td>'. $row['id'] .'</td>
                            <td>'. $row['name'] .'</td>
                            <td><img src='. $row["image"] .'></td>
                            <td>$'. $row['price'] .'</td>
                        </tr>';
        }
            echo '</table>'; 
        
    }else{
        echo "Empty data";
    }
}
?>
<link rel="stylesheet" href="css/book.css">
<style>
    table {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        border-collapse: collapse;
        text-align: center;
        margin-top: 150px;
    }
    th, tr, td {
        border: 1px solid #000;
        padding: 10px;
    }
    header
{
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	padding: 40px 50px;
	z-index: 1000;
	display: flex;
	justify-content: space-between;
	align-items: center;
	transition: 0.7s;
	background: rgba(255,255,255,0.28);
	z-index: 1000;
}
header .logo
{
	color: #000;
	font-weight: 700;
	font-size: 2.5em;
	text-decoration: none;
	letter-spacing: 1px;
}
header .logo:hover
{
	color: #ddd;    
}
header .logo span
{
	color: #009b27;
	letter-spacing: 4px;
}
header .navigation
{
	position: relative;
	display: flex;
    margin-top: 20px;
}
header .navigation li
{
	list-style: none;
	margin-left: 10px;
}
header .navigation li:hover a
{
	background: #009b27;
	color: #ddd;
}
header .navigation li a
{
	text-decoration: none;
	color: #000;
	font-weight: 300;
	transition: 0.7s ease-in-out;
	padding: 10px;
	border-radius: 15px;
	font-size: 19px;
}
header .search input[type = text]{
    border: 1px solid #000;
    border-radius: 5px;
    height: 40px;
    padding: 10px;
	outline: none;
	border: none;
}

header .search input[type = submit]{
    padding: 10px;
    cursor: pointer;
    background-color: #009b27;
    color: #fff;
    border-radius: 8px;
	outline: none;
	border: none;
}
</style>
<script type="text/javascript">
    window.addEventListener('scroll', function () {
      const header = document.querySelector('header');
      header.classList.toggle("sticky", window.scrollY > 0);
    });

    </script>