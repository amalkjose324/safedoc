<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SafeDocx : Secure Document Storage</title>
  <?php include_once 'login.php'; ?>
  <?php include_once 'db_connect.php'; ?>
  <!-- Bootstrap Core CSS -->
  <link href="asset/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom messagebx and notification CSS -->
 <link rel="stylesheet" href="css/lobibox.min.css"/>

  <!-- Animate CSS -->
  <link href="css/animate.css" rel="stylesheet" >

  <!-- Owl-Carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" >
  <link rel="stylesheet" href="css/owl.theme.css" >
  <link rel="stylesheet" href="css/owl.transitions.css" >

  <!-- Custom CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">

  <!-- Colors CSS -->
  <link rel="stylesheet" type="text/css" href="css/color/green.css">



  <!-- Colors CSS -->
  <link rel="stylesheet" type="text/css" href="css/color/green.css" title="green">
  <link rel="stylesheet" type="text/css" href="css/color/light-red.css" title="light-red">
  <link rel="stylesheet" type="text/css" href="css/color/blue.css" title="blue">
  <link rel="stylesheet" type="text/css" href="css/color/light-blue.css" title="light-blue">
  <link rel="stylesheet" type="text/css" href="css/color/yellow.css" title="yellow">
  <link rel="stylesheet" type="text/css" href="css/color/light-green.css" title="light-green">

  <!-- Custom Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>


  <!-- Modernizer js -->
  <script src="js/modernizr.custom.js"></script>


  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="index">

  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand page-scroll" href="./"><span style="color:white;">Safe</span>Docx</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="hidden">
            <a href="#page-top"></a>
          </li>
          <li>
            <a class="page-scroll" href="#feature">Feature</a>
          </li>
          <li>
            <a class="page-scroll" id="download_btn-top" href="#download">Downloads</a>
          </li>
          <li>
            <a class="page-scroll" href="#about-us">About</a>
          </li>
          <li>
            <a class="page-scroll" href="#team">Team</a>
          </li>
          <li>
            <a class="page-scroll" href="#pricing">Pricing</a>
          </li>
          <li>
            <a class="page-scroll" href="#partner">Partners</a>
          </li>
          <li>
            <a class="page-scroll" href="#contact">Contact</a>
          </li>
          <li class="login-btn">
            <a class="page-scroll" id="log-btn">Login / Signup</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>




  <!-- Start Home Page Slider -->
  <section id="page-top">
    <!-- Carousel -->
    <div id="main-slide" class="carousel slide" data-ride="carousel">
      <!--/ Indicators end-->

      <!-- Carousel inner -->
      <div class="carousel-inner">
        <div class="item active">
          <img class="img-responsive" src="images//galaxy.jpg" alt="slider">
          <div class="slider-content">
            <div class="col-md-12 text-center">
              <h1 class="animated3">
                <span>Safe<strong>Docx</strong></span>
              </h1>
              <p class="animated2">Place to keep your certificates safely and <br>easily sharable as per your needs..!</p>
              <a class="animated3 slider btn btn-primary btn-min-block log-btn-main" href="#">Login / Signup</a><a class="animated3 slider btn btn-default btn-min-block btn-downloads-main">Downloads</a>

            </div>
          </div>
        </div>
        <!--/ Carousel item end -->
      </div>
      <!-- Carousel inner end-->
    </div>
    <!-- /carousel -->
  </section>
  <!-- End Home Page Slider -->



  <!-- Start Feature Section -->
  <section id="feature" class="feature-section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature">
            <i class="fa fa-cloud"></i>
            <div class="feature-content">
              <h4>Safe Storage</h4>
              <p>SafeDocx provides a safe storage of documents without providing any unautherised access.</p>
            </div>
          </div>
        </div><!-- /.col-md-3 -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature">
            <i class="fa fa-check"></i>
            <div class="feature-content">
              <h4>Easy Varification</h4>
              <p>Document varification is through online system using SafeDocx Varification Option(SVO). </p>
            </div>
          </div>
        </div><!-- /.col-md-3 -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature">
            <i class="fa fa-universal-access"></i>
            <div class="feature-content">
              <h4>Universal Access</h4>
              <p>You can access your documents and store new documents at any time and from anywhere.</p>
            </div>
          </div>
        </div><!-- /.col-md-3 -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature">
            <i class="fa fa-share-alt"></i>
            <div class="feature-content">
              <h4>Custom Sharing</h4>
              <p>It provides custom sharing facility on document access. And can modify access at any time.</p>
            </div>
          </div>
        </div>
      </div><!-- /.row -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature">
            <i class="fa fa-lock"></i>
            <div class="feature-content">
              <h4>High Security</h4>
              <p>Provides high security from unautherised access through SafeDocx Security Option(SSO).</p>
            </div>
          </div>
        </div><!-- /.col-md-3 -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature">
            <i class="fa fa-shield"></i>
            <div class="feature-content">
              <h4>Platform Independent</h4>
              <p>SafeDocx will available for all platforms Windows,Android and iOS. And also in any web browser.</p>
            </div>
          </div>
        </div><!-- /.col-md-3 -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature">
            <i class="fa fa-truck"></i>
            <div class="feature-content">
              <h4>Free Service</h4>
              <p>SafeDocx is ubsolutely free upto the storage of 1GB. Thereafter you can use this service with a cheap rate.</p>
            </div>
          </div>
        </div><!-- /.col-md-3 -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="feature">
            <i class="fa fa-link"></i>
            <div class="feature-content">
              <h4>Short-Link Support</h4>
              <p>Provides a shortlink facility to avoid long links. This links canbe customised as per your wish.</p>
            </div>
          </div>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>
  <!-- End Feature Section -->


  <!-- Start Call to Action Section -->
  <section class="call-to-action" id="download">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="animated3" style="font-size:48px;">
            <span>Safe<strong>Docx</strong> Downloads</span>
          </h1>
          <h1>Keep and access your documents in handfree mode</br>Share your documents to any one and anywhere as your wish</br>Access your documents from any browser and from any platform</h1>
          <button type="submit" class="btn btn-primary download_btn"><i class="fa fa-android fa-3x"></i><b class="download_text" ><h4>Android</h4></b></button>
          <button type="submit" class="btn btn-primary download_btn"><i class="fa fa-apple fa-3x"></i><b class="download_text" ><h4>iOS</h4></b></button>
          <button type="submit" class="btn btn-primary download_btn"><i class="fa fa-windows fa-3x"></i><b class="download_text" ><h4>Windows</h4></b></button>
          <button type="submit" class="btn btn-primary download_btn"><i class="fa fa-desktop fa-3x"></i><b class="download_text" ><h4>Desktop</h4></b></button>
        </div>
      </div>
    </div>
  </section>
  <!-- End Call to Action Section -->


  <!-- Start About Us Section -->
  <section id="about-us" class="about-us-section-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="section-title text-center">
            <h3>About Us</h3>
            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="col-md-4">
          <div class="welcome-section text-center">
            <img src="images/about-01.jpg" class="img-responsive" alt="..">
            <h4>Office Philosophy</h4>
            <div class="border"></div>
            <p>Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="welcome-section text-center">
            <img src="images/about-02.jpg" class="img-responsive" alt="..">
            <h4>Office Mission & Vission</h4>
            <div class="border"></div>
            <p>Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="welcome-section text-center">
            <img src="images/about-03.jpg" class="img-responsive" alt="..">
            <h4>Office Value & Rules</h4>
            <div class="border"></div>
            <p>Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
          </div>
        </div>

      </div><!-- /.row -->

    </div><!-- /.container -->
  </section>
  <!-- End About Us Section -->

  <!-- Start Fun Facts Section -->
  <section class="fun-facts">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="counter-item">
            <i class="fa fa-male"></i>
            <div class="timer" id="item1" data-to="991" data-speed="5000"></div>
            <h5>Happy Clients</h5>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="counter-item">
            <i class="fa fa-cloud-upload"></i>
            <div class="timer" id="item2" data-to="7394" data-speed="5000"></div>
            <h5>Varified Documents</h5>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="counter-item">
            <i class="fa fa-check"></i>
            <div class="timer" id="item3" data-to="18745" data-speed="5000"></div>
            <h5>Authorities</h5>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="counter-item">
            <i class="fa fa-link"></i>
            <div class="timer" id="item4" data-to="8423" data-speed="5000"></div>
            <h5>Link Shares</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Fun Facts Section -->



  <!-- Start Team Member Section -->
  <section id="team" class="team-member-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="section-title text-center">
            <h3>Our Team</h3>
            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div id="team-section">





            <div class="our-team">

              <div class="team-member">
                <img src="images/team/manage-1.png" class="img-responsive" alt="">
                <div class="team-details">
                  <h4>John Doe</h4>
                  <p>Founder & Director</p>
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>

              <div class="team-member">
                <img src="images/team/manage-2.png" class="img-responsive" alt="">
                <div class="team-details">
                  <h4>John Doe</h4>
                  <p>Founder & Director</p>
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>

              <div class="team-member">
                <img src="images/team/manage-3.png" class="img-responsive" alt="">
                <div class="team-details">
                  <h4>John Doe</h4>
                  <p>Founder & Director</p>
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>

              <div class="team-member">
                <img src="images/team/manage-4.png" class="img-responsive" alt="">
                <div class="team-details">
                  <h4>John Doe</h4>
                  <p>Founder & Director</p>
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>

              <div class="team-member">
                <img src="images/team/manage-1.png" class="img-responsive" alt="">
                <div class="team-details">
                  <h4>John Doe</h4>
                  <p>Founder & Director</p>
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>

              <div class="team-member">
                <img src="images/team/manage-2.png" class="img-responsive" alt="">
                <div class="team-details">
                  <h4>John Doe</h4>
                  <p>Founder & Director</p>
                  <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  </ul>
                </div>
              </div>


            </div>


          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- End Team Member Section -->



  <!-- Start Pricing Table Section -->
  <div id="pricing" class="pricing-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="col-md-12">
            <div class="section-title text-center">
              <h3>Our Pricing Plan</h3>
              <p class="white-text">Duis aute irure dolor in reprehenderit in voluptate</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">

        <div class="pricing">

          <div class="col-md-12">
            <div class="pricing-table">
              <div class="plan-name">
                <h3>Free</h3>
              </div>
              <div class="plan-price">
                <div class="price-value">$0<span>.00</span></div>
                <div class="interval"></div>
              </div>
              <div class="plan-list">
                <ul>
                  <li>1 GB Storage</li>
                  <li>1000 Link Shares</li>
                  <li>SSO Enabled</li>
                  <li>Unlimited Free</li>
                </ul>
              </div>
              <div class="plan-signup">

              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="pricing-table">
              <div class="plan-name">
                <h3>Standard</h3>
              </div>
              <div class="plan-price">
                <div class="price-value">$3<span>.00</span></div>
                <div class="interval"></div>
              </div>
              <div class="plan-list">
                <ul>
                  <li>2 GB Storage</li>
                  <li>5000 Link Shares</li>
                  <li>SSO Enabled</li>
                  <li>One-Time Payment</li>
                </ul>
              </div>
              <div class="plan-signup">

              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="pricing-table">
              <div class="plan-name">
                <h3>Premium</h3>
              </div>
              <div class="plan-price">
                <div class="price-value">$5<span>.00</span></div>
                <div class="interval"></div>
              </div>
              <div class="plan-list">
                <ul>
                  <li>5 GB Storage</li>
                  <li>10000 Link Shares</li>
                  <li>SSO Enabled</li>
                  <li>One-Time Payment</li>
                </ul>
              </div>
              <div class="plan-signup">

              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="pricing-table">
              <div class="plan-name">
                <h3>Professional</h3>
              </div>
              <div class="plan-price">
                <div class="price-value">$10<span>.00</span></div>
                <div class="interval"></div>
              </div>
              <div class="plan-list">
                <ul>
                  <li>Unlimited Storage</li>
                  <li>Unlimited Link Shares</li>
                  <li>SSO Enabled</li>
                  <li>One-Time Payment</li>
                </ul>
              </div>
              <div class="plan-signup">

              </div>
            </div>
          </div>

        </div>


      </div>
    </div>
  </div>
  <!-- End Pricing Table Section -->



  <!-- Clients Aside -->
  <section id="partner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h3>Our Honorable Partner</h3>
            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="clients">

          <div class="col-md-12">
            <img src="images/logos/themeforest.jpg" class="img-responsive" alt="...">
          </div>

          <div class="col-md-12">
            <img src="images/logos/creative-market.jpg" class="img-responsive" alt="...">
          </div>

          <div class="col-md-12">
            <img src="images/logos/designmodo.jpg" class="img-responsive" alt="...">
          </div>

          <div class="col-md-12">
            <img src="images/logos/creative-market.jpg" class="img-responsive" alt="...">
          </div>

          <div class="col-md-12">
            <img src="images/logos/microlancer.jpg" class="img-responsive" alt="...">
          </div>

          <div class="col-md-12">
            <img src="images/logos/themeforest.jpg" class="img-responsive" alt="...">
          </div>

          <div class="col-md-12">
            <img src="images/logos/microlancer.jpg" class="img-responsive" alt="...">
          </div>

          <div class="col-md-12">
            <img src="images/logos/designmodo.jpg" class="img-responsive" alt="...">
          </div>

          <div class="col-md-12">
            <img src="images/logos/creative-market.jpg" class="img-responsive" alt="...">
          </div>

          <div class="col-md-12">
            <img src="images/logos/designmodo.jpg" class="img-responsive" alt="...">
          </div>

        </div>
      </div>
    </div>
  </section>





  <section id="contact" class="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title text-center">
            <h3>Contact With Us</h3>
            <p class="white-text">Duis aute irure dolor in reprehenderit in voluptate</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button type="submit" class="btn btn-primary">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
      </div>
    </div>
    <footer class="style-1">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-xs-12">
            <span class="copyright">Copyright &copy; <a href="./">SafeDocx</a> 2017</span>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="footer-social text-center">
              <ul>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
            <div class="footer-link">
              <ul class="pull-right">
                <li><a href="#">Privacy Policy</a>
                </li>
                <li><a href="#">Terms of Use</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>


  <div id="loader">
    <div class="spinner">
      <div class="dot1"></div>
      <div class="dot2"></div>
    </div>
  </div>



  <!-- jQuery Version 2.1.1 -->
  <script src="js/jquery-2.1.1.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="asset/js/bootstrap.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/classie.js"></script>
  <script src="js/count-to.js"></script>
  <script src="js/custom.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/cbpAnimatedHeader.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.fitvids.js"></script>
  <script src="js/styleswitcher.js"></script>
  <script src="js/lobibox.min.js"></script>
  <script src="js/ajaxscripts.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>


  <!-- Custom Theme JavaScript -->
  <script src="js/script.js"></script>

</body>

</html>
