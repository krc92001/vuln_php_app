<?php include "idsstub.php"; ?>

<?php
//php login info, super secure storage method ;)
// db name xss_webapp
$hostname = "localhost";
$dbuser = "php_admin";
$password = "phpadmin";
$db = "xss_webapp";

$dbconnect = mysqli_connect($hostname, $dbuser, $password, $db);

if ($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}

if ($result->isEmpty()) {
    // if the data passes the PHPIDS check we end up here

    $username = $_POST["username"];

    $pass = $_POST["Password"];

    try {

       // queries database using GetUserData stored procedure
       $sql = "call login_user('" . $username . "');";
        $query = mysqli_query($dbconnect, $sql);
        // checks the info
        $login_data = mysqli_fetch_array($query);
        //hashes password input

        $hashedPass = md5($pass);

        $row = $login_data;
            if ($row["password"] == $hashedPass && $login_data != null) {
                echo "<br> Welcome! " . $username;
            }
            else{
              if(!$login_data){
                echo "<br> User not found in database...";
              }else{echo "<br> Incorrect password try again...";}

            }

    }
    catch(exception $e){
      printf("<br>ERROR Logging in...");
    }
} else {
    echo "You really tried that, cmon now";
}


?>
