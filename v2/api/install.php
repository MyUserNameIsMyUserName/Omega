<?php

//DEFINE INSTALL DEBUG
## SHOULD DISABLE ONCE INSTALL DEVELOPMENT IS DONE
define("OMEGA_INSTALL_DEBUG", true);
//




////////

$installResult = "";
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
$postError = 0;
$nameErr = $usernameErr = $passwordErr = $hostErr = "";
$name = $username = $password = $host = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  echo '<div class="install-section">';


  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $postError = $postError + 1;
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["username"])) {
    $usernameErr = "username is required";
    $postError = $postError + 1;
  } else {
    $username = test_input($_POST["username"]);
  }
  
  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
    $postError = $postError + 1;
  } else {
    $password = test_input($_POST["password"]);
  }
  
  if (empty($_POST["host"])) {
    $hostErr = "host is required";
    $postError = $postError + 1;
  } else {
    $host = test_input($_POST["host"]);
  }
 if ($postError == 0){
  echo '<h2 class="sectionTitle">Config generate/delete</h2> '; 
  $configSampleFile = "config-sample.php";
  if(file_exists($configSampleFile)){
    $myFileLink = fopen($configSampleFile, 'r');
    $configSample = fread($myFileLink, filesize($configSampleFile));
    fclose($myFileLink);
    $configSample = replaceValues($configSample, $name, $username, $password, $host);
    $configFile = fopen("config.php", "w") or die("Unable to open file!");
    fwrite($configFile, $configSample);
    fclose($configFile);
    echo "<div class='install-message success'>Created config.php file</div>";
  }else{
    echo "<div class='install-message error'>Missing config-sample.php file</div>";
  }

    
  if (defined("OMEGA_INSTALL_DEBUG") == true){
    if(file_exists($configSampleFile)){
      rename($configSampleFile,".".$configSampleFile);
      rename(".".$configSampleFile,$configSampleFile);
      echo "<div class='install-message success'>config-sample.php deleted</div>";
    }else{
      echo "<div class='install-message error'>config-sample.php not found</div>";
    }
  } else {
    if(file_exists($configSampleFile)){
      //unlink($configSampleFile);
      rename($configSampleFile,".".$configSampleFile);
      echo "<div class='install-message success'>config-sample.php deleted</div>";
    }else{
      echo "<div class='install-message error'>config-sample.php not found</div>";
    }
  }



  if(file_exists('config.php')){
    include_once ('config.php');
    echo "<div class='install-message success'>Existing Config.php</div>";
    
    echo "<hr><h2> Modules install </h2>";
    if(file_exists('system_status/install.php')){
      include_once ('system_status/install.php');
      echo installApiModule('Omega System Status', 'system_status');
    } else {
      echo "<div class='install-message error'>[System Status] Missing system_status/install.php</div>";
    }
    if(file_exists('users/install.php')){
      include_once ('users/install.php');
      echo installApiModule('Omega Users', 'users');
    } else {
      echo "<div class='install-message error'>[Users] Missing users/install.php</div>";
    }
  } else {
    echo "<div class='install-message error'>Missing Config.php</div>";
  }
  
  if (defined("OMEGA_INSTALL_DEBUG") == true) {
    echo "<h2>Database config results:</h2> ";
    echo "Name: ".$name;
    echo "<br>";
    echo "Username: ".$username;
    echo "<br>";
    echo "Password: ".$password;
    echo "<br>";
    echo "Host: ".$host;
    echo "<br>";
  }
  echo '</div>';

}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if (($_SERVER["REQUEST_METHOD"] == "GET") || ($postError > 0)) {
  
?>

<div class="install-section">
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="input-sec">  
    Name: <div><input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span></div>
  </div>
  <div class="input-sec">  
    Username: <div><input type="text" name="username" value="<?php echo $username;?>">
    <span class="error">* <?php echo $usernameErr;?></span></div>
  </div>
  <div class="input-sec">  
  Password: <div><input type="text" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span></div>
  </div>
  <div class="input-sec">  
  Host: <div><input type="text" name="host" value="<?php echo $host;?>">
  <span class="error">* <?php echo $hostErr;?></span></div>
  </div>
  <input type="submit" name="submit" value="Submit">  
</form>
</div>
<?php

}


?>







<?php 
/////////////helper functions

function replaceValues($configSample, $name, $username, $password, $host) {
  $configSample = str_replace("[>DB_NAME<]",$name, $configSample);
  $configSample = str_replace("[>DB_USER<]",$username, $configSample);
  $configSample = str_replace("[>DB_PASS<]",$password, $configSample);
  $configSample = str_replace("[>DB_HOST<]",$host, $configSample);
  return $configSample;
}


function installApiModule($module_name, $module_folder) {
  $installResult = "";
  if (file_exists($module_folder.'/install.php')){  
    if (defined("OMEGA_INSTALL_DEBUG") == true){
      rename($module_folder.'/install.php', $module_folder.'/.install.php');
      rename($module_folder.'/.install.php', $module_folder.'/install.php');
      $installResult = $installResult."<div class='install-message success'>[".$module_name."] > ".$module_folder."/install.php deleted</div>";
    } else {
      //unlink($module_folder.'/install.php');
      rename($module_folder.'/install.php', $module_folder.'/.install.php');
      $installResult = $installResult."<div class='install-message success'>[".$module_name."] > ".$module_folder."/install.php deleted</div>";
    }
  } else {
    $installResult = "<div class='install-message error'>Missing <strong>".$module_name."</strong\> module install file!</div>";
  }
  return $installResult;
}

function installOmegaConfigTables(){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    $sql = "CREATE TABLE ".$table_prefix."modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_name VARCHAR(30),
    installed_by VARCHAR(30),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table ".$table_prefix."modules created successfully";
    } else {
        echo "Error creating table ".$table_prefix."modules: " . $conn->error;
    }

    $conn->close();
}

function saveInstalledApiModule($module_name, $module_folder){

}











?>

<style>
  body{
    background: #555555;
    color: whitesmoke;
    font-family: monospace;
  }
  .install-section{
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    padding: 20px 30px;
    background: #272727;
  }
  .install-message  {
    padding: 5px 10px;
    font-size: 20px;
    font-weight: 400;
    margin: 5px 0px;
  }
  .success {
    background: green;
    border-left: 5px solid darkgreen;
    color: white;
  }
  .error {
    background: red;
    border-left: 5px solid darkred;
    color: white;
  }
  form {
    display: flex;
    flex-direction: column;
    font-size: 20px;
  }

  .input-sec {
    display: flex;
    flex-direction: row;
    place-content: space-between;
    margin: 5px 0;
  }
  .input-sec > div {
    min-width: 50%;
    display: flex;
    flex-direction: row;
  }

  input[type="text"] {
    width: 100%;
    padding: 5px 10px;
    background: black;
    border: none;
    border-bottom: 2px solid green;
    font-size: 18px;
    font-weight: 400; 
    color: white;
  }

  .input-sec .error {
    background: none;
    border: none;
    color: red;
    margin-left: -15px;
  }
  form input[type=submit] {
    background: green;
    border: none;
    padding: 10px 20px;
    width: fit-content;
    color: white;
    font-size: 20px;
    letter-spacing: 1px;
    margin: 0 auto;
    margin-top: 20px;
  }
</style>
</body>
</html>
