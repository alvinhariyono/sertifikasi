<?php
session_start();
require_once('config.php');


$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['user_login'] = $username;


$sql = "SELECT * FROM user WHERE username = ? AND password = ? LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$username, $password]);

if ($result) {
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if ($stmtselect->rowCount() > 0) {
		$_SESSION['userlogin'] = $user;

		echo 'login sukses';
	} else {
		echo 'username atau password salah';
	}
} else {
	echo 'There were errors while connecting to database.';
}
