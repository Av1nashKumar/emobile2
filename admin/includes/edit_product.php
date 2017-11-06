 
<h1 class="page-header">
Edit Product
<small>Author</small>
</h1>

 
 
 <?php

if(isset($_GET['p_id']))
{
   $the_pro_id = $_GET['p_id'];
    $the_cat_id = $_GET['cat_id'];
    
}
    
$query= "SELECT * FROM product WHERE pro_id = $the_pro_id ";
        
$select_pro_by_id = mysqli_query($conn,$query);
confirm($select_pro_by_id);
while($row = mysqli_fetch_assoc($select_pro_by_id))
{
$pro_id = $row["pro_id"];
$pro_name = $row["pro_name"];
$pro_disc = $row["pro_disc"];
$pro_quantity = $row["pro_quantity"];
$the_pro_img1 = $row["pro_img1"];
$the_pro_img2 = $row["pro_img2"];
$the_pro_img3 = $row["pro_img3"];
$pro_price = $row["pro_price"];
$pro_sub_id = $row["sub_id"];
$cat_id = $row["cat_id"];
}

if(isset($_POST['update_product']))
{
    $pro_name = escape($_POST['pro_name']);
    $pro_disc = escape($_POST['pro_disc']);
    $cat_id = escape($_POST['category']);
    $sub_id = escape($_POST['sub_cat']);
    $pro_quantity = escape($_POST['pro_quantity']);
    $pro_img1 = escape($_FILES['image1']['name']);
    $pro_img2 = escape($_FILES['image2']['name']);
    $pro_img3 = escape($_FILES['image3']['name']);
    $pro_image_temp1 = $_FILES['image1']['tmp_name'];
    $pro_image_temp2 = $_FILES['image2']['tmp_name'];
    $pro_image_temp3 = $_FILES['image3']['tmp_name'];
    $pro_price = escape($_POST['pro_price']);
    $pro_disc = mysqli_real_escape_string($conn, $pro_disc);
    
   
    
    if(empty($pro_img1) || empty($pro_img2) || empty($pro_img3))
    {
        $query = "SELECT * FROM product WHERE pro_id = $the_pro_id ";
        $select_image = mysqli_query($conn, $query);
        
        $row = mysqli_fetch_array($select_image);
        
            $pro_img1 = $row['pro_img1'];
            $pro_img2 = $row['pro_img2'];
            $pro_img3 = $row['pro_img3'];
        
        
    }
     
    
    $query= "SELECT cat_name FROM category where cat_id = $cat_id "; 

    $select_cat = mysqli_query($conn,$query);
    
    confirm($select_cat);
    
    $the_cat_name=null;
    
    while($row = mysqli_fetch_assoc($select_cat))
    {

     
    $the_cat_name = $row["cat_name"];  
    
    }
   
    move_uploaded_file($pro_image_temp1,"../images/$pro_img1");
    move_uploaded_file($pro_image_temp2,"../images/$pro_img2");
    move_uploaded_file($pro_image_temp3,"../images/$pro_img3");
 
    $query = "UPDATE product SET ";
    $query .="pro_name = '{$pro_name}', ";
    $query .="cat_id = '{$cat_id}', ";
    $query .="pro_disc = '{$pro_disc}', ";
    $query .="pro_quantity = {$pro_quantity}, ";
    $query .="pro_img1 = '{$pro_img1} ', ";
    $query .="pro_img2 = '{$pro_img2} ', ";
    $query .="pro_img3 = '{$pro_img3} ', ";
    $query .="sub_id =  {$sub_id}, ";
    $query .="pro_price = {$pro_price} ";
    $query .="WHERE pro_id = {$the_pro_id} ;";
   
    
    
    $update_product = mysqli_query($conn, $query);
    
    confirm($update_product);
    header("Location: ./products.php");
    
    
    
    
}
?>
    <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
    <label for="title">Product Name</label>
    <input type="text" class="form-control" name="pro_name" value="<?php echo $pro_name; ?>" >
    </div>
 
        <div class="form-group">
    <select class ='btn btn-primary' name="category" id="">
        <?php
        
        
        
    $query= "SELECT * FROM category "; 

    $select_cat = mysqli_query($conn,$query);
    
    confirm($select_cat);
        
    while($row = mysqli_fetch_assoc($select_cat))
    {

    $_id = $row["cat_id"];
    $_name = $row["cat_name"];  
        
        
        if($_id == $cat_id){
        
        
        
       echo "<option class ='btn btn-primary' selected value='$_id'> {$_name}</option>" ;
        
        }
        else
            
        {
                echo "<option value='$_id'> {$_name}</option>" ;
        }
        
        }?>
        
        
    </select>
    </div>
    
    
     
    <div class="form-group">
    <select class ='btn btn-primary' name="sub_cat" id="">
        <?php
        
        
        
    $query= "SELECT * FROM sub_cat "; 

    $select_sub_cat = mysqli_query($conn,$query);
    
    confirm($select_sub_cat);
        
    while($row = mysqli_fetch_assoc($select_sub_cat))
    {

    $sub_id = $row["sub_id"];
    $sub_name = $row["sub_name"];  
        
        
        if($sub_id == $pro_sub_id){
        
        
        
       echo "<option class ='btn btn-primary' selected value='$sub_id'> {$sub_name}</option>" ;
        
        }
        else
            
        {
                echo "<option value='$sub_id'> {$sub_name}</option>" ;
        }
        
        }?>
        
        
    </select>
    </div>
    
             
   
    
                         
                            
    <div class="form-group">
    <img width="100" src="../images/<?php echo $the_pro_img1; ?>" alt="">
    <input name="image1" type="file">
    </div>
    
     
    <div class="form-group">
    <img width="100" src="../images/<?php echo $the_pro_img2; ?>" alt="">
    <input name="image2" type="file">
    </div>
    
     
    <div class="form-group">
    <img width="100" src="../images/<?php echo $the_pro_img3; ?>" alt="">
    <input name="image3" type="file">
    </div>
    
    
    
    <div class="form-group">
    <label for="pro_quantity">Product Quantity</label>
    <input type="text" value="<?php echo $pro_quantity; ?>" class="form-control" name="pro_quantity">
    </div>
    
    <div class="form-group">
    <label for="pro_price">Product Price</label>
    <input type="text" value="<?php echo $pro_price; ?>" class="form-control" name="pro_price">
    </div>
    
    
    
    <div class="form-group">
    <label for="pro_disc">Product Discription</label>
    <textarea  class="form-control" name="pro_disc"  id="" cols= "30" rows="10" ><?php echo str_replace( '\r\n' , '</br>', $pro_disc); ?>"</textarea>
    </div>
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="update_product" value="Update Product">
    </div>
</form>