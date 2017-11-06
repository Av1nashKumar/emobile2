
<?php  include ("delete_modal.php");  ?>


<h1 class="page-header">
All Products
</h1>


<?php
if(isset($_POST['checkBoxArray'])){

$bulk_options = escape($_POST['bulk_options']);
    
foreach($_POST['checkBoxArray'] as $proValueId){
    
switch($bulk_options){
        

        case 'delete':
        $query = "DELETE FROM products WHERE post_id = {$proValueId} ";
        $update_to_delete_status = mysqli_query($connection, $query);
        break;  
                
     

       }
    
}
    
}

?>
   
<form action="" method="post">
  
   <table class="table table-bordered table-hover table-sortable" >
    
 <div id="bulkOptionContainer" class="col-xs-4"><select name="bulk_options" id="" class="form-control">
         <option value="">Select Options</option>
         <option value="delete">Delete</option>
     </select>
     
     </div>
      
     <div class="col-xs-4">
      
      <input type="submit" name="submit" value="Apply" class="btn btn-success">
      <a href="./products.php?source=add_product" class="btn btn-primary">Add New</a>
      
      </div> 
       
       
       
       <thead>
        <tr>
           <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>Name</th>
<!--            <th>Discription</th>-->
            <th>Quantity</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th>Image 3</th>
            <th>Sub Category</th>
            <th>Price</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
       
       
       <?php
        

                  
        $query = "SELECT product.pro_id, product.pro_name, product.pro_disc, product.pro_quantity, product.pro_img1, product.pro_img2, product.pro_img3,product.cat_id, ";
        
        $query .= "product.pro_price, sub_cat.sub_name,sub_cat.sub_id ";
        
        $query .= "FROM product ";
        
        $query .= "LEFT JOIN sub_cat ON product.sub_id = sub_cat.sub_id ORDER BY product.pro_id DESC";
              

        
  
       
        
        
        
$select_posts = mysqli_query($conn,$query);
        confirm($select_posts);
while($row = mysqli_fetch_assoc($select_posts))
{
$pro_id = $row["pro_id"];
$pro_name = $row["pro_name"];
$pro_disc = $row["pro_disc"];
$pro_quantity = $row["pro_quantity"];
$pro_img1 = $row["pro_img1"];
$pro_img2 = $row["pro_img2"];
$pro_img3 = $row["pro_img3"];
$pro_price = $row["pro_price"];
$sub_name = $row["sub_name"];
$cat_id = $row["cat_id"];
    $sub_id = $row["sub_id"];

echo "<tr>";

?>


<td><input type='checkbox' name='checkBoxArray[]' class='checkBoxes' value='<?php echo $pro_id;  ?>'></td>

<?php
        echo "<td>$pro_id </td>";

        echo "<td>$pro_name</td>";

       // echo "<td style='max-width:20px;max-height:25px'>$pro_disc</td>";
        echo "<td>$pro_quantity</td>";

    
    
    
    
        echo "<td><img class='img-responsive' width='100' height='100' src='../images/$pro_img1' alt='image' ></td>";
        echo "<td><img class='img-responsive' width='100' height='100' src='../images/$pro_img2' alt='image' ></td>";
        echo "<td><img class='img-responsive' width='100' height='100' src='../images/$pro_img3' alt='image' ></td>";
      echo "<td>$sub_name</td>";    
    echo "<td>$pro_price</td>";
      

    
    echo "<td><a class = 'btn btn-primary' href=' ../single.php?id=$pro_id'> $pro_name </a></td>";
    echo "<td><a class = 'btn btn-info' href='products.php?source=edit_product&p_id=$pro_id&cat_id=$cat_id'>Edit</a></td>";
    
    
//    echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete'); \"  href='posts.php?delete={$post_id}'>Delete</a></td>";
    
    
    ?>
    
    <form action="" method="post">
        
        <input type="hidden" name="product_id" value="<?php echo $pro_id; ?>"> 
        
        <?php echo '<td><input type="submit" class="btn btn-danger" value="Delete" name="delete"></td>'; ?>
        
        
    </form>
    
    
    
    
    
    
    <?php 
    
//     echo "<td><a rel='{$post_id}' class='delete_link' href='javascript:void(0)' >Delete</a></td>";
    
    echo "</tr>";
}
    
        

    ?>
       
  
    
    </tbody>
    
    
    <?php
    if(isset($_POST['delete']))
    {
       $the_pro_id = escape($_POST['product_id']);
        
        $query = "DELETE FROM product WHERE pro_id = {$the_pro_id} ";
        
        $delete_query = mysqli_query($conn, $query);
        header("Location: products.php?source=product.php");
    }
    
    
    ?>
    

</table>
</form>


    <script>
       
    $(document).ready(function(){
           
    $(".delete_link").on('click', function(){
       
      var id = $(this).attr("rel");
      var delete_url = "posts.php?delete="+ id +" ";
        
        
      $(".modal_delete_link").attr("href", delete_url);
        
        
       $("#myModal").modal('show');
        
    });    
           
   
       });
       
       </script>