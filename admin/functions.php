<?php

function escape($string)
{
    
    global $conn;
    
  return mysqli_real_escape_string($conn, trim($string));  
    
    
}


function confirm($result)
{
  global $conn;
        if(!$result)
    {
        die("Query Failed".mysqli_error($conn));
    }
    
}


function insert_categories()
{
      
     global $conn   ;
    if(isset($_POST['submit']))
{


$cat_name = $_POST['cat_name'];

if($cat_name== "" || empty($cat_name) || strlen($cat_name)<1 ){
echo "This field should not be Empty";
}

else{


$query = "INSERT INTO category(cat_name) ";

$query .= "VALUES('$cat_name')" ;
$create_category_query = mysqli_query($conn, $query);

if(!$create_category_query)
{
die("Query Failed ".mysqli_error($conn));
}
}

}
}



function recordCount($table)
{
        global $conn;
        
        $query = "SELECT * FROM {$table} ";
        $rows = mysqli_query($conn, $query);
        
$result = mysqli_num_rows($rows);    
confirm($result);
return $result;
}










function findAllCategories()
{
   global $conn;
    
    $query= "SELECT * FROM category";
$select_categories = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($select_categories))
{
$cat_id = $row["cat_id"];
$cat_name = $row["cat_name"];
echo "<tr>";
echo "<td>{$cat_id}</td>";
echo "<td>{$cat_name}</td>";
echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
}
 
}



function deleteCategories()
{
global $conn;
if(isset($_GET["delete"])){
$thecat_id = $_GET["delete"];
$value=1;
$query = "DELETE FROM category WHERE cat_id = {$thecat_id} ";
$delete_query = mysqli_query($conn,$query);
//it gonna refresh for us
    $alterquery = "ALTER TABLE category AUTO_INCREMENT = $value ";
  $result=  mysqli_query($conn,$alterquery);
header("Location: categories.php");
if(!$result)
{
  die("Query Failed ".mysqli_error($connection));  
}
}
}







?>