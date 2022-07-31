<?php
include 'connection.php';
if(isset($_POST["unlock"]))
{
  $sql='SELECT * FROM `message` where id=1';
  $query=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($query);
  $ciphring="AES-128-CTR";
  $option=0;
  $incp='1234567890123456';
  $encnpy_key=$row[2];
  if($_POST["keyval"]==$encnpy_key)
  {
    $decrypted=openssl_decrypt($row[1],$ciphring,$encnpy_key,$option,$incp);
    echo "The message is ".$decrypted;
    $qur="UPDATE `msg` SET `chance`='3' WHERE slno=3";
    $sv = mysqli_query($con,$qur);
  }
  else {
    $xx=$row[3]-1;
    if($xx>0)
    {
    echo "<script>alert('Enter Correct Key and you have ".$xx." chance left')</script>";
    }
    $num=$row[3]-1;
    $qur="UPDATE `msg` SET `chance`='{$num}' WHERE slno=3";
    $sv = mysqli_query($con,$qur);
    if($num==0)
    {
      $qur="DELETE FROM `msg` WHERE slno=3";
      $sv = mysqli_query($con,$qur);
      echo "<script>alert('All chances are over and the message is deleted')</script>";
    }
    else if($num<0)
    {
      echo "<script>alert('The message is already deleted')</script>";
    }
  }

}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form action="unlock.php" method="post">
       <label for="">Enter Key</label>
       <input type="text" name="keyval" placeholder="Enter Key">
       <input type="submit" name="unlock" value="Unlock Message">
     </form>
   </body>
 </html>
