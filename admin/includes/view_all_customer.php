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
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>            
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
       
       
       <?php
       
    
$query= "SELECT * FROM customer";
        
$select_customer = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($select_customer))
{
$cust_id = $row["cust_id"];
$name = $row["cust_name"];
$cust_email = $row["cust_email"];
$cust_contact = $row["cust_contact"];


echo "<tr>";
echo "<td>$cust_id</td>";
    echo "<td>$name</td>";
    echo "<td>$cust_email</td>";
     echo "<td>$cust_contact</td>";

      echo "<td><a class='btn btn-danger' onClick=\" javascript: return confirm('Are you sure you want to delete'); \"   href='customer.php?delete={$cust_id}'>Delete</a></td>";

echo "</tr>";
}
    

    ?>
       

    </tbody>
    </table>
    
    
    <?php

    if(isset($_GET['delete']))
    {
        
 
            
            
        $the_cust_id = escape($_GET['delete']);  
        $query = "DELETE FROM customer WHERE cust_id = {$the_cust_id} ";
        $delete_query = mysqli_query($conn, $query);
        header("Location: customer.php");

    
        
    }
//    
//    
    ?>

