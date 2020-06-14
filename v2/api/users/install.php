<?php
//Block direct access to file
if ( ! defined( 'OMEGA_LOC' ) ) exit;

function installUsers(){
    // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    $sql = "CREATE TABLE omega_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        return "<div class='install-message success'>Table omega_users created successfully</div>";
    } else {
        return "<div class='install-message error'>Error creating table: " . $conn->error . "</div>";
    }

    $conn->close();
}
?>