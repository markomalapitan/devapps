<?php
if (!isset($_SESSION)) {
    session_start();
}
$con=mysqli_connect("localhost","root","","sample_stock");
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function ref_stock($prod) 
  {
    global $con;
    $s_price=0;
    $qry="SELECT stock_id,Product,Stock,Price From stock_tbl WHERE Product='".$prod."';";
    $result=mysqli_query($con,$qry);
    if($result)
     {
        while($row=mysqli_fetch_assoc($result))
      {
        $s_price=$row['Stock'];
      }
     }
     return $s_price;
  }
function ref_price($prod) 
  {
    global $con;
    $s_price=0;
    $qry="SELECT stock_id,Product,Stock,Price From stock_tbl WHERE Product='".$prod."';";
    $result=mysqli_query($con,$qry);
    if($result)
     {
        while($row=mysqli_fetch_assoc($result))
      {
        $s_price=$row['Price'];
      }
     }
     return $s_price;
  }
function ref_table() 
  {
    global $con;

    $tbl_row="";
    $qry="SELECT stock_id,Product,Stock,Price From stock_tbl;";
    $result=mysqli_query($con,$qry);
    if($result)
     {
        while($row=mysqli_fetch_assoc($result))
      {
        if($row['Product'] == "Product A")
        $s_price_A=$row['Price'];
        if($row['Product'] == "Product B")
        $s_price_B=$row['Price'];
        if($row['Product'] == "Product C")
        $s_price_C=$row['Price'];

           $tbl_row .='<tr>
                          <td>'.$row['Product'].'</td>
                          <td>'.$row['Stock'].'</td>
                          <td>'.$row['Price'].'</td>
                        </tr>';
      }
     }
     return $tbl_row;
  }

function ref_total() 
  {
    global $con;

    $total=0;
    $qry="SELECT  SUM( sell*Price) as total From log_tbl where status='SELL';";
    $result=mysqli_query($con,$qry);
    if($result)
     {
        while($row=mysqli_fetch_assoc($result))
      {
            if($row['total'] !='')
           $total=$row['total'];
      }
     }
     return $total;
  }
  

function procQ($prdA,$prdB,$prdC) 
  {
    global $con;
    $final = '';
    $qry="SELECT stock_id,Product,Stock,Price From stock_tbl;";
    $result=mysqli_query($con,$qry);
    if($result)
     {
        while($row=mysqli_fetch_assoc($result))
      {


        if($row['Product'] == "Product A" && $row['Stock'] >= $prdA && $prdA > 0)
        {
          if($prdA > 0)
            SOLD($row['stock_id'],$prdA,$row['Price']);
        }
        else if($row['Product'] == "Product A" &&  ($prdA < 0 || $prdA > $row['Stock']))
        {
          $final .= '<br>Invalid '.$prdA.' Stocks of A';
        }


        if($row['Product'] == "Product B" && $row['Stock'] >= $prdB && $prdB > 0)
        {
          if($prdB > 0)
            SOLD($row['stock_id'],$prdB,$row['Price']);
        }
        else if($row['Product'] == "Product B" &&  ($prdB < 0 || $prdB > $row['Stock']))
        {
          $final .= '<br>Invalid '.$prdB.' Stocks of B';
        }


        if($row['Product'] == "Product C" && $row['Stock'] >= $prdC && $prdC > 0)
        {
          if($prdC > 0)
            SOLD($row['stock_id'],$prdC,$row['Price']);
        }
        else if($row['Product'] == "Product C" &&  ($prdC < 0 || $prdC > $row['Stock']))
        {
          $final .= '<br>Invalid '.$prdC.' Stocks of C';
        }


      }
     }
        return $final;
  }
function SOLD($prd,$prd_val,$prd_price) 
  {
    global $con;
    $success = false;
    $qry="UPDATE stock_tbl SET Stock = Stock-".$prd_val." WHERE stock_id = '".$prd."';";
     if(mysqli_query($con, $qry))
    {     
      $qry="INSERT INTO log_tbl (prod_id,sell,price,status) values (".$prd.",".$prd_val.",".$prd_price.",'SELL');";
       if(mysqli_query($con, $qry))
      {     
          $success= true;
      }
    }
    return $success;
  }



   $sell_result = '';
   $compute_error = '';
   $IA=0;
   $IB=0;
   $IC=0;
   if(isset($_SESSION['rorer']))
   {
    $compute_error=$_SESSION['rorer'];
   }
   if(isset($_POST['sell_confirm']))
   {
       $IA=$_POST['PSA'];
       $IB=$_POST['PSB'];
       $IC=$_POST['PSC'];
    $_SESSION['rorer'] = procQ($_POST['PSA'],$_POST['PSB'],$_POST['PSC']);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;

   } 

    
?>
