<?php 
include('../includes/connect.php');
include('../function/comman_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap");
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          font-family: "Quicksand", sans-serif;
        }
        body {
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 100vh;
          background: #111;
          width: 100%;
          overflow: hidden;
        }
        .ring {
          position: relative;
          width: 500px;
          height: 600px;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        .ring i {
          position: absolute;
          inset: 0;
          border: 2px solid #fff;
          transition: 0.5s;
        }
        .ring i:nth-child(1) {
          border-radius: 38% 62% 63% 37% / 41% 44% 56% 59%;
          animation: animate 6s linear infinite;
        }
        .ring i:nth-child(2) {
          border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
          animation: animate 4s linear infinite;
        }
        .ring i:nth-child(3) {
          border-radius: 41% 44% 56% 59%/38% 62% 63% 37%;
          animation: animate2 10s linear infinite;
        }
        .ring:hover i {
          border: 6px solid var(--clr);
          filter: drop-shadow(0 0 20px var(--clr));
        }
        @keyframes animate {
          0% {
            transform: rotate(0deg);
          }
          100% {
            transform: rotate(360deg);
          }
        }
        @keyframes animate2 {
          0% {
            transform: rotate(360deg);
          }
          100% {
            transform: rotate(0deg);
          }
        }
        .register {
          position: absolute;
          width: 300px;
          height: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
          gap: 15px;
        }
        .register h2 {
          font-size: 2em;
          color: #fff;
        }
        .register .inputBx {
          position: relative;
          width: 100%;
        }
        .register .inputBx input, .register .inputBx[type="file"] {
          width: 100%;
          padding: 12px 20px;
          background: transparent;
          border: 2px solid #fff;
          border-radius: 40px;
          font-size: 1.2em;
          color: #fff;
          outline: none;
        }
        .register .inputBx input[type="submit"] {
          width: 100%;
          background: #0078ff;
          background: linear-gradient(45deg, #ff357a, #fff172);
          border: none;
          cursor: pointer;
        }
        .register .inputBx input::placeholder {
          color: rgba(255, 255, 255, 0.75);
        }
        .register .links {
          width: 100%;
          display: flex;
          align-items: center;
          justify-content: center;
          gap: 10px;
        }
        .register .links a {
          color: #fff;
          text-decoration: none;
        }
        .register .inputBx{
            padding-bottom: 15px;
        }
       
    </style>
</head>
<body>
    <div class="ring">
        <i style="--clr:#00ff0a;"></i>
        <i style="--clr:#ff0057;"></i>
        <i style="--clr:#fffd44;"></i>
        <div class="register">
            <h2>Register</h2>
            <form action="" method="post" enctype="multipart/form-data" style="padding-bottom: 15px;">
                <div class="inputBx">
                    <input type="text" placeholder="Username" name="user_username" required="required">
                </div>
                <div class="inputBx">
                    <input type="email" placeholder="Email" name="user_email" required="required">
                </div>
                <div class="inputBx">
                    <input type="file" name="user_image" required="required">
                </div>
                <div class="inputBx">
                    <input type="password" placeholder="Password" name="user_password" required="required">
                </div>
                <div class="inputBx">
                    <input type="password" placeholder="Confirm Password" name="confirm_user_password" required="required">
                </div>
                <div class="inputBx">
                    <input type="text" placeholder="Address" name="user_address" required="required">
                </div>
                <div class="inputBx">
                    <input type="text" placeholder="Contact" name="user_contact" required="required">
                </div>
                <div class="inputBx">
                    <input type="submit" value="Register" name="user_register">
                </div>
                <div class="links">
                    <a href="user_login.php">Already have an account? Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['user_register'])) {
  $user_username = $_POST['user_username'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
  $confirm_user_password = $_POST['confirm_user_password'];
  $user_address = $_POST['user_address'];
  $user_contact = $_POST['user_contact'];
  $user_image = $_FILES['user_image']['name'];
  $user_image_tmp = $_FILES['user_image']['tmp_name'];
  $user_ip = getIPAddress();

  $select_query = "SELECT * FROM `user_table` WHERE user_name='$user_username'";
  $result = mysqli_query($con, $select_query);
  $rows_count = mysqli_num_rows($result);

  $select_query1 = "SELECT * FROM `user_table` WHERE user_email='$user_email'";
  $result1 = mysqli_query($con, $select_query1);
  $rows_count1 = mysqli_num_rows($result1);

  $select_query2 = "SELECT * FROM `user_table` WHERE user_mobile='$user_contact'";
  $result2 = mysqli_query($con, $select_query2);
  $rows_count2 = mysqli_num_rows($result2);

  if ($rows_count > 0) {
    echo "<script>alert('Username Already Exists')</script>";
  } else if ($rows_count1 > 0) {
    echo "<script>alert('Email Already Exists')</script>";
  } else if ($rows_count2 > 0) {
    echo "<script>alert('Mobile Number Already Exists')</script>";
  } else if ($user_password != $confirm_user_password) {
    echo "<script>alert('Passwords Do Not Match!')</script>";
  } else {
    move_uploaded_file($user_image_tmp, "./user_images/$user_image");
    $insert_query = "INSERT INTO `user_table` (user_name, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
    $sql_execute = mysqli_query($con, $insert_query);
    if ($sql_execute) {
      echo "<script>alert('Registration Successful')</script>";
    } else {
      die("Connection failed: " . mysqli_connect_error());
    }
  }

  $select_cart_items = "SELECT * FROM `card_details` WHERE ip_address='$user_ip'";
  $result_cart = mysqli_query($con, $select_cart_items);
  $rows_count = mysqli_num_rows($result_cart);
  if ($rows_count > 0) {
    $_SESSION['username'] = $user_username;
    echo "<script>window.open('checkout.php','_self')</script>";
  } else {
    echo "<script>window.open('../index.php','_self')</script>";
  }
}
?>
