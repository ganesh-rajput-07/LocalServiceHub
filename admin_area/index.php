

<?php
include('../includes/connect.php');
include('../function/comman_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Provider</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
    <!--css file-->
    <!--css-->
<link rel="stylesheet" href="../style.css">
<style>
    .Admin_image{
        width: 100px;
        object-fit: contain;
    }
    .footer{
       position: absolute;
       bottom: 0;
       
    }
    .service_img{
        width: 200px;
        object-fit: contain;
    }
    
</style>
</head>
<body>
<!--navbar-->
<div class="container-fluid p-0">
    <!--first child-->

    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../image/logo.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg">
           <ul class="navbar-nav">
            <li class="nav-item">
              <?php
            if(!isset($_SESSION['admin_name']))
        {
           echo "<li class='nav-item'>
           <a class='nav-link' href='#'>Welcome Guest</a>
         </li>  ";
        }
        else{
         echo "<li class='nav-item'>
           <a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']."</a>
         </li> "; 
        }
        ?>
            </li>
           </ul>
        </nav>
       
        </div>
    </nav>
     <!--Second child-->
     <div class="bg-light">
            <h3 class="text-center p2">Manage Details</h3>
        </div>

        <!--third child-->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                   <ul>
                   <?php
        $admin_name=$_SESSION['admin_name'];
        $admin_image="Select * from `admin_table` where admin_name='$admin_name'";
        $admin_image=mysqli_query($con,$admin_image);
        $row_image=mysqli_fetch_array($admin_image);
        $admin_image=$row_image['admin_image'];
        echo "<li class='nav-item'>
        <img src='./admin_images/$admin_image' class='Admin_image'>
      </li>";
        ?>
                   </ul>
                   <p class="text-light text-center"><?php echo $_SESSION['admin_name'] ?></p>
                </div>

             <div class="button text-center">
            <button class="my-3"><a href="insert_service.php" class="nav-link text-light bg-info my-1">Add Service</a></button>
            <button><a href="index.php?view_service" class="nav-link text-light bg-info my-1">View Service</a></button>
            <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Add Categories</a></button>
            <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
            <button><a href="index.php?insert_shopname" class="nav-link text-light bg-info my-1">Add Shop Name</a></button>
            <button><a href="index.php?view_shop" class="nav-link text-light bg-info my-1">View Shop</a></button>
            <button><a href="index.php?list_bookings" class="nav-link text-light bg-info my-1">All Orders</a></button>
            <button><a href="index.php?list_payment" class="nav-link text-light bg-info my-1">All Payments</a></button>
            <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List User</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
             </div>   



    </div>
</div>

<!--fourth child-->

<div class="container my-4">
    <?php
              if(isset($_GET['insert_category'])) 
              {
                include('add_categories.php');
              }
              if(isset($_GET['insert_shopname'])) 
              {
                include('add_shopname.php');
              }
              if(isset($_GET['view_service'])) 
              {
                include('view_service.php');
              }
              if(isset($_GET['edit_service'])) 
              {
                include('edit_service.php');
              }
              if(isset($_GET['delete_service'])) 
              {
                include('delete_service.php');
              }
              if(isset($_GET['view_categories'])) 
              {
                include('view_categories.php');
              }
              if(isset($_GET['view_shop'])) 
              {
                include('view_shop.php');
              }
              if(isset($_GET['edit_category'])) 
              {
                include('edit_category.php');
              }
              if(isset($_GET['delete_category'])) 
              {
                include('delete_category.php');
              }
              if(isset($_GET['edit_shop'])) 
              {
                include('edit_shop.php');
              }
              if(isset($_GET['delete_shop'])) 
              {
                include('delete_shop.php');
              }
              if(isset($_GET['list_bookings'])) 
              {
                include('list_bookings.php');
              }
              if(isset($_GET['delete_Booking'])) 
              {
                include('delete_Booking.php');
              }
              if(isset($_GET['list_payment'])) 
              {
                include('list_payment.php');
              }
              if(isset($_GET['delete_payment'])) 
              {
                include('delete_payment.php');
              }
              if(isset($_GET['list_users'])) 
              {
                include('list_users.php');
              }


    ?>
</div>
<!--last child-->



<?php
include("../includes/footer.php")
?>
</div>
     <!--bootstrap js link-->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>