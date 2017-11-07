</form>

<form action="" method="post">
<div class="form-group">
<label for="cat_name">Edit Category</label>

<?php


if(isset($_GET['edit']))
{
$cat_id= escape($_GET['edit']);

$query= "SELECT * FROM category WHERE cat_id = $cat_id ";

$select_categories = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($select_categories))
{

$cat_id = $row["cat_id"];
$cat_name = $row["cat_name"];    
?>

<input  value ="<?php  if(isset($_GET['edit'])){echo $cat_name; } ?>"   type="text" class="form-control" name="cat_name">

<?php } } ?>


<?php     

//Update Query


if(isset($_POST["update_category"])){

$the_cat_name = escape($_POST["cat_name"]);

$query = " UPDATE category SET cat_name = '{$the_cat_name}' WHERE cat_id = {$cat_id} ";
$update_query = mysqli_query($conn,$query);
if(!$update_query)
{
die("Query FAILED".mysqli_error($conn));
}

} ?>

</div>

<div class="form-group">
<input type="submit" class="btn btn-primary"  name="update_category" value="Update"></div>

</form>



















