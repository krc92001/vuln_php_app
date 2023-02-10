<?php
if (isset($_POST['captcha']) && $_POST['captcha'] == 1) {
  $localIP = getHostByName(getHostName());
  header("Location: /login.php");
  
  
} else {
  echo "CAPTCHA verification failed.";
}
?>
