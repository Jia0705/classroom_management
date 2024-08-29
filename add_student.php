<?php

    // 1. collect database info
    $host = 'localhost';
    $database_name = "classroom_management"; // connecting to which database 
    $database_user = "root";
    $database_password = "GohSheryn0524_";

    // 2. connect to database (PDO - PHP database object)
    $database = new PDO(
        "mysql:host=$host;dbname=$database_name",
        $database_user, // username
        $database_password // password
    );

    $name = $_POST["student_name"];

    // 1. check whether the user insert a name
    if ( empty( $name ) ) {
        echo "Please insert a name";
    } else {
        // 2. add the student name to database
        // 2.1
        $sql = 'insert into students (`name`) values (:name)';

        // 2.2
        $query = $database->prepare($sql);

        // 2.3
        $query->execute(['name' => $name]);

            // 3. redirect the user back to index.php
        header("Location: index.php");
        exit;
        
        
    }