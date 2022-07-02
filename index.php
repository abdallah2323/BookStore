<?php 
    include 'config/process.php';
    if(!isset($_SESSION['user'])){
      header("location: login.php");
  }
  include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library Store</title>
  <link rel="stylesheet" href="css/book.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script src="js/bootstrap.js"></script>
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  

<body>

  <div class="land">
    

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
          aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
          aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
          aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/bg.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>The Library Activities</h5>
            <br>
            <ol>
              <li>Challenge your kids with a library scavenger hunt</li>
              <li>Hire an audio book</li>
              <li>The Summer Reading Challenge</li>
              <li>Join a children's book club</li>
              <li>Enrol in the Children’s University</li>
            </ol>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/bg1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Book New's</h5>
            <p>Mercy by David Baldacci leads holds this week. Four LibraryReads and eight Indie Next titles publish this week. The December Issue of Entertainment Weekly is out with features on Outlander, Emily Ratajkowski, and a pop-culture gift guide.
              Rachel Kapelke-Dale's debut novel, The Ballerinas, gathers buzz as the #1 pick for both LibraryReads and Loan Stars. Matt Haig wins the W H Smith’s Author of the Year 2021 award. Emily Stewart wins the Helen Anne Bell Poetry Bequest Award. ALA welcomes the removal of “Aliens” and “Illegal aliens” as subject headings.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/img1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>About</h5>
            <p>A public library provides services to the general public. If the library is part of a countywide library system, citizens with an active library card from around that county can use the library branches associated with the library system. A library can serve only their city, however, if they are not a member of the county public library system. Much of the materials located within a public library are available for borrowing. The library staff decides upon the number of items patrons are allowed to borrow, as well as the details of borrowing time allotted.</p>
            <br>
            <a href="#" class="btn btn-outline-success">Read more</a>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="main" id="bk">
    <div class="menu">
      <h2 id="logo">Books</h2>
      <a href="#1" class="btn btn-outline-success">The Judge's List</a>
      <a href="#2" class="btn btn-outline-success">Mercy</a>
      <a href="#3" class="btn btn-outline-success">Game Theory</a>
      <a href="#4" class="btn btn-outline-success">The Wish</a>
      <a href="#5" class="btn btn-outline-success">The Lyrics</a>
      <a href="#6" class="btn btn-outline-success">The Storyteller</a>
    </div>
  </div>
</div>
</div>
			<?php
				$query = "SELECT * FROM tbl_product ORDER BY id";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>

				<form method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?>">
          <section class="arrivals" id="arrivals">
              <div class="swiper arrivals-slider">

                  <div class="swiper-wrapper">

                  <div class="swiper-slide box">
                    <div class="image">
                        <img src="<?php echo $row["image"]; ?>" alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $row["name"]; ?></h3>
                        <div class="price">$<?php echo $row["price"]; ?></div>
                        <input type="text" name="quantity" placeholder="Enter the quantity" style="border: 1px solid #000" class="form-control text-center" />
                        <input type="submit" class="btn text-uppercase" name="add_to_cart" value="Add to cart">
                    </div>
                  </div>

                  </div>
                  <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

                  <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>" />

						      <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
              </div>

          </section>
				</form>
			<?php
					}
				}

			?>

    <div class="about-section" id="ab">
      <div class="inner-container">
        <h1>About Us</h1>
        <p class="text">
          Traditionally, collection of books used for reading or study, or the building or room in which such a collection
          is kept. The word derives from the Latin liber, “book,” whereas a Latinized Greek word, bibliotheca, is the
          origin of the word for library in German, Russian, and the
        </p>
        <div class="skills">
          <a href="#">Books</a>
          <a href="#">Topics</a>
          <a href="#">Archives</a>
        </div>
      </div>
    </div>
  <div class="contactus" id="cu">
    <div class="contact-first">
      <h1>Contact Us</h1>
      <form action="#">
        <label>full name</label>
        <br>
        <input type="text" class="in" placeholder="Name">
        <br>
        <br>
        <label>Email Address</label>
        <br>
        <input type="email" class="in" placeholder="Email">
        <br>
        <br>
        <label> Subject </label>
        <br>
        <input type="text" class="in" placeholder="Subject" id="">
        <br>
        <br>
        <label>Message</label>
        <br>
        <textarea placeholder="Message" class="txt"></textarea>
        <br>
        <br>
        <input type="submit" class="sub" value="Send Message">
      </form>
    </div>
    <div class="contact-map">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d954.2792894939596!2d34.46500308294304!3d31.533364963583818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7e55de5e7e67%3A0xecfec801160f7beb!2z2LPZhtiq2LEg2YbYp9i12LE!5e0!3m2!1sar!2s!4v1616876846277!5m2!1sar!2s"
        width="600" height="700" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>

  <div class="copyrightText">
    <p>
        Copyright @ 2021 Abdallah Library. All Rights Reserved.
    </p>
</div>

  <script type="text/javascript">
    window.addEventListener('scroll', function () {
      const header = document.querySelector('header');
      header.classList.toggle("sticky", window.scrollY > 0);
    });

    </script>
</body>

</html>
