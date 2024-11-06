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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--css file-->
  <link rel="stylesheet" href="style.css">
  <style>
    body{
      overflow-x: hidden;
     
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
.card {
    position: relative;
    height: 400px;
    width: 100%;
    margin: 10px 0;
    perspective: 1200px;
    transition: ease all 2.3s;
    overflow: hidden;
}

.card-inner {
    position: relative;
    height: 100%;
    width: 100%;
    transition: transform 1.2s ease;
    transform-style: preserve-3d;
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
</head>
<body>
<!--navbar-->
<div class="container-fluid p-0">
    
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
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_service">
      </form>
    </div>
  </div>
</nav>
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
<?php
cart();
?>
<!--third child-->

<div class="bg-light">
    <h3 class="text-center">Service</h3>
    <p class="text-center">"Connecting Communities, One Service at a Time."</p>
</div>

<!--fourth child-->

<div class="row px-3">
    <div class="col-md-10">
     <!--service-->
    <div class="row">
      
<!--fetching service-->
    <?php
    // calling function
    get_all_sevice();
     get_uniqe_categorires();
     get_uniqe_shopname();
    ?>

        

<!--row end-->
</div>
<!--col end-->
         <!--sidenav-->

    </div>

    <div class="col-md-2 bg-secondary p-0">
        <!--shop name-->

       <ul class="navbar-nav me-auto text-center">
        <li class="nav-iteam bg-info">
            <a href="#" class="nav-link text-light"><h4>Shop Name</h4></a>
        </li>

        <?php
    getshopname();
?>





        
       </ul>
       <!--category-->


       <ul class="navbar-nav me-auto text-center">
        <li class="nav-iteam bg-info">
            <a href="#" class="nav-link text-light"><h4>categories</h4></a>
        </li>
        <?php
    getcategory();
?>

       </ul>



       
        </div>
</div>
<!--last child-->
<?php
include("./includes/footer.php")
?>
</div>

    <!--javascript-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>