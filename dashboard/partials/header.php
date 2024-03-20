<?php
require '../partials/header.php';
//check login status
if(!isset($_SESSION['user-id'])){
    header('location: ' . ROOT_URL . 'sign-in.php');
    die();
}

?>
<style>
 <?php include '../css/dashboard.css'; ?>
 </style>


