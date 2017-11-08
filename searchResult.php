<?php
include "db.php";
if(isset($_REQUEST['id'])){
    $str=$_REQUEST['id'];
    echo $str;
    echo "<br><br>";
    $sql="select * from product";
    $result=mysqli_query($conn,$sql);
    while($rows=mysqli_fetch_assoc($result)){
        $tags=$rows['tags'];
        $arr=explode(",",$tags);
        foreach($arr as $item){
            if($str==strtoupper($item)) {
                echo $rows['pro_name'];
            echo "<br>";
            }
        }
    }
}