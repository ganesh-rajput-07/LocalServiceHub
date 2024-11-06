<!--connect php-->

<?php
include('includes/connect.php');
include('./function/comman_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Service Hub</title>
    <!--css-->
    
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@10/swiper-bundle.min.css"
    />
   
   <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="logo1.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--css file-->
  <link rel="stylesheet" href="style.css">
  
  <style>
    body{
      overflow-x: hidden;
     
    }
    .navbar{
      overflow: hidden;
     
    }
    .logo{
      width: auto;
      padding-bottom: 25px;
    }
    .scroll-container {
  width: 100%; /* Full width */
  overflow: hidden; /* Hide the overflow */
  white-space: nowrap; /* Prevent text wrapping */
}

.scroll-text {
  display: inline-block;
  padding-left: 100%; /* Start completely off the right */
  animation: scroll 20s linear infinite; /* Scroll infinitely */
}


@keyframes scroll {
  0% {
    transform: translateX(100%); /* Start from off the right */
  }
  100% {
    transform: translateX(-100%); /* Move completely off the left */
  }
}
    @keyframes appear {
    from{
        opacity: 0;
        scale: 0;
       

    }
    to{
        opacity: 1;
        scale: 1;
      
    }
}


/* view more 
 */
 /* Custom Wrapper */
 .custom-card-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(135deg, #3b82f6, #6a5acd);
  }

  /* Card Styling */
  .custom-card {
      position: relative;
      width: 100%;
      max-width: 300px;
      padding: 20px;
      border-radius: 20px;
      background: linear-gradient(135deg, #3b82f6, #6a5acd);
      box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      color: #fff;
      text-align: center;
      overflow: hidden; /* Hide images that go outside the card */
  }

  /* Image Slider inside Card */
  .custom-card-swiper-container {
      width: 100%;
      padding: 10px 0;
  }

  .custom-card-swiper-slide {
      display: flex;
      justify-content: center;
      transition: opacity 0.5s ease; /* Smooth fade effect */
  }

  /* Image Styling */
  .custom-card img {
      width: 90%;
      height: auto;
      object-fit: cover;
      border: 2px solid #fff;
      border-radius: 15px;
  }

  /* Card Content */
  .custom-card h5 {
      font-size: 1.3rem;
      margin: 15px 0;
  }

  .custom-card p {
      font-size: 1rem;
      margin-bottom: 10px;
  }

  .custom-card .custom-card-btn,
  .custom-card .custom-card-view-more {
      padding: 8px 16px;
      background: rgba(255, 255, 255, 0.25);
      border-radius: 50px;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      transition: 0.3s;
  }

  .custom-card .custom-card-btn:hover,
  .custom-card .custom-card-view-more:hover {
      background: rgba(255, 255, 255, 0.4);
  }

  /* Responsive Styles */
  @media (max-width: 768px) {
      .custom-card-swiper-container {
          overflow: hidden; /* Ensure overflow is hidden on small screens */
      }

      /* On smaller screens, show only one image at a time */
      .custom-card-swiper-container .custom-card-swiper-slide {
          opacity: 1; /* Ensure full opacity on mobile view */
      }
  }





.card {
    opacity: 0;
    transform: scale(0);
    transition: opacity 0.5s, transform 0.5s;
    position: relative;
    height: 400px;
    width: 100%;
    margin: 10px 0;
    perspective: 1200px;
    transition: ease all 2.3s;
    overflow: hidden;
    box-shadow: 20px 20px 60px #00000041, inset -20px -20px 60px #ffffff40;
}
.card.visible {
    opacity: 1;
    transform: scale(1);
}
.card-inner {
    position: relative;
    height: 100%;
    width: 100%;
    transition: transform 1.2s ease;
    transform-style: preserve-3d;
    box-shadow: 20px 20px 60px #00000041, inset -20px -20px 60px #ffffff40;
}

/* Flip the inner content on hover */
.card:hover .card-inner {
    transform: rotateY(180deg);
}

.card-front{
    position: absolute;
    height: 100%;
    width: 100%;
    backface-visibility: hidden;
    transition: opacity 0.5s ease;
    box-shadow: 20px 20px 60px #00000041, inset -20px -20px 60px #ffffff40;
}
.card-back {
  backface-visibility: visible;
}

/* Front of the card (image and title) */
.card-front {
    background-color: black;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    box-shadow: 20px 20px 60px #00000041, inset -20px -20px 60px #ffffff40;
}

.card-front .card-img-top {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.card-front h5 {
    position: absolute;
    bottom: 10px;
    left: 10px;
    color: white;
    font-weight: 600;
    font-size: 1.8em;
    z-index: 2;
    background: rgba(0, 0, 0, 0.8);
    padding: 5px 10px;
    margin: 0;
    width: calc(100% - 20px);
    text-align: center;
}


/*slider developer image*/ 
 /* Custom wrapper styling */
 .custom-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    /* min-height: 100vh;*/
    background: linear-gradient(135deg, #3b82f6, #6a5acd); 
}
.headingh{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 30vh;
}
.type{
  color: #dbd56e;
  background: -webkit-linear-gradient(25deg, #003b92, #333);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-size: 2.6rem;
  font-weight: 500;
  overflow: hidden;
  white-space: nowrap;
  border-right: 2px solid;
  animation: type 5s steps(30, end) 1s infinite normal both, cursor 0.6s step-end infinite;
  /* animation: type 3s steps(90) 1s infinite normal both, cursor 5s step-end infinite; */
  position: relative;
}
@keyframes type {
  from {
    width: 0;
  }

  to {
    width: 100%;
  }
}

@keyframes cursor {
  50% {
    border-color: transparent;
  }
}
.unique-swiper-container {
    width: 90%;
    max-width: 600px;
}

.unique-swiper-slide {
    display: flex;
    justify-content: center;
}

/* Glassmorphism Effect */
.unique-cardslider {
  margin-top: 45px;
    position: relative;
    width: 100%;
    max-width: 280px;
    padding: 20px;
    border-radius: 20px;
    background: linear-gradient(135deg, #3b82f6, #6a5acd);
    box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.18);
    color: black;
    text-align: center;
}

/* Image Container with Bracket */
.unique-cardslider .unique-image-container {
    position: relative;
    margin-bottom: 15px;
}

.unique-cardslider .unique-image-container img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff;
}

.unique-cardslider h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.unique-cardslider p {
    font-size: 1rem;
    margin-bottom: 15px;
}

.unique-cardslider .unique-view-more {
    padding: 8px 16px;
    background: linear-gradient(135deg, #3b82f6, #6a5acd);
    border-radius: 50px;
    color: black;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.unique-cardslider .unique-view-more:hover {
    background: linear-gradient(135deg, #3b82f6, #6a5acd);
}

.swipper-btn-ajbj{
    display: flex;
    justify-content: space-between;
    align-items: center;
margin-bottom: 25px;
}


/* Back of the card (details) */
.card-back {
    background-color: #232323;
    color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transform: rotateY(180deg);
    padding: 20px;
    opacity: 0;
    visibility: visible; /* Initially not visible */
    transition: opacity 0.5s ease, visibility 0s 0.5s; /* Ensures visibility change happens after opacity */
    box-shadow: 20px 20px 60px #00000041, inset -20px -20px 60px #ffffff40;
}

.card:hover .card-back {
    opacity: 1;
    visibility: visible; /* Back becomes visible on hover */
}

.card-back .card-text {
    font-weight: 200;
    margin: 10px 0;
    font-size: 1.1em;
    color: white;
}
.card:hover h5{
visibility: hidden;
}
a.btn {
    transition: ease cubic-bezier(00.5s) 0.5s;
    background: transparent;
    border: 1px solid white;
    font-weight: 200;
    font-size: 1.1em;
    color: white;
    padding: 10px 20px;
    outline: none;
    text-decoration: none;
    margin-top: 10px;
}

a.btn:hover {
    background-color: white;
    color: black;
}

/* Optional styling for the card
.card {
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    border-radius: 8px;
} */



    /* .card{
    animation: appear  linear; 
     animation-timeline: view(100);
    /* animation-range: entry 70% cover 40%; */
     
     
    /* .card-img-top{
     
            width: 383px;
            height: 350px;
            border-radius: 5px 5px 0px 0px;
    }
    .card-body{
      height: 360px;
    }
    .card:hover{
      transform: scale(1);
            margin: 15px;
            box-shadow: 17px 17px 34px aqua;
            
    } */
    
  </style>
     <!--
    Basic Page Needs
    ==================================================
    -->
    <meta charset="utf-8">
   <title>  Logicraft HTML5 Template</title>
   <!--
    Mobile Specific Metas
    ==================================================
    -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <!--
    CSS
    ==================================================
    -->
   <!-- Bootstrap-->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Animation-->
   <link rel="stylesheet" href="css/animate.css">
   <!-- Morris CSS -->
   <link rel="stylesheet" href="css/morris.css">
   <!-- FontAwesome-->
   <link rel="stylesheet" href="css/font-awesome.min.css">
   <!-- Icon font-->
   <link rel="stylesheet" href="css/icon-font.css">
   <!-- Owl Carousel-->
   <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <!-- Owl Theme -->
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <!-- Colorbox-->
   <link rel="stylesheet" href="css/colorbox.css">
   <!-- Template styles-->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive styles-->
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="index.css">
   <link rel="stylesheet" href="">
   <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file.-->
   <!--if lt IE 9
    script(src='js/html5shiv.js')
    script(src='js/respond.min.js')-->
</head>
<body>
<!--navbar-->

<div class="container-fluid p-0">
<div class="navb">
    <!--first child-->
  <nav class="navbar navbar-expand-lg bg-info">
  <div class="container-fluid">
    <img src="./image/logo.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php">Service</a>
        </li>

        <?php
         if(isset($_SESSION['username']))
         {
          echo  " <li class='nav-item'>
          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
        </li>";
         }
         else
         {
         echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
        </li>";
         }
        ?>
       
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="booking.php">Booking <i class="fa-solid fa-person"></i><sup><?php cart_item(); ?></sup></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: <?php total_booking_price(); ?>/-</a>
        </li>
       
      </ul>

      <form class="d-flex"  action="search.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
    <!--    <button class="btn btn-outline-light" type="submit">Search</button>  -->
        <input type="submit" value="Search" class="btn btn-outline-light"  name="search_data_service">
      </form>
    </div>
  </div>
        </div>
</nav>

<!--calling cart function-->
<?php
cart();
?>
<!--second child-->

 <nav class="navbar navbar-expand-lg navbar-bright bg-secondary">
    <ul class="navbar-nav me-auto">
    
        <?php
        // welcome guest
        if(!isset($_SESSION['username']))
        {
           echo "<li class='nav-item'>
           <a class='nav-link' href='#'>Welcome Guest</a>
         </li>  ";
        }
        else{
         echo "<li class='nav-item'>
           <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
         </li> "; 
        }
         // login and logout
             if(!isset($_SESSION['username']))
             {
                echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/user_login.php'>Login</a>
              </li> "; 
             }
             else{
              echo "<li class='nav-item'>
                <a class='nav-link' href='./users_area/user_logout.php'>Logout</a>
              </li> "; 
             }
       ?>
    </ul>
 
</nav>
  

<!-- slider-->
<div class="carousel slide" id="main-slide" data-ride="carousel">
         <!-- Indicators-->
         <ol class="carousel-indicators visible-lg visible-md">
            <li class="active" data-target="#main-slide" data-slide-to="0"></li>
            <li data-target="#main-slide" data-slide-to="1"></li>
            <li data-target="#main-slide" data-slide-to="2"></li>
         </ol>
         <!-- Indicators end-->
         <!-- Carousel inner-->
         <div class="carousel-inner">
            <div class="carousel-item active" style="background-image:url(image3.jpg);">
               <div class="container">
                  <div class="slider-content text-left">
                     <div class="col-md-12">
                        <h2 class="slide-title title-light" style="overflow: hidden;">You have needs</h2>
                        <h3 class="slide-sub-title" style="overflow: hidden;">We Have the Solutions</h3>
                        <p class="slider-description lead" style="overflow: hidden;">We will deal with your failure that determines <br/> how you achieve success.</p>
                        <p><a class="slider btn btn-primary" href="#">Know More</a><a class="slider btn btn-border" href="#" style="color:black; background-color:white">View Services</a></p>
                     </div>
                     <!-- Col end-->
                  </div>
                  <!-- Slider content end-->
               </div>
               <!-- Container end-->
            </div>
            <!-- Carousel item 1 end-->
            <div class="carousel-item" style="background-image:url(image1.jpg);">
               <div class="container">
                  <div class="slider-content text-center">
                     <div class="col-md-12">
                        <h2 class="slide-title title-light" style="overflow: hidden;">We deal with logistics</h2>
                        <h3 class="slide-sub-title" style="overflow: hidden;">You focus on your Business</h3>
                        <p class="slider-description lead" style="overflow: hidden;">We will deal with your failure that determines </p>
                     
                     </div>
                     <!-- Col end-->
                  </div>
                  <!-- Slider content end-->
               </div>
               <!-- Container end-->
            </div>
            <!-- Carousel item 2 end-->
            <div class="carousel-item" style="background-image:url(image2.webp);">
               <div class="container">
                  <div class="slider-content text-right">
                     <div class="col-md-12">
                        <h2 class="slide-title title-light" style="overflow: hidden;">17 years of experience</h2>
                        <h3 class="slide-sub-title" style="overflow: hidden;">Strong Distribution Network</h3>
                        <p><a class="slider btn btn-primary" href="#">View Services</a></p>
                     </div>
                     <!-- Col end-->
                  </div>
                  <!-- Slider content end-->
               </div>
               <!-- Container end-->
            </div>
            <!-- Carousel item 3 end-->
         </div>
         <!-- Carousel inner end-->
         <!-- Controllers--><a class="left carousel-control carousel-control-prev" href="#main-slide" data-slide="prev"><span><i class="fa fa-angle-left"></i></span></a>
         <a class="right carousel-control carousel-control-next" href="#main-slide" data-slide="next"><span><i class="fa fa-angle-right"></i></span></a>
      </div>

<!--third child-->

<div class="bg-light">
    <h3 class="text-center">Service</h3>
    <div class="scroll-container">
        <p class="scroll-text">"Connecting Communities, One Service at a Time.     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Connecting Communities, One Service at a Time. " 
      </div>
</div>

<!--fourth child-->
<div class="headingh">
  <div>
 <h1 class="type">Services Area .</h1>
 </div>
</div>
<div class="row px-3">
    <div class="col-md-12">
     <!--service-->
    <div class="row">
      
<!--fetching service-->
    <?php
    // calling function
     getservice();
     get_uniqe_categorires();
     get_uniqe_shopname();
    // $ip = getIPAddress();  
     //echo 'User Real IP Address - '.$ip;  
    ?>

        

<!--row end-->
</div>
<!--col end-->
         <!--sidenav-->
<!-- Swiper -->
<div class="headingh">
  <div>
 <h1 class="type">Developer Area .</h1>
 </div>
</div>
         <div class="custom-wrapper">
       
           <div class="unique-swiper-container">
            <div class="swiper-wrapper">
                <!-- unique-cardslider 1 -->
                <div class="unique-swiper-slide swiper-slide">
                    <div class="unique-cardslider">
                        <div class="unique-image-container">
                            <img src="developer image/ayan.png" alt="unique-cardslider Image">
                        </div>
                        <h2>Ayan Memon</h2>
                        <p>Leader</p>
                        <a href="#" class="unique-view-more">View More</a>
                    </div>
                </div>
                <!-- unique-cardslider 2 -->
                <div class="unique-swiper-slide swiper-slide">
                    <div class="unique-cardslider">
                        <div class="unique-image-container">
                            <img src="developer image/paresh.webp" alt="unique-cardslider Image">
                        </div>
                        <h2>Paresh Patil</h2>
                        <p>Primary Web Developer</p>
                        <a href="https://82pareshpatil.github.io/Paresh-Patil/" class="unique-view-more">View More</a>
                    </div>
                </div>
                <!-- unique-cardslider 3 -->
                <div class="unique-swiper-slide swiper-slide">
                    <div class="unique-cardslider">
                        <div class="unique-image-container">
                            <img src="developer image/ganesh.jpg" alt="unique-cardslider Image">
                        </div>
                        <h2>Ganesh Rajput</h2>
                        <p>Team Member</p>
                        <a href="#" class="unique-view-more">View More</a>
                    </div>
                </div>
                <!-- unique-cardslider 4 -->
                <div class="unique-swiper-slide swiper-slide">
                    <div class="unique-cardslider">
                        <div class="unique-image-container">
                            <img src="https://via.placeholder.com/80" alt="unique-cardslider Image">
                        </div>
                        <h2>Yashwant Patil</h2>
                        <p>Team Member</p>
                        <a href="#" class="unique-view-more">View More</a>
                    </div>
                </div>
            </div>

            <!-- Add Pagination and Navigation Buttons -->
            <div class="swiper-pagination" style="position: static;"></div>
            <div class="swipper-btn-ajbj">
            <div class="swiper-button-next" style="position: static;"></div>
            <div class="swiper-button-prev" style="position: static;"></div>
            </div>
        </div>
    </div>

    <!-- SwiperJS -->
<!--last child-->
<!--include footer-->
<?php
include("./includes/footer.php")
?>
</div>

    <!--javascript-->
    <script src="https://unpkg.com/swiper@10/swiper-bundle.min.js"></script>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script>
  const cards = document.querySelectorAll('.card');

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
        }
    });
});

cards.forEach(card => {
    observer.observe(card);
});
  


</script>

<script type="text/javascript" src="js/jquery.js"></script>
<script src="https://unpkg.com/swiper@10/swiper-bundle.min.js"></script>
       <script src="viewmore.js"></script>
       
       <!-- Bootstrap jQuery-->
       <script type="text/javascript" src="js/bootstrap.min.js"></script>
       <!-- Owl Carousel-->
       <script type="text/javascript" src="js/owl.carousel.min.js"></script>
       <!-- Counter-->
       <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
       <!-- Waypoints-->
       <script type="text/javascript" src="js/waypoints.min.js"></script>
       <!-- Color box-->
       <script type="text/javascript" src="js/jquery.colorbox.js"></script>
        
         
       <!-- Template custom-->
       <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>