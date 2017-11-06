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