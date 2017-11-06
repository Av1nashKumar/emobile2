
<h1 class="page-header">
Add Product
<small></small>
</h1>




<?php    
if(isset($_POST['create_product']))
{
 
    $product_name = escape($_POST['product_name']);
    $product_category_id = escape($_POST['product_category']);
    $product_sub_category_id = escape($_POST['product_sub_category']);
    $post_image1 = $_FILES['image1']['name'];
    $post_image_temp1 = $_FILES['image1']['tmp_name'];
    $post_image2 = $_FILES['image2']['name'];
    $post_image_temp2 = $_FILES['image2']['tmp_name'];
    $post_image3 = $_FILES['image3']['name'];
    $post_image_temp3 = $_FILES['image3']['tmp_name'];
    $product_quantity = escape($_POST['product_quantity']);
    $product_price = escape($_POST['product_price']);
    $product_content = escape($_POST['product_content']);
  
    

    move_uploaded_file($post_image_temp1,"../images/$post_image1");
    move_uploaded_file($post_image_temp2,"../images/$post_image2");
    move_uploaded_file($post_image_temp3,"../images/$post_image3");
    
    

    
$query =  "INSERT INTO product(pro_name, pro_disc, pro_quantity, pro_img1, pro_img2, pro_img3, sub_id, pro_price, cat_id) " ;
    
    $query .= "VALUES ( '{$product_name}', '{$product_content}', {$product_quantity}, '{$post_image1}', '{$post_image2}', '{$post_image3}', {$product_sub_category_id}, {$product_price}, {$product_category_id} ) ";
    
    $create_product_query= mysqli_query($conn, $query);
    confirm($create_product_query);
      header("Location: ./products.php");
}

?>
    

    
    <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
    <label for="title">Product Name</label>
    <input type="text" class="form-control" name="product_name">
    </div>
 
     
   <div class="form-group">
    <select class ='btn btn-primary' name ="product_category"   id="">
        
        
        <?php
     global $conn;   

    $query= "SELECT * FROM category "; 

    $select_categories = mysqli_query($conn,$query);
    
    confirm($select_categories);
        
    while($row = mysqli_fetch_assoc($select_categories))
    {

    $cat_id = $row["cat_id"];
    $cat_name = $row["cat_name"];  
        
        
       echo "<option value='$cat_id'> {$cat_name}</option>" ;
        
    }  ?>
        
        
    </select>
    </div>
    
    
     <div class="form-group">
    <select class ='btn btn-primary' name ="product_sub_category"   id="">
        
        
        <?php
     global $conn;   

    $query= "SELECT * FROM sub_cat "; 

    $select_sub_categories = mysqli_query($conn,$query);
    
    confirm($select_sub_categories);
        
    while($row = mysqli_fetch_assoc($select_sub_categories))
    {

    $sub_id = $row["sub_id"];
    $sub_name = $row["sub_name"];  
        
        
       echo "<option value='$sub_id'> {$sub_name}</option>" ;
        
    }  ?>
        
        
    </select>
    </div>
    

 
    <div class="form-group">
    
    
    <label for="image">Product Images 1</label>
    <input  type="file" name="image1">
      
</div>
      <div class="form-group">
       <label for="image">Product Images 2</label>
    <input  type="file" name="image2">
      
        </div>
        <div class="form-group">
          <label for="image">Product Images 3</label>
    <input  type="file" name="image3">
          </div>
    
    <div class="form-group">
    <label for="product_quantity">Product Quantity</label>
    <input type="text" class="form-control" name="product_quantity">
    </div>
    
    <div class="form-group">
    <label for="product_price">Product Price</label>
    <input type="text" class="form-control" name="product_price">
    </div>
    
    <div class="form-group">
    <label for="product_content">Product Discription</label>
    <textarea  class="form-control" name="product_content" id="" cols= "30" rows="10" ></textarea>
    </div>
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_product" value="Publish Product">
    </div>
</form>