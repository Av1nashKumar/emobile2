<?php
$conn=mysqli_connect('localhost','root','','e_commerce');
if(!$conn)
{

  echo "connection closed";
}
$db=mysqli_select_db($conn,'e_commerce');

?>

