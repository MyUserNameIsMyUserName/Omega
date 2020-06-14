<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['moduleName'])) {
            echo "POST moduleName is empty";
        } else {
            switch ($_POST['moduleName']) {
                case "users":
                    //echo "POST moduleName is users!";
                    if (empty($_POST["functionName"])){
                        echo "POST functionName is empty!";
                    } else {
                        switch ($_POST["functionName"]) {
                            case "getUserInfo":
                                //echo "functionName is getUserInfo";
                                echoJsonDemo();
                        }
                    }
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


function echoJsonDemo(){
    $data = [ 
        'demo_text_to_replace' => [
                            ["id" => 1, "title" => 'title'],
                            ["id" => 2, "title" => 'title2'],
                            ["id" => 3, "title" => 'title22'],
                            ],
        'second_variable' => -1 ,
        "yeaaa_variable" => "yeaaaaaValue"];
    echo json_encode( $data );
}