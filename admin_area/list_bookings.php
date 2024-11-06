<h3 class="text-center text-success">All Bookings</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php 
     $get_orders="Select * from `user_orders`";
     $result=mysqli_query($con,$get_orders);
     $row_count=mysqli_num_rows($result);

if($row_count==0)
{
    echo "<h2 class='text-danger text-center mt-5'>No Bookings Yet!</h2>";
}
else{
   
     echo "<tr>
     <th>SR.NO</th>
     <th>Cost</th>
     <th>Invoice Number</th>
     <th>Total Service</th>
     <th>Booking Date</th>
     <th>Status</th>
     <th>Delete</th>
 </tr>
</thead>
<tbody class='bg-secondary text-light text-center'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result))
    {
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $ammount_due=$row_data['ammount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_service=$row_data['total_service'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$ammount_due</td>
        <td>$invoice_number</td>
        <td>$total_service</td>
        <td>$order_date</td>
        <td>$order_status</td>
        <td><a href='index.php?delete_Booking=$order_id'><i class='fa-regular fa-trash-can' style='color: #B197FC;'></i></a></td>
        
    </tr>";
    }
}
        ?>
        
        
    </tbody>
</table>

<!-- Modal -->
