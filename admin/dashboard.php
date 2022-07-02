<?php 
    include 'index.php';
    $admin = $_SESSION['admin'];
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
   span.float-right.summary_icon {
    font-size: 3rem;
    position: absolute;
    right: 1rem;
    color: #ffffff96;
}
.containe-fluid
{
    padding: 100px 150px;
    width: 100%;
    margin-left: 120px;
}

.card.hov 
{
    cursor: pointer;
    transition: 0.8s ease-in-out;
}
.card.hov:hover 
{
    opacity: 0.8;
    transform: scale(1.13);
}
.imgs{
		margin: .5em;
		max-width: calc(100%);
		max-height: calc(100%);
	}
	.imgs img{
		max-width: calc(100%);
		max-height: calc(100%);
		cursor: pointer;
	}
	#imagesCarousel,#imagesCarousel .carousel-inner,#imagesCarousel .carousel-item{
		height: 60vh !important;background: black;
	}
	#imagesCarousel .carousel-item.active{
		display: flex !important;
	}
	#imagesCarousel .carousel-item-next{
		display: flex !important;
	}
	#imagesCarousel .carousel-item img{
		margin: auto;
	}
	#imagesCarousel img{
		width: auto!important;
		height: auto!important;
		max-height: calc(100%)!important;
		max-width: calc(100%)!important;
	}
</style>
<body>
    <div class="containe-fluid">
        <div class="row mt-3 ml-3 mr-3">
            <div class="col-lg-12">
                <div class="card" style="padding: 30px;">
                    <div class="card-body">
                        <h4>
                        <?php echo "Welcome back ". $_SESSION['admin']. " !"  ?>
                        </h4>
                        <br>
                        <hr>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card hov">
                                    <div class="card-body bg-info">
                                        <div class="card-body text-white">
                                            <span class="float-right summary_icon"><i class="fad fa-users-cog"></i></span>
                                            <h4><b>
                                            <?php echo $conn->query("SELECT * FROM admin")->num_rows; ?>
                                            </b></h4>
                                            <h5><b>Total Admin</b></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card hov">
                                    <div class="card-body bg-danger">
                                        <div class="card-body text-white">
                                            <span class="float-right summary_icon"><i class="fad fa-users"></i></span>
                                            <h4><b>
                                                <?php echo $conn->query("SELECT * FROM users")->num_rows; ?>
                                            </b></h4>
                                            <h5><b>Total Joiners</b></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card hov">
                                    <div class="card-body bg-warning">
                                        <div class="card-body text-white">
                                            <span class="float-right summary_icon"><i class="fa fa-list"></i></span>
                                            <h4><b>
                                                <?php echo $conn->query("SELECT * FROM tbl_product")->num_rows; ?>
                                            </b></h4>
                                            <h5><b>Total Products</b></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      			
            </div>
        </div>
    </div>
</body>
</html>