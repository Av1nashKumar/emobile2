<?php
session_start();
unset($_SESSION['uid']);
unset($_SESSION['total']);
unset($_SESSION['items']);
  header("location:index.php");
?>
