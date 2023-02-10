<?php
include 'rate_limit.php';
?>
<form action="verify.php" method="post">
  <input type="checkbox" name="captcha" value="1"> I am not a robot<br><br>
  <input type="submit" value="Submit">
</form>
