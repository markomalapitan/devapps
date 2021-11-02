<?php
$con=mysqli_connect("localhost","root","","sample_stock");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['add_stock_confirm']))
{
   if($_POST['PASA']>0)add_stock('Product A',$_POST['PASA']);
   if($_POST['PASB']>0)add_stock('Product B',$_POST['PASB']);
   if($_POST['PASC']>0)add_stock('Product C',$_POST['PASC']);
   header("Location:".$_SERVER['HTTP_REFERER']); 

} 


function add_stock($prd,$prd_val) 
  {
    global $con;
    $success = false;
    $qry="UPDATE stock_tbl SET Stock = ".$prd_val." WHERE Product = '".$prd."';";
     if(mysqli_query($con, $qry))
    {         
    }
  }


    
?>
