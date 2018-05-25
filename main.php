<?php
require("header.php");
require("connection.php");

$query = "SELECT * FROM news ORDER BY date ASC";
$result = mysqli_query($conn,$query) or die("failed to query");
$row = mysqli_fetch_assoc($result);
?>
<div class="clearfix"></div>
<!-- Carousel -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/images/IMG_20180112_080615.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
    <h1 class="display-2 text-warning">Welcome</h1>
    <h3>Our Vission is to raise New Breed of Global Leaders with Inteligience and Integrity in a Harmonious Learning Environment who will be Change Agents in the next generation.</h3>
            <button class="btn btn-outline-light btn-lg" type="button" href="contact.php">Contact Us</button>
            </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/images/IMG_20180112_080611.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
    <h1 class="display-2 text-warning">Portal</h1>
    <h3>We run a User-Friendly e-Portal...Easy...Fast...Reliable</h3>
            <button class="btn btn-outline-light btn-lg" type="button" href="studentLogin.php">Student Portal</button>
            <button class="btn btn-outline-primary btn-lg" type="button" href="teacherLogin.php">Teachers Portal</button>
        </div>    
      </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/images/IMG_20180112_080613.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
    <h1 class="display-2 text-warning">Alumni Forum</h1>
    <h3>We are in the business of building a platform where our Alumni can easily and readily communicate with each other</h3>
            <button class="btn btn-outline-light btn-lg" type="button">Learn More</button>
            <button class="btn btn-outline-primary btn-lg" type="button" href="alumni.php">Get Started</button>
        </div>   
      </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="clearfix"></div>
<hr>
<div class="container padding">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3">
    <img src="img/gi-home-quartet-four.jpg" class="img-fluid rounded-circle" width="200" height="150">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-9">
       <p class="font-weight-light text-justify adjust">Loyola Jesuit College (LJC) is part of the worldwide family of Jesuit schools run by the Society of Jesus in Abuja, Nigeria in Africa. With them, it shares a common vision and philosophy derived from the writings of the founder of the Jesuits, St. Ignatius of Loyola. All Jesuit schools and their alumni are linked internationally, regionally and nationally and share development programs in common. Although all Jesuit schools are linked in that they draw from the same educational philosophies, each school is unique in the way that it adapts to its particular circumstances. The Mission Statement and other contents of this website which flow from it are our attempt to be both authentically Jesuit and relevant to the Nigerian society that we serve.</p>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="container padding" id="news">
<h1 class="text-center font-weight-bold">CSSA NEWS</h1>
    <hr class="my-rule">
    <div class="card-deck">
  <div class="card">
    <img class="card-img-top" src="img/network-1738084.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['news_caption']; ?></h5>
        <p class="card-text"><?php echo $row['news_content']; ?></p>
        <button class="btn btn-outline-primary btn-sm">View Calendar</button>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo "Last updated ".date("D jS F Y g.iA",
strtotime($row['date'])); ?></small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="img/network-1433045.jpg" alt="Card image cap">
   <div class="card-body">
      <h5 class="card-title"><?php echo $row['news_caption']; ?></h5>
        <p class="card-text"><?php echo $row['news_content']; ?></p>
        <button class="btn btn-outline-primary btn-sm">Read More</button>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo "Last updated ".date("D jS F Y g.iA",
strtotime($row['date'])); ?></small>
    </div>
  </div>
 <div class="card">
    <img class="card-img-top" src="img/network-1433045.jpg" alt="Card image cap">
   <div class="card-body">
      <h5 class="card-title"><?php echo $row['news_caption']; ?></h5>
        <p class="card-text"><?php echo $row['news_content']; ?></p>
        <button class="btn btn-outline-primary btn-sm">View Fees</button>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo "Last updated ".date("D jS F Y g.iA",
strtotime($row['date'])); ?></small>
    </div>
  </div>
</div>
</div>
<div class="clearfix"></div>
<!--Gallery -->
<hr>
<div class="container-fluid padding" style="padding-bottom:0;" id="gallery">
   <section class="portfolio-w3ls" id="gallery">
		<h1 class="text-center font-weight-bold">TAKE A TOUR</h1>
       <hr class="my-rule padding">
<div class="row">
       <div class="col-xs-12 col-sm-12 col-md-3 gallery-grid gallery1">
    <a href="images/g1.jpg" class="swipebox"><img src="images/g1.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>CSSA</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 gallery-grid gallery1">
    <a href="images/g2.jpg" class="swipebox"><img src="images/g2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>CSSA</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 gallery-grid gallery1">
    <a href="images/g3.jpg" class="swipebox"><img src="images/g3.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>CSSA</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 gallery-grid gallery1">
    <a href="images/g4.jpg" class="swipebox"><img src="images/g4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>CSSA</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 gallery-grid gallery1">
    <a href="images/g5.jpg" class="swipebox"><img src="images/g5.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>CSSA</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 gallery-grid gallery1">
    <a href="images/g6.jpg" class="swipebox"><img src="images/g6.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>CSSA</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 gallery-grid gallery1">
    <a href="images/g8.jpg" class="swipebox"><img src="images/g8.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>CSSA</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 gallery-grid gallery1">
    <a href="images/g7.jpg" class="swipebox"><img src="images/g7.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>CSSA</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>  
    </div>
       </div>
    </section>
</div>
<div class="clearfix"></div>
  <!--connect -->
      <div class="container-fluid connect">
      <div class="row text-center">
          <div class="col-12">
          <h2 class="social padding">CONNECT</h2>
              <hr class="my-rule">
                  </div>
          <div class="col-12 ">
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-youtube"></i>
           
          </div>
          </div>
      </div>
<?php
require("footer.php");
?>