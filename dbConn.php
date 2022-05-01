<?php

function pdo_connect_mysql() {
    // connect to the database
    $host = 'localhost';
    $user = 'root';
    $password = 'Kolya__1';
    $dbname = 'prof';

    $options = [
       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
       PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
       PDO::ATTR_EMULATE_PREPARES => false,
    ];


    try {
        return new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', $user, $password, $options);
    } catch (PDOException $exception) {
        // If there is an error with the connection, stop the script and display the error.
        die ('Connection failed!' . $e->getMessage);
    }
}