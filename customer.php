<!DOCTYPE html>

<?php
include("functions/functions.php");
include("includes/database.php");
session_start();

?>
<html lang="en">
  <head>
    <title>Worker Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel='stylesheet' href='css/style.min.css' />
    <link rel="stylesheet" href="css/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/css/animate.css">
    
    <link rel="stylesheet" href="css/css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/css/magnific-popup.css">

    <link rel="stylesheet" href="css/css/aos.css">

    <link rel="stylesheet" href="css/css/ionicons.min.css">

    <link rel="stylesheet" href="css/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/css/flaticon.css">
    <link rel="stylesheet" href="css/css/icomoon.css">
    <link rel="stylesheet" href="css/css/style.css">
		<style>
		@import url('https://fonts.googleapis.com/css?family=Oldenburg');

html, body, div, span, applet, object, iframe,h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
  outline: none;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html { height: 101%; }
body { background: #dde9f0 url('https://i.imgur.com/p6YhOiv.png'); font-family: Arial, Tahoma, sans-serif; font-size: 62.5%; line-height: 1; padding-bottom: 65px; }

article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }

blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
strong { font-weight: bold; } 

table { border-collapse: collapse; border-spacing: 0; }
img { border: 0; max-width: 100%; }



p { font-size: 1.2em; font-weight: normal; line-height: 1.35em; color: #343434; margin-bottom: 12px; }

/* page container */
#wrap { display: block; width: 850px; margin: 0 auto; padding-top: 35px; }


/* user menu settings */
#dropdown { 
  display: block;
  padding: 13px 16px;
  width: 266px;
  margin: 0 auto;
  position: relative;
  cursor: pointer;
  font-size: 20px;
 
 -webkit-transition: all 0.15s linear;
  -moz-transition: all 0.15s linear;
  -ms-transition: all 0.15s linear;
  -o-transition: all 0.15s linear;
  transition: all 0.15s linear;
}
#dropdown:hover { color:#F5F5F5; }

#dropdown.open {
  background: #5a90e0;
  color: #fff;
  border-left-color: #6c6d70;
}

#dropdown ul { 
  position: absolute;
  top: 100%;
  left: -4px; /* move content -4px because of container left border */
  width: 266px;
  padding: 5px 0px;
  display: none;
  border-left: 4px solid #8e9196;
  background: #fff;
  -webkit-box-shadow: 1px 1px 2px rgba(0,0,0,0.3);
  -moz-box-shadow: 1px 1px 2px rgba(0,0,0,0.3);
  box-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}
#dropdown ul li { font-size: 0.9em; }

#dropdown ul li a { 
  text-decoration: none;
  display: block;
  color: #447dd3;
  padding: 7px 15px;
}
#dropdown ul li a:hover {
  color: #6fa0e9;
  background: #e7f0f7;
}
	
</style>
</head>
  <body>
    
	  <!-- navbar -->
	 <div class="navbar">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="index.php" class="navbar__logo">Worketeria</a>
				<nav class="navbar__menu">
				<div id="dropdown" class="ddmenu">
         
        <?php
          
          echo "<i class='fa fa-user-circle' aria-hidden='true'></i>"."  "."  ".$_SESSION['worker_name'];
         ?>

        <ul>
        <li><a href="#">My Profile</a></li><br>
        <li><a href="#">Notification</a></li>
        <li><a href="#">Account Settings</a></li><br>
        <li><a href="log_out.php">Log Out</a></li>
      </ul>
    </div>
			</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>

    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate mb-5 pb-5" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="mb-4 mt-5 pt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We have <span class="number" data-number="850000">0</span> great work offers!</p>
            <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">WE HAVE<br><span>WHAT YOU DESERVE!</span></h1>

						<div class="ftco-search">
							<div class="row">
		            <div class="col-md-12 nav-link-wrap">
			            <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			              <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Find a Job</a>

			             

			            </div>
			          </div>
			          <div class="col-md-12 tab-wrap">
			            
			            <div class="tab-content p-4" id="v-pills-tabContent">

			              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
			              	<form action="#" class="search-job">
			              		<div class="row">
			              			<div class="col-md">
			              				<div class="form-group">
				              				<div class="form-field">
				              					<div class="icon"><span class="icon-briefcase"></span></div>
								                <input type="text" class="form-control" placeholder="eg. Garphic. Web Developer">
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="select-wrap">
						                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
						                      <select name="" id="" class="form-control">
						                      	<option value="">Category</option>
						                      	<?php

                                           $get_cats = "select * from categories";

                                           $run_cats = mysqli_query($con, $get_cats);

                                           while($row_cats=mysqli_fetch_array($run_cats)){

                                           $cat_id = $row_cats['cat_id'];
                                           $cat_title = $row_cats['cat_title'];
                                           echo"<option value='$cat_id'>$cat_title</option>";
                                           }

                                   ?>
						                      </select>
						                    </div>
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
				              					<div class="icon"><span class="icon-map-marker"></span></div>
								                <input type="text" class="form-control" placeholder="Location">
								              </div>
							              </div>
			              			</div>
			              			<div class="col-md">
			              				<div class="form-group">
			              					<div class="form-field">
								                <input type="submit" value="Search" class="form-control btn btn-primary">
								              </div>
							              </div>
			              			</div>
			              		</div>
			              	</form>
			              </div>

			            </div>
								</div>
			        </div>
		       </div>
        </div>
      </div>
   </div>
 </div>
 <section class="ftco-section ftco-counter">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Categories work wating for you</span>
            <h2 class="mb-4"><span>Current</span> work categories</h2>
          </div>
        </div>
        <div class="row">
                   <?php

                        $get_cats = "select * from categories";

                        $run_cats = mysqli_query($con, $get_cats);

                        while($row_cats=mysqli_fetch_array($run_cats)){

                        $cat_id = $row_cats['cat_id'];
                        $cat_title = $row_cats['cat_title'];
                        echo"
                        <div class='col-md-3 ftco-animate'>
        		               <ul class='category'>
        		              	<li><a href='customer.php?cat_id=$cat_id'>$cat_title</a></li>
        			             </ul>
        	                </div>
                       ";
                         }

                    ?>
        </div>
    	</div>
    </section>

<section class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Recently Added Jobs</span>
            <h2 class="mb-4"><span>Recent</span> Jobs</h2>
          </div>
        </div>
				<div class="row">
          <?php
          getCatpro();
          ?>
        </div>
				<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
			</div>
		</section>
   <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



  <script src="js/js/jquery.min.js"></script>
  <script src="js/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/js/popper.min.js"></script>
  <script src="js/js/bootstrap.min.js"></script>
  <script src="js/js/jquery.easing.1.3.js"></script>
  <script src="js/js/jquery.waypoints.min.js"></script>
  <script src="js/js/jquery.stellar.min.js"></script>
  <script src="js/js/owl.carousel.min.js"></script>
  <script src="js/js/jquery.magnific-popup.min.js"></script>
  <script src="js/js/aos.js"></script>
  <script src="js/js/jquery.animateNumber.min.js"></script>
  <script src="js/js/bootstrap-datepicker.js"></script>
  <script src="js/js/jquery.timepicker.min.js"></script>
  <script src="js/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/js/google-map.js"></script>
  <script src="js/js/main.js"></script>
	<script>
$("#dropdown").on("click", function(e){
  e.preventDefault();
  
  if($(this).hasClass("open")) {
    $(this).removeClass("open");
    $(this).children("ul").slideUp("fast");
  } else {
    $(this).addClass("open");
    $(this).children("ul").slideDown("fast");
  }
});

</script>
    
  </body>
</html>