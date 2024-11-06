<?php 
include('../includes/connect.php');
include('../function/comman_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <style>
    body{
        overflow-x: hidden;
    }
   
 </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
           <img src="../image/standing white man in glasses and blue cap.jpg" alt="Admin Login Image" class="img-fluid"> 
              
         <!--     <div class="visme_d" data-title="Untitled Project" data-url="g7qj7k9w-untitled-project?fullPage=true" data-domain="forms" data-full-page="true" data-min-height="100vh" data-form-id="56570"></div><script src="https://static-bundles.visme.co/forms/vismeforms-embed.js"></script>  -->
            </div>
            <div class="col-lg-6 col-xl-4">
              <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">User_name</label>
                    <input type="text" name="admin_name" id="admin_name" placeholder="Enter Your Name" required="required" class="form-control">
                </div>
                
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" name="admin_password" id="admin_password" placeholder="Enter Your Password" required="required" class="form-control">
                </div>
                
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                    <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="link-danger">Registration</p>
                </div>
              </form>
        </div>
        </div>

    </div>
</body>
</html>


<?php
if(isset($_POST['admin_login']))
{
  $admin_name=$_POST['admin_name'];
  $admin_password=$_POST['admin_password'];

  $select_query="Select * from `admin_table` where admin_name='$admin_name'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);


  // booking item
  
  if($row_count>0)
  {
    $_SESSION['admin_name']=$admin_name;
       if(password_verify($admin_password,$row_data['admin_password']))
       {
        
        if($row_count==1 and $row_count_cart==0) 
        {
          $_SESSION['admin_name']=$admin_name;
          echo "<script>alert('Login Successfuly!')</script>"; 
          echo "<script>window.open('index.php','_self')</script>";
        } 
        else{
          $_SESSION['admin_name']=$admin_name;
          echo "<script>alert('Login Successfuly!')</script>"; 
          echo "<script>window.open('index.php','_self')</script>";
        }
       }
       else{
        echo "<script>alert('Password do not match!')</script>";
       }
  }
  else{
    echo "<script>alert('Admin Not Found.Register First!')</script>";
  }
}
?>