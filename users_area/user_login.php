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
    <title>User Login</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap");
        * {
            margin: 0;
            padding: 5px;
            box-sizing: border-box;
            font-family: "Quicksand", sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url(image1.jpg);
            
            width: 100%;
            overflow: hidden;
        }
        .ring {
            position: relative;
            width: 500px;
            height: 500px;
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
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes animate2 {
            0% { transform: rotate(360deg); }
            100% { transform: rotate(0deg); }
        }
        .login {
            position: absolute;
            width: 300px;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 20px;
        }
        .login h2 {
            font-size: 2em;
            color: #fff;
        }
        .login .inputBx {
            position: relative;
            width: 100%;
        }
        .login .inputBx input {
            width: 100%;
            padding: 12px 20px;
            background: transparent;
            border: 2px solid #fff;
            border-radius: 40px;
            font-size: 1.2em;
            color: #fff;
            outline: none;
        }
        .login .inputBx input[type="submit"] {
            background: linear-gradient(45deg, #f835ff, #666661);
            border: none;
            cursor: pointer;
        }
        .login .inputBx input::placeholder {
            color: rgba(255, 255, 255, 0.75);
        }
        .login .links {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 0 20px;
        }
        .login .links a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="ring">
        <i style="--clr:#9500ff;"></i>
        <i style="--clr:#444041;"></i>
        <i style="--clr:#26c7bf;"></i>
        <div class="login">
            <h2>Login</h2>
            <form action="" method="post">
                <div class="inputBx">
                    <input type="text" name="user_username" placeholder="Username" required>
                </div>
                <div class="inputBx">
                    <input type="password" name="user_password" placeholder="Password" required>
                </div>
                <div class="inputBx">
                    <input type="submit" value="Sign in" name="user_login">
                </div>
                <div class="links">    
                    <a href="user_registration.php">Signup</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['user_login'])) {
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE user_name='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    $select_query_cart = "SELECT * FROM `card_details` WHERE ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_count > 0) {
        $_SESSION['username'] = $user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            if ($row_count == 1 && $row_count_cart == 0) {
                echo "<script>alert('Login Successful!');</script>"; 
                echo "<script>window.open('profile.php', '_self');</script>";
            } else {
                echo "<script>alert('Login Successful!');</script>"; 
                echo "<script>window.open('payment.php', '_self');</script>";
            }
        } else {
            echo "<script>alert('Password does not match!');</script>";
        }
    } else {
        echo "<script>alert('User Not Found. Register First!');</script>";
    }
}
?>
