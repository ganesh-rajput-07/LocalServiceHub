<?php
include('../includes/connect.php');
if(isset($_POST['insert_Shop']))
{
    $shop_title = $_POST['shop_title'];

    // Select data from database
    $select_query = "SELECT * FROM shopname WHERE shop_title = '$shop_title'";
    $result_select = mysqli_query($con, $select_query);
    if (!$result_select) {
        die('Error: ' . mysqli_error($con)); // Add error handling
    }
    
    $number = mysqli_num_rows($result_select);
    if($number > 0)
    {
        echo "<script>alert('This Shop Name already exists in the database')</script>";
    }
    else {
        // Insert data into database
        $insert_query = "INSERT INTO shopname (shop_title) VALUES ('$shop_title')";
        $result = mysqli_query($con, $insert_query);
        if (!$result) {
            die('Error: ' . mysqli_error($con)); // Add error handling
        }
        else {
            echo "<script>alert('Shop has been Added Successfully')</script>";
        }
    }
}
?>

<h2 class="text-center">Add Shop_Name</h2>

<form action="" method="post"class="mb-2">
    
   <div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="shop_title" placeholder="Add Shopname" aria-label="Shopname" aria-describedby="basic-addon1">

    </div>

    <div class="input-group w-10 mb-2 m-auto">
<input type="submit" class="bg-info border-0 p-2 my-3" name="insert_Shop" value="Add Shopname">

<!--<button class="bg-info p-2 my-3 border-0">Add Shop Name</button>-->
    </div>
</form>
