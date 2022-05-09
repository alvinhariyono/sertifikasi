<?php
session_start();
include_once("../model/config.php");

$stok_id = $_GET['stok_id'];
echo $stok_id;

$result = mysqli_query($mysqli, " UPDATE `stok` SET `stok_delete` = '1' WHERE `stok`.`stok_id` = '$stok_id'");

header("Location: ../view/mainpage.php");
