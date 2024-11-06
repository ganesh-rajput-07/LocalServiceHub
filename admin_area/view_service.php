<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <h3 class="text-success text-center">All service</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
           <tr>
            <th>Service ID</th>
            <th>Service Title</th>
            <th>Service Image</th>
            <th>Service Cost</th>
            <th>Total Bookings</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
           </tr>
        </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_service="Select * from `service`";
        $result=mysqli_query($con,$get_service);
        $number=0;
        while($row=mysqli_fetch_assoc($result))
        {
              $service_id=$row['service_id'];
              $service_title=$row['service_title'];
              $service_image1=$row['service_image1'];
              $service_cost=$row['service_cost'];  
              $Status=$row['Status'];
              $number++;
              ?>
           <tr class='text-center'>
           <td><?php echo $number;?></td>
           <td><?php echo $service_title;?></td>
           <td><img src='./service_images/<?php echo $service_image1;?>' class='service_img'></td>
           <td><?php echo $service_cost;?></td>
           <td>
            <?php
             $get_count="Select * from `orders_pending` where service_id=$service_id";
             $result_count=mysqli_query($con,$get_count);
             $rows_count=mysqli_num_rows($result_count);
             echo $rows_count;
            ?>
           </td>
           <td><?php $Status;?></td>
           <td><a href='index.php?edit_service=<?php echo $service_id ?>' class='text-light'><i class='fa-regular fa-pen-to-square' style='color: #B197FC;'></i></a></td> <!-- Changed class for Font Awesome icon -->
           <td><a href='index.php?delete_service=<?php echo $service_id ?>' type="button" class="text-light" data-toggle="modal" data-target="#exampleModalCenter"><i class='fa-regular fa-trash-can' style='color: #B197FC;'></i></a></td>
        </tr>
        <?php
        }
       ?>
        
    </tbody>
    </table>

<!-- modal-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
     <h4>Are You Sure , You Want To Delete this Service?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?view_service" class="text-light text-decoration-none">NO</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_service=<?php echo $service_id ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
