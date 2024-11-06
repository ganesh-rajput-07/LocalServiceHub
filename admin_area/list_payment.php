<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <?php 
     $get_orders="Select * from `user_payments`";
     $result=mysqli_query($con,$get_orders);
     $row_count=mysqli_num_rows($result);

if($row_count==0)
{
    echo "<h2 class='text-danger text-center mt-5'>No Payment Received Yet!</h2>";
}
else{
   
     echo "<tr>
     <th>SR.NO</th>
     <th>Cost</th>
     <th>Invoice Number</th>
     <th>Payment Mode</th>
     <th>Booking Date</th>
     
     <th>Delete</th>
 </tr>
</thead>
<tbody class='bg-secondary text-light text-center'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result))
    {
        $order_id=$row_data['order_id'];
        
        $amount=$row_data['amount'];
        $invoice_number=$row_data['invoice_number'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $payment_id=$row_data['payment_id'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$amount</td>
        <td>$invoice_number</td>
        <td>$payment_mode</td>
        <td>$date</td>
       
        <td><a href='index.php?delete_payment=$payment_id' type='button'><i class='fa-regular fa-trash-can' style='color: #B197FC;'></i></a></td>
        
    </tr>";
    }
}
        ?>
        
        
    </tbody>
</table>

<!-- Modal -->
