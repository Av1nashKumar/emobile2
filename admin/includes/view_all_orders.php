<h1 class="page-header">
All Orders
</h1>



<?php   

if(isset($_SESSION['user_role']))
{
    $user_role = $_SESSION['user_role'];
    
    if($user_role != 'admin')
    {
     
        header("Location: ./index.php ");
    
    }
    
}

?>
   

   <table class="table table-bordered table-hover" >
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Product Name</th>            
            <th>Price</th>
            <th>Order Time</th>
            <th>Status</th>
            <th>Customer Name</th>
            <th>Delete</th>
            <th>Approved</th>
            <th>UnApproved</th>
        </tr>
    </thead>
    <tbody>
       <?php
 if(isset($_SESSION['uid']))
     {
 
   $sql ="SELECT order_id,pro_id,pro_name,pro_img,pro_price,order_status,name,order_time FROM cust_order";
   $result=mysqli_query($conn,$sql);
         if(mysqli_num_rows($result)==0)
    {
      echo"<div class='container'><center><h1 style='margin-top:200px; text-align:center; '>NO ORDERS TO DISPLAY</h1><br><br>";
     
    }
     else
     {
         
            while($rows=mysqli_fetch_assoc($result))
      {
                $order_id=$rows['order_id'];
                $pro_id=$rows['pro_id'];
                $pro_name=$rows['pro_name'];
                $pro_img=$rows['pro_img'];
                 $pro_price=$rows['pro_price'];
                $order_status=$rows['order_status'];
                $name=$rows['name'];
                $order_time=$rows['order_time'];
     echo "<tr>";
     echo "<td>$order_id</td>";
                 echo "<td><img class='img-responsive' width='100' height='50' src='../images/$pro_img' alt='image' ></td>";
 
                     echo "<td>$pro_name</td>";
           echo "<td>$pro_price</td>";        
 echo "<td>$order_time</td>";
 
                echo "<td>$order_status</td>";
                echo "<td>$name</td>";
               
     echo "<td><a class='btn btn-danger' onClick=\" javascript: return confirm('Are you sure you want to delete'); \"   href='customer.php?source=view_all_orders&delete={$order_id}'>Delete</a></td>";
                echo "<td><a class='btn btn-info' href='customer.php?source=view_all_orders&approved_id=$order_id'>Approved</a></td>";
                echo "<td><a class='btn btn-warning' href='customer.php?source=view_all_orders&unapproved_id=$order_id'>UnApproved</a></td>";
echo "</tr>";
}
     }
    
 }
    ?>
       

    </tbody>
    </table>
    
    
    <?php

    if(isset($_GET['delete']))
    {
        
 
            
            
        $the_order_id = escape($_GET['delete']);  
        $query = "DELETE FROM cust_order WHERE order_id = {$the_order_id} ";
        $delete_query = mysqli_query($conn, $query);
        header("Location: customer.php?source=view_all_orders");

    
        
    }

   if(isset($_GET['approved_id']))
    {
        
 
            
            
        $the_order_id = escape($_GET['approved_id']);  
        $query = "Update cust_order SET order_status='placed'  WHERE order_id = {$the_order_id} ";
        $delete_query = mysqli_query($conn, $query);
        header("Location: customer.php?source=view_all_orders");

    
        
    }

   if(isset($_GET['unapproved_id']))
    {
        
 
            
            
        $the_order_id = escape($_GET['unapproved_id']);  
        $query = "Update cust_order SET order_status='waiting'  WHERE order_id = {$the_order_id} ";
        $delete_query = mysqli_query($conn, $query);
        header("Location: customer.php?source=view_all_orders");

    
        
    }


//    
//    
    ?>

