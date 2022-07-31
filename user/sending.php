<?php
include 'connection.php';
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="index.php" method="post">
      <label for="">Enter Message</label><br>
      <textarea name="msg" rows="8" cols="80"></textarea><br>
      <input type="submit" name="send" value="Send message">
    </form>
  </body>
</html>
<?php
if(isset($_POST["send"]))
{
  $n=8;
  function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
      }

    return $randomString;
  }

  $rawkey = getName($n);
  $input = $_POST["msg"];
  echo "Normal Text ".$input."<br>";
  $ciphring="AES-128-CTR";
  $option=0;
  $incp='1234567890123456';
  $encnpy_key=$rawkey;
  $encrypted=openssl_encrypt($input,$ciphring,$encnpy_key,$option,$incp);
  echo $encrypted;
  $start = time();
  $encnpy_key2=$rawkey;
  $decrypted=openssl_decrypt($encrypted,$ciphring,$encnpy_key2,$option,$incp);
  $end = time();
  $totalt=$end-$start;
  echo "<br>Again decrypted ".$decrypted." in ".$totalt."sec";
  $qur="INSERT INTO `message`(`message`, `unlockkey`) VALUES ('{$encrypted}','{$encnpy_key}')";
  if(mysqli_query($con,$qur))
  {
      echo "<script>alert('Message Sent');</script>";

  }
  else {
  echo "<script>alert('Message not sent');</script>";
  }
}
 ?>
