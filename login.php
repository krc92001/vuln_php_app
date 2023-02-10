<html>
<style>
form {
    display: flex;
    flex-direction: column;
    align-items: left;
    width: 50%;
    margin: 50px auto;
    padding: 15px;
    background-color: #f2f2f2;
    border: 1px solid #ccc;
    border-radius: 10px;
  }
  
  label {
    font-weight: bold;
    margin-bottom: 10px;
  }
  
  textarea {
    width: 100%;
    height: 150px;
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-family: sans-serif;
    font-size: 14px;
  }
  
  button[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  #bodyTitle {
  font-size: 20px;
  font-weight: bold;
  color: black;
  text-align: center;
  }


</style>

<title> This is Definitely a XSS Proof Website </title>

<div id="bodyTitle"> Try and exploit using XSS attacks... or login normally!</div>

<?php include 'rate_limit.php';?>

<body>
<form action="your-server-side-script.php" method="post">
<label for="name">Enter your username!</label>
<input id="username" name="username">
<label for="pass"> Enter your Password!</label>
<input type="password" id="pass" name="Password" required> 
<input type="submit" value="login">

</form>


</body>

</html>
