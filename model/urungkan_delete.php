<?php
// include database connection file
include_once("../model/config.php");
session_start();
// Get id from URL to delete that user
$stok_id = $_GET['stok_id'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "UPDATE `stok` SET `stok_delete` = '0' WHERE `stok`.`stok_id` = '$stok_id'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location: ../view/recycle_bin.php");
