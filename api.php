<?php
define( "OMEGA_LOC" , "Snksaoo1239!-5XX");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['moduleName'])) {
            echo "POST moduleName is empty";
        } else {
            switch ($_POST['moduleName']) {
                case "users":
                    echo "POST moduleName is users!";
                    break;
                case "access_tokens":
                    include "api/access_tokens/functions.php";
                    echo "POST moduleName is access_tokens! getAccessToken() =>>  ".getAccessToken();
                    break;
                default:
                    echo "POST moduleName is undefined";
                };
        }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET['moduleName'])) {
      echo "GET moduleName is empty";
    } else {
      echo 'GET good '.$_GET['moduleName'];
    }
} else {
    echo "missing request method";
}