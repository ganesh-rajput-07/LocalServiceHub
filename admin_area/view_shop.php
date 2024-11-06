<h3 class="text-center text-success">All Shops</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>SR.NO.</th>
            <th>Shop Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-seondary text-light">
        <?php
            $select_shop="Select * from `shopname`";
            $result=mysqli_query($con,$select_shop);
            $number=0;
            while($row=mysqli_fetch_assoc($result))
            {
                $shop_id=$row['shop_id'];
                $shop_title=$row['shop_title'];
                $number++;

            
        ?>
        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $shop_title;?></td>
            <td><a href='index.php?edit_shop=<?php echo $shop_id;?>' class='text-light'><i class='fa-regular fa-pen-to-square' style='color: #B197FC;'></i></a></td> <!-- Changed class for Font Awesome icon -->
           <td><a href='index.php?delete_shop=<?php echo $shop_id;?>'  type="button" class="text-light" data-toggle="modal" data-target="#exampleModalCenter"><i class='fa-regular fa-trash-can' style='color: #B197FC;'></i></a></td>
        
        </tr>
        <?php

            }?>
            
    </tbody>
</table>

<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal 
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
     <h4>Are You Sure , You Want To Delete this Shop?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?view_shop" class="text-light text-decoration-none">NO</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_shop=<?php echo $shop_id ?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>