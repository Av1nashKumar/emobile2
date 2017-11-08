<?php
$arr=array("mi","mobiles","laptop","samsung","redmi","acer","Alienware","apple","asus","i3","i5","i7","iphone","dell","hp","macbook","leeco","moto","Alienware",
    "samsung guru","SAMSUNG Galaxy J7","Samsung Guru Music 2","Mi 4 (White, 16 GB)","Mi 5 (White, 32 GB)","Mi 4i (Grey, 16 GB)",
    "Redmi Note 3","Redmi 2 (Grey, 8 GB)","Moto X Style","LeEco Le 2","	LeEco Le Max2","Apple iPhone 5S","Apple iPhone 6",
    "Apple iPhone 6S Plus","Apple iPhone SE","SAMSUNG Galaxy On7","Acer Aspire E Series E5-573 Core i3 5Gen","Alienware 13 Y560901IN9 Core i5 (5th Gen)",
    "Alienware 15 MLK R2 Intel Core i5","Apple MD101HN/A Macbook Pro A1278 Core i5","Asus ROG ROG Series G501VW-FI034T Core i7","Asus ZenBook UX305UA-FC001T Intel Core i5",
    "Dell Inspiron 11 3148 Core i3","Dell Inspiron 3558 Core i3 (5th Gen)","HP AC 15-AC122TU core i3 (5th Gen)","galaxy");
if(isset($_REQUEST['hint'])){
  $str=strtolower($_REQUEST['hint']);
    if($str!=="") {
      $len = strlen($str);
      foreach ($arr as $tag) {
          if ($str==(substr(strtolower($tag), 0, $len))) {
              echo"<option value='".strtoupper($tag)."'>";
          }
      }
  }
}

?>