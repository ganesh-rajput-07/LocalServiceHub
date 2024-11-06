<?php
    include('../includes/connect.php');

    if(isset($_POST['add_service'])) {
        $service_title = $_POST['service_title'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        $contect = $_POST['contect'];
        $service_keywords = $_POST['service_keywords'];
        $service_categories = $_POST['category_id']; // Corrected name attribute
        $service_shopname = $_POST['shop_id']; // Corrected name attribute
        $service_cost = $_POST['service_cost'];
        $service_status = 'Succeeded'; // Corrected typo

        // Accessing images
        $service_image1 = $_FILES['service_image1']['name'];
        $service_image2 = $_FILES['service_image2']['name'];
        $service_image3 = $_FILES['service_image3']['name'];

        // Accessing image tmp name
        $temp_image1 = $_FILES['service_image1']['tmp_name'];
        $temp_image2 = $_FILES['service_image2']['tmp_name'];
        $temp_image3 = $_FILES['service_image3']['tmp_name'];

        // Checking empty condition
        if(empty($service_title) || empty($description) || empty($service_keywords) || empty($service_categories) || empty($service_shopname) || empty($service_cost) || empty($service_image1) || empty($service_image2) || empty($service_image3)) {
            echo "<script>alert('Please fill all the available fields')</script>";
        } else {
            // Move uploaded files
            $upload_dir = "./service_images/";
            $upload_paths = [];

            $upload_paths[] = move_uploaded_file($temp_image1, $upload_dir . $service_image1);
            $upload_paths[] = move_uploaded_file($temp_image2, $upload_dir . $service_image2);
            $upload_paths[] = move_uploaded_file($temp_image3, $upload_dir . $service_image3);

            // Check if all file uploads are successful
            if (in_array(false, $upload_paths)) {
                echo "<script>alert('Error uploading one or more images')</script>";
            } else {
                // Insert query
                // Prepare the SQL statement
$insert_service = "INSERT INTO `service` (service_title, description, address, contect, service_keywords, category_id, shop_id, service_image1, service_image2, service_image3, service_cost, Date, Status)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

// Prepare the statement
$stmt = mysqli_prepare($con, $insert_service);

// Bind parameters
mysqli_stmt_bind_param($stmt, "ssssssssssds", $service_title, $description, $address, $contect, $service_keywords, $service_categories, $service_shopname, $service_image1, $service_image2, $service_image3, $service_cost, $service_status);

// Execute the statement
$result_query = mysqli_stmt_execute($stmt);

// Check for success
if($result_query) {
echo "<script>alert('Service Added Successfully')</script>";
echo "<script>window.open('index.php?view_service','_self')</script>";
}




//else {
//echo "Error: " . mysqli_error($con);
//}



// Close the statement
mysqli_stmt_close($stmt);

                $result_query = mysqli_query($con, $insert_service);
                if($result_query) {
                    echo "<script>alert('Service Added Successfully')</script>";
                    echo "<script>window.open('index.php?view_service','_self')</script>";
                }
                
                
                //else {
                   // echo "Error: " . $insert_service . "<br>" . mysqli_error($con);
                //}

                
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service - Admin Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Service</h1>
        <!-- Form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Service Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="service_title" class="form-label">Service Title</label>
                <input type="text" name="service_title" id="service_title" class="form-control" placeholder="Enter Service Title" required="required">
            </div>
            <!-- Service Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Service Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Service Description" required="required">
            </div>
             <!-- Service Address -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
            </div>
             <!-- Service contect -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="contect" class="form-label">Contact Detail</label>
                <input type="tel" name="contect" id="contect" class="form-control" placeholder="Enter Contact Detail">
            </div>
            <!-- Service Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="service_keywords" class="form-label">Service Keywords</label>
                <input type="text" name="service_keywords" id="service_keywords" class="form-control" placeholder="Enter Service Keywords" required="required">
            </div>
            <!-- Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="category_id" id="category_id" class="form-select">
                    <option value="">Select A Category</option>
                    <?php
                        $select_query = "SELECT * FROM categories";
                        $result_query = mysqli_query($con, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- Shops -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="shop_id" id="shop_id" class="form-select">
                    <option value="">Select A Shop</option>
                    <?php
                        $select_query = "SELECT * FROM shopname";
                        $result_query = mysqli_query($con, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $shop_title = $row['shop_title'];
                            $shop_id = $row['shop_id'];
                            echo "<option value='$shop_id'>$shop_title</option>";
                        }
                    ?>
                </select>
            </div>
            <!-- Service Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="service_image1" class="form-label">Service Image 1</label>
                <input type="file" name="service_image1" id="service_image1" class="form-control" required="required">
            </div>
            <!-- Service Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="service_image2" class="form-label">Service Image 2</label>
                <input type="file" name="service_image2" id="service_image2" class="form-control" required="required">
            </div>
            <!-- Service Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="service_image3" class="form-label">Service Image 3</label>
                <input type="file" name="service_image3" id="service_image3" class="form-control" required="required">
            </div>
            <!-- Service Cost -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="service_cost" class="form-label">Service Cost</label>
                <input type="text" name="service_cost" id="service_cost" class="form-control" placeholder="Enter Service Cost" required="required">
            </div>
            <!-- Submit Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="add_service" class="btn btn-info mb-3 px-3" value="Add Service">
            </div>
        </form>
    </div>
</body>
</html>
