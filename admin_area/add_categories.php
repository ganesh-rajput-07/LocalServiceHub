
<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat']))
{
    $category_title = $_POST['cat_title'];

    // Select data from database
    $select_query = "SELECT * FROM categories WHERE category_title = '$category_title'";
    $result_select = mysqli_query($con, $select_query);
    if (!$result_select) {
        die('Error: ' . mysqli_error($con)); // Add error handling
    }
    
    $number = mysqli_num_rows($result_select);
    if($number > 0)
    {
        echo "<script>alert('This category already exists in the database')</script>";
    }
    else {
        // Insert data into database
        $insert_query = "INSERT INTO categories (category_title) VALUES ('$category_title')";
        $result = mysqli_query($con, $insert_query);
        if (!$result) {
            die('Error: ' . mysqli_error($con)); // Add error handling
        }
        else {
            echo "<script>alert('Category has been Added Successfully')</script>";
        }
    }
}
?>

<h2 class="text-center">Add Categories</h2>
<form action="" method="post"class="mb-2">
    
   <div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Add Categories" aria-label="Username" aria-describedby="basic-addon1">

    </div>

    <div class="input-group w-10 mb-2 m-auto">
<input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Add caategories">

<!--<button class="bg-info p-2 my-3 border-0">Add caategories</button>
    </div>-->
</form>
