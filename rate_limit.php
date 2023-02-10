<?php
echo "rate limiter active";
function connect_to_db(){

  $hostname = "localhost";
  $dbuser = "php_admin";
  $password = "phpadmin";
  $db = "xss_webapp";

  $dbconnect = mysqli_connect($hostname, $dbuser, $password, $db);
  
  if ($dbconnect->connect_error) {
      die("Database connection failed: " . $dbconnect->connect_error);
  }
  return $dbconnect;
}
$cur_time = time();


//queries

$sql1 = "call check_ip2('" . $_SERVER['REMOTE_ADDR'] . "');";
$block_query = "call log_ip2('" . $_SERVER['REMOTE_ADDR'] . "'," . $cur_time . ");";
$update_login  = "call update_logtime('". $_SERVER['REMOTE_ADDR'] . "'," . $cur_time . ");";
// echo $sql1 . "<br>" .  $block_query;

$db_sess = connect_to_db();
try{
  // check to see if ip has previously logged in
  $query = mysqli_query($db_sess,$sql1);
  $ip_info = mysqli_fetch_array($query);
  $db_sess -> close();

}catch(exception $e){
  echo $e;
}


if($ip_info["ip"] != $_SERVER['REMOTE_ADDR']){
  // insert data into spreadsheet if nothing is returned
  $db_sess = connect_to_db();
  echo "user has never logged in before. logging in rate limiter";
  $new_query = mysqli_query($db_sess, $block_query);
  $db_sess -> close();
}


else{
  //cache login time
  $last_log = $cur_time - intval($ip_info["time"]);

  //update last login time
  $db_sess = connect_to_db();
  $third_query = mysqli_query($db_sess, $update_login);
  $db_sess -> close();

  //check to see if login time was within last 5 seconds
  if($last_log < 5){
    echo "<br>slow down there... its only been " . $last_log ." seconds since you tried logging in";
    sleep(1);
    header("Location: /limit.php");
  }

}


?>