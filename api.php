<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['moduleName'])) {
        echo "POST moduleName is empty";
    } else {
        echo 'POST good '.$_POST['moduleName'];
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