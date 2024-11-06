<?php 
include('../includes/connect.php');
include('../function/comman_function.php');
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
        <h2 class="text-center mb-5">Admin_Registration</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
           <img src="../image/cute boy.jpg" alt="Admin Registration Image" class="img-fluid"> 
              
         <!--     <div class="visme_d" data-title="Untitled Project" data-url="g7qj7k9w-untitled-project?fullPage=true" data-domain="forms" data-full-page="true" data-min-height="100vh" data-form-id="56570"></div><script src="https://static-bundles.visme.co/forms/vismeforms-embed.js"></script>  -->
            </div>
            <div class="col-lg-6 col-xl-4">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">User Name</label>
                    <input type="text" name="admin_name" id="admin_name" placeholder="Enter Your Name" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_email" class="form-label">Email</label>
                    <input type="email" name="admin_email" id="admin_email" placeholder="Enter Your Email id" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                <label for="admin_image" class="form-label">User Image</label>
                <input type="file" id="admin_image" class="form-control"  required="required" name="admin_image">
              </div>
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" name="admin_password" id="admin_password" placeholder="Enter Your Password" required="required" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="confirm_admin_password" class="form-label">Confirm Password</label>
                    <input type="password" name="confirm_admin_password" id="confirm_admin_password" placeholder="Enter Confirm Password" required="required" class="form-control">
                </div>
                <div>
                    <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                    <p class="small fw-bold mt-2 pt-1">Do already you have an account? <a href="admin_login.php" class="link-danger">Login</p>
                </div>
              </form>
        </div>
        </div>

    </div>
</body>
</html>



<!--php code-->
<?php
if(isset($_POST['admin_registration']))
{
  $admin_name=$_POST['admin_name'];
  $admin_email=$_POST['admin_email'];
  $admin_password=$_POST['admin_password'];
  $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
  $confirm_admin_password=$_POST['confirm_admin_password'];
  
  $admin_image=$_FILES['admin_image']['name'];
  $admin_image_tmp=$_FILES['admin_image']['tmp_name'];
  
  //select_query username
   $select_query="Select * from `admin_table` where admin_name='$admin_name'";
   $result=mysqli_query($con,$select_query);
   $rows_count=mysqli_num_rows($result);

   //select_query email
   $select_query1="Select * from `admin_table` where admin_email='$admin_email'";
   $result1=mysqli_query($con,$select_query1);
   $rows_count1=mysqli_num_rows($result1);

   


   if($rows_count>0)
   {
    echo "<script>alert('Adminname Already Exist')</script>";
   }
   else if($rows_count1>0)
   {
    echo "<script>alert('Email-id Already Exist')</script>";
   }
   
   else if($admin_password!=$confirm_admin_password)
   {
    echo "<script>alert('Password And Confirm-Password Do Not Match!')</script>";
   }
   //insert_query
  else{
  move_uploaded_file($admin_image_tmp,"./admin_images/$admin_image");
  $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password,admin_image) values ('$admin_name','$admin_email','$hash_password','$admin_image')";
  $sql_execute=mysqli_query($con,$insert_query);
  if($sql_execute)
  {
    echo "<script>alert('Data inserted Successfully')</script>";
  }
  else{
    die("Connection failed: " . mysqli_connect_error());
  }
}
// selecting cart iteam

}
?>