<?php  include "includes/admin_header.php" ?>
<div id="wrapper">

<!-- Navigation -->

<?php  include "includes/admin_navigation.php" ?>

<!--       navigation end-->

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">                                                                                                                                           
<div class="col-lg-12">


<h1 class="page-header">
Customers
</h1>


<?php


if(isset($_GET['source']))
{
    
    $source = $_GET['source'];
    
}
else
{
    $source = "";
}

switch($source)
{
        

          
          
    case "Nice 34": 
        echo nice;
        break;
          
    case "Nice 34":
        echo nice;
        break;
    
    default:
        
        include "includes/view_all_customer.php";
        
        break;
        
}

?>

</div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>