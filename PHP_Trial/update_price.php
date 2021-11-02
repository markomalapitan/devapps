<?php
$con=mysqli_connect("localhost","root","","sample_stock");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['change_stock_confirm']))
{
   if($_POST['PCSA']>0)add_stock('Product A',$_POST['PCSA']);
   if($_POST['PCSB']>0)add_stock('Product B',$_POST['PCSB']);
   if($_POST['PCSC']>0)add_stock('Product C',$_POST['PCSC']);
   header("Location:".$_SERVER['HTTP_REFERER']); 

} 


function add_stock($prd,$prd_val) 
  {
    global $con;
    $success = false;
    $qry="UPDATE stock_tbl SET Price = ".$prd_val." WHERE Product = '".$prd."';";
     if(mysqli_query($con, $qry))
    {         
    }
  }


    
?>
