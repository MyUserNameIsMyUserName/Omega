<?php

//DEFINE INSTALL DEBUG
## SHOULD DISABLE ONCE INSTALL DEVELOPMENT IS DONE
define("OMEGA_INSTALL_DEBUG", true);
//

?>

<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $usernameErr = $passwordErr = $hostErr = "";
$name = $username = $password = $host = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["username"])) {
    $usernameErr = "username is required";
  } else {
    $username = test_input($_POST["username"]);
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
  
  if (empty($_POST["host"])) {
    $hostErr = "host is required";
  } else {
    $host = test_input($_POST["host"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Host: <input type="text" name="host" value="<?php echo $host;?>">
  <span class="error">* <?php echo $hostErr;?></span>
  <br><br>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if (defined("OMEGA_INSTALL_DEBUG") == true) {
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $username;
    echo "<br>";
    echo $password;
    echo "<br>";
    echo $host;
    echo "<br>";
}
?>

</body>
</html>




<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $configSampleFile = "config-sample.php";
  if(file_exists($configSampleFile)){
    $myFileLink = fopen($configSampleFile, 'r');
    $configSample = fread($myFileLink, filesize($configSampleFile));
    fclose($myFileLink);
    $configSample = replaceValues($configSample, $name, $username, $password, $host);
    $configFile = fopen("config.php", "w") or die("Unable to open file!");
    fwrite($configFile, $configSample);
    fclose($configFile);
  }else{
    echo 'file not found';
  }
}

if (defined("OMEGA_INSTALL_DEBUG") == true){
  echo "DEEEEBUG";
  if(file_exists($configSampleFile)){
    rename($configSampleFile,".".$configSampleFile);
  }else{
    echo 'file not found';
  }
} else {
  if(file_exists($configSampleFile)){
    unlink($configSampleFile);
  }else{
    echo 'file not found';
  }
}


function replaceValues($configSample, $name, $username, $password, $host) {
  $configSample = str_replace("[>DB_NAME<]",$name, $configSample);
  $configSample = str_replace("[>DB_USER<]",$username, $configSample);
  $configSample = str_replace("[>DB_PASS<]",$password, $configSample);
  $configSample = str_replace("[>DB_HOST<]",$host, $configSample);
  return $configSample;
}
?>