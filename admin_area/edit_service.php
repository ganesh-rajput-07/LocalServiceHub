<?php
if(isset($_GET['edit_service']))
{
  

    $edit_id = mysqli_real_escape_string($con, $_GET['edit_service']);

    $get_data = "SELECT * FROM `service` WHERE service_id=$edit_id";
    $result = mysqli_query($con, $get_data);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        $service_title = $row['service_title'];
        $service_desc = $row['description'];
        $service_keywords = $row['service_keywords'];
        $service_image1 = $row['service_image1'];
        $service_image2 = $row['service_image2'];
        $service_image3 = $row['service_image3'];
        $service_cost = $row['service_cost'];
        $category_id = $row['category_id'];
        $shop_id = $row['shop_id'];

        // Fetching category name
        $select_category = "SELECT * FROM `categories` WHERE category_id=$category_id";
        $result_cat = mysqli_query($con, $select_category);
        $row_cat = mysqli_fetch_assoc($result_cat);
        $category_title = $row_cat['category_title'];

        // Fetching shop name
        $select_shopname = "SELECT * FROM `shopname` WHERE shop_id=$shop_id";
        $result_shop = mysqli_query($con, $select_shopname);
        $row_shop = mysqli_fetch_assoc($result_shop);
        $shop_title = $row_shop['shop_title'];
    }
    else
    {
        echo "<script>alert('Service not found!')</script>";
        // Redirect to a page where you handle this error
        echo "<script>window.location.href = 'error_page.php';</script>";
        exit; // Exit the script
    }
}
else
{
    // Redirect to a page where you handle this error
    echo "<script>window.location.href = 'error_page.php';</script>";
    exit; // Exit the script
}
?>


<style>
    .service_img1{
        width: 200px;
        object-fit: contain;
    }
   /* .box:hover{
        border:solid black 2px;
     margin: auto;
        background-color:darkgray;
    }  */
</style>
<div class="box">
<div class="container mt-5">
    <h1 class="text-center">Edit Service</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="service_title" class="form-label">Service Title</label>
            <input type="text" id="service_title" name="service_title" class="form-control" required="required" value="<?php echo $service_title ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="service_desc" class="form-label">Service Description</label>
            <input type="text" id="service_desc" name="service_desc" class="form-control" required="required" value="<?php echo $service_desc ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="service_keywords" class="form-label">Service Keywords</label>
            <input type="text" id="service_keywords" name="service_keywords" class="form-control" required="required" value="<?php echo $service_keywords ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="service_category" class="form-label">Categories</label>
            <select name="service_category" class="form-select">
                <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                <?php
                  $select_category_all="Select * from `categories`";
                  $result_cat_all=mysqli_query($con,$select_category_all);
                while($row_cat_all=mysqli_fetch_assoc($result_cat_all))
                {
                    $category_title=$row_cat_all['category_title'];
                    $category_id=$row_cat_all['category_id'];
                    echo " <option value='$category_id'>$category_title</option>";
                };
                 
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="Shop_Name" class="form-label">Shop Name</label>
            <select name="Shop_Name" class="form-select">
                <option value="<?php echo $shop_title ?>"><?php echo $shop_title ?></option>
                <?php
                  $select_shopname_all="Select * from `shopname`";
                  $result_shop_all=mysqli_query($con,$select_shopname_all);
                 while($row_shop_all=mysqli_fetch_assoc($result_shop_all))
                  {
                  $shop_title=$row_shop_all['shop_title'];
                  $shop_id=$row_shop_all['shop_id'];
                  echo " <option value='$shop_id'>$shop_title</option>";
                  };
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="service_image1" class="form-label">Service Image1</label>
            <div class="d-flex">
            <input type="file" id="service_image1" name="service_image1" class="form-control w-90 m-auto" required="required" value="<?php echo $service_image1 ?>">
            <img src="./service_images/<?php echo $service_image1 ?>" alt="" class="service_img1" >
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="service_image2" class="form-label">Service Image2</label>
            <div class="d-flex">
            <input type="file" id="service_image2" name="service_image2" class="form-control w-90 m-auto" required="required" value="<?php echo $service_image2 ?>">
            <img src="./service_images/<?php echo $service_image2 ?>" alt="" class="service_img1">
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="service_image3" class="form-label">Service Image3</label>
            <div class="d-flex">
            <input type="file" id="service_image1" name="service_image3" class="form-control w-90 m-auto" required="required" value="<?php echo $service_image3 ?>">
            <img src="./service_images/<?php echo $service_image3 ?>" alt="" class="service_img1">
        </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="service_cost" class="form-label">Service Cost</label>
            <input type="text" id="service_cost" name="service_cost" class="form-control" required="required" value="<?php echo $service_cost ?>">
        </div>
        <div class="text-center m-auto">
           <input type="submit" name="edit_service" value="Update Service" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>
</div>

<!-- edit service-->
<?php
if(isset($_POST['edit_service']))
{
    

    // Sanitize input data
    $service_title = mysqli_real_escape_string($con, $_POST['service_title']);
    $service_desc = mysqli_real_escape_string($con, $_POST['service_desc']);
    $service_keywords = mysqli_real_escape_string($con, $_POST['service_keywords']);
    $service_category = mysqli_real_escape_string($con, $_POST['service_category']);
    $shop_name = mysqli_real_escape_string($con, $_POST['Shop_Name']); // Use consistent variable naming convention
    $service_cost = mysqli_real_escape_string($con, $_POST['service_cost']);

    // Check if any field is empty
    if(empty($service_title) || empty($service_desc) || empty($service_keywords) || empty($service_category) || empty($shop_name) || empty($service_cost))
    {
        echo "<script>alert('Please fill all the fields!')</script>";
    }
    else
    {
        // File upload handling
        $service_image1 = $_FILES['service_image1']['name'];
        $service_image2 = $_FILES['service_image2']['name'];
        $service_image3 = $_FILES['service_image3']['name'];

        $tmp_image1 = $_FILES['service_image1']['tmp_name'];
        $tmp_image2 = $_FILES['service_image2']['tmp_name'];
        $tmp_image3 = $_FILES['service_image3']['tmp_name'];

        // Move uploaded files to desired directory
        move_uploaded_file($tmp_image1, "./service_images/$service_image1");
        move_uploaded_file($tmp_image2, "./service_images/$service_image2");
        move_uploaded_file($tmp_image3, "./service_images/$service_image3");

        // Query to update service
        $update_service = "UPDATE `service` SET category_id='$service_category', shop_id='$shop_name', service_title='$service_title', description='$service_desc', service_keywords='$service_keywords', service_image1='$service_image1', service_image2='$service_image2', service_image3='$service_image3', service_cost='$service_cost', date=NOW() WHERE service_id=$edit_id";

        $result_update = mysqli_query($con, $update_service);

        if($result_update)
        {
            echo "<script>alert('Service Updated Successfully!')</script>";
            echo "<script>window.open('index.php?view_service','_self')</script>";
        }
        else
        {
            echo "<script>alert('Failed to update service!')</script>";
        }
    }
}
?>
