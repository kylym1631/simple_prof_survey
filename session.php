<?php 
session_start();


if(!isset($_SESSION["name"]) || $_SESSION["surname"] !== true){
    header("location: login.php");
    exit;
}