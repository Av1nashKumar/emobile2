<?php

include "db.php";
session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['search']))
    {
        
        $pro_ids = [];
        
        $search =  $_POST['search'] ;
        $query = "SELECT * FROM product WHERE pro_name LIKE '%{$search}%' ";
       
        
        
        $result = mysqli_query($conn,$query);
        
        
        
        if(mysqli_num_rows($result) < 1 )
        {
            echo "<script>alert('Sorry! No item found');</script>";
            header("Location:index.php");
        }
        
        
        else
        {
        while($rows=mysqli_fetch_assoc($result))
        {
            $pro_ids[] = $rows['pro_id'];   
        }
        
        $_SESSION['pro_ids'] = $pro_ids ;
  header("Location:search_product.php");    
       
    }

     }
}

?>


