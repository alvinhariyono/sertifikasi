<html>
<h1>EDIT PAGE</h1>

</html>
<?php
// include database connection file

include_once("../model/config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['update'])) {
	$stok_id = $_POST['stok_id'];
	$stok_nama = $_POST['stok_nama'];
	$stok_kode = $_POST['stok_kode'];
	$stok_status = $_POST['stok_status'];
	$stok_peminjam = $_POST['stok_peminjam'];
	$tanggal_peminjaman = $_POST['tanggal_peminjaman'];
	$tanggal_pengembalian = $_POST['tanggal_pengembalian'];

	// update book data
	$result = mysqli_query(
		$mysqli,
		"UPDATE `stok` SET `stok_id` = '$stok_id ', `stok_nama` = '$stok_nama', `stok_kode` = '$stok_kode', `stok_status` = '$stok_status', `stok_peminjam` = '$stok_peminjam', `stok_delete` = '0' WHERE `stok`.`stok_id` = '$stok_id'"
	);

	// Redirect to homepage to display updated user in list
	header("Location: mainpage.php");
}
?>
<?php
// Display selected book data based on id
// Getting id from url
session_start();
include_once("../model/config.php");
$stok_id = $_GET['stok_id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM stok WHERE stok_id=$stok_id");


while ($book_data = mysqli_fetch_array($result)) {
	$stok_id = $book_data['stok_id'];
	$stok_nama = $book_data['stok_nama'];
	$stok_kode = $book_data['stok_kode'];
	$stok_status = $book_data['stok_status'];
	$stok_peminjam = $book_data['stok_peminjam'];
	$tanggal_peminjaman = $book_data['tanggal_peminjaman'];
	$tanggal_pengembalian = $book_data['tanggal_pengembalian'];
}
?>
<html>

<!--
	<th>stok_id</th>
            <th>stok_nama</th>
            <th>stok_kode</th>
            <th>stok_status</th>
            <th>stok_peminjam</th>
            <th>tanggal_peminjaman</th>
            <th>tanggal_pengembalian</th>
-->

<head>
	<title>Edit User Data</title>
</head>

<body>
	<a href="mainpage.php">back to Home Page</a>
	<br /><br />

	<form name="update_buku" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>stok_id</td>
				<td><input type="text" size=100 name="stok_id" value="<?php echo $stok_id; ?>"></td>
			</tr>
			<tr>
				<td>stok_nama</td>
				<td><input type="text" size=100 name="stok_nama" value="<?php echo $stok_nama; ?>"></td>
			</tr>
			<tr>
				<td>stok_kode</td>
				<td><input type="text" size=100 name="stok_kode" value="<?php echo $stok_kode; ?>"></td>
			</tr>
			<tr>
				<td>stok_status</td>
				<td><input type="text" size=100 name="stok_status" value="<?php echo $stok_status; ?>"></td>
			</tr>
			<tr>
				<td>stok_peminjam</td>
				<td><input type="text" size=100 name="stok_peminjam" value="<?php echo $stok_peminjam; ?>"></td>
			</tr>
			<tr>
				<td>tanggal_peminjaman</td>
				<td><input type="text" size=100 name="tanggal_peminjaman" value="<?php echo $tanggal_peminjaman; ?>"></td>
			</tr>
			<tr>
				<td>tanggal_pengembalian</td>
				<td><input type="text" size=100 name="tanggal_pengembalian" value="<?php echo $tanggal_pengembalian; ?>"></td>
			</tr>


			<tr>
				<td><input type="hidden" name="stok_id" value="<?php echo $_GET['stok_id']; ?>"></td>
				<td><input type="submit" name='update' value="update"></td>
			</tr>
		</table>
	</form>
</body>




</html>