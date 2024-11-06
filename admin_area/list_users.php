<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php 
     $get_orders="Select * from `user_table`";
     $result=mysqli_query($con,$get_orders);
     $row_count=mysqli_num_rows($result);

if($row_count==0)
{
    echo "<h2 class='text-danger text-center mt-5'>No Users Yet!</h2>";
}
else{
   
     echo "<tr>
     <th>SR.NO</th>
     <th>User Name</th>
     <th>User Email</th>
     <th>User Image</th>
     <th>User Address</th>
     <th>User Mobile</th>
     
   
 </tr>
</thead>
<tbody class='bg-secondary text-light text-center'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result))
    {
        $user_id=$row_data['user_id'];
        $user_name=$row_data['user_name'];
        $user_email=$row_data['user_email'];
        $user_password=$row_data['user_password'];
        $user_image=$row_data['user_image'];
        $user_ip=$row_data['user_ip'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$user_name</td>
        <td>$user_email</td>
        <td><img src='../users_area/user_images/$user_image' alt='$user_name' class='service_img'></td>
        <td>$user_address</td>
        <td>$user_mobile</td>
       
       
        
    </tr>";
    }
}
        ?>
        
        
    </tbody>
</table>

<!-- Modal -->
