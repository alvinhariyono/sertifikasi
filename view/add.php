<html>

<head>
	<title>Add Users</title>
</head>

<body>
	<a href="mainpage.php">Back to Home Page</a>
	<br /><br />
	<!--
	<th>stok_id</th>
            <th>stok_nama</th>
            <th>stok_kode</th>
            <th>stok_status</th>
            <th>stok_peminjam</th>
            <th>tanggal_peminjaman</th>
            <th>tanggal_pengembalian</th>
-->

	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>stok_nama</td>
				<td><input type="text" name="stok_nama"></td>
			</tr>
			<tr>
				<td>stok_kode</td>
				<td><input type="text" name="stok_kode"></td>
			</tr>

			<tr>
				<td></td>

				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>

	<?php
	session_start();
	include_once("../model/config.php");
	$array_user = $_SESSION['userlogin'];
	$user_login_id = $array_user['user_id'];
	// Check If form submitted, insert form data into users table.
	if (isset($_POST['Submit'])) {
		$stok_nama = $_POST['stok_nama'];
		$stok_kode = $_POST['stok_kode'];

		// include database connection file
		include_once("../model/config.php");

		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO stok(stok_nama,stok_kode,stok_peminjam,user_id) VALUES('$stok_nama','$stok_kode','-','$user_login_id ')");

		// Show message when user added
		echo "buku berhasil di tambah. <a href='mainpage.php'>view stok buku</a>";
	}


	/*
	// Check If form submitted, insert form data into users table.
	if (isset($_POST['Submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];

		// include database connection file
		include_once("config.php");

		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO users(name,email,mobile) VALUES('$name','$email','$mobile')");

		// Show message when user added
		echo "User added successfully. <a href='mainpage.php'>View Users</a>";
	}

*/

	?>
</body>

</html>