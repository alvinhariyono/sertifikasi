<?php
// include database connection file
session_start();
include_once("../model/config.php");
$stok_id = $_GET['stok_id'];
$message = "ada di sini";

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
        "UPDATE stok SET stok_status  = 'unavailable', stok_peminjam = '$stok_peminjam',  tanggal_peminjaman  ='$tanggal_peminjaman',tanggal_pengembalian ='$tanggal_pengembalian'  WHERE stok_id=$stok_id"
    );

    // Redirect to homepage to display updated user in list
    header("Location: mainpage.php");
} else {
    // echo "<script type='text/javascript'>alert('$message');</script>";
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

$date = strtotime("+7 day");


while ($book_data = mysqli_fetch_array($result)) {
    $stok_id = $book_data['stok_id'];
    $stok_nama = $book_data['stok_nama'];
    $stok_kode = $book_data['stok_kode'];
    $stok_status = $book_data['stok_status'];
    $stok_peminjam = $book_data['stok_peminjam'];
    $tanggal_peminjaman = date("d-m-Y");
    $tanggal_pengembalian =  date('d-m-Y', $date);
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
    <title>pinjam buku</title>
</head>

<body>
    <a href="mainpage.php">back to Home Page</a>
    <br /><br />
    <?php
    echo "hari ini tanggal " . date("d-m-Y") . "<br>";
    //echo $hariini;
    $date = strtotime("+7 day");
    echo date('d-m-Y', $date);
    ?>
    <form name="update_user" method="post" action="pinjam.php">
        <table border="0">
            <tr>
                <td>stok_id</td>
                <td><?php echo $stok_id; ?></td>
            </tr>
            <tr>
                <td>stok_nama</td>
                <td><?php echo $stok_nama; ?></td>
            </tr>
            <tr>
                <td>stok_kode</td>
                <td><?php echo $stok_kode; ?></td>
            </tr>
            <tr>
                <td>stok_status</td>
                <td><?php echo $stok_status; ?></td>
            </tr>
            <tr>
                <td>stok_peminjam</td>
                <td><input type="text" size=100 name="tanggal_peminjaman" value="<?php echo $stok_peminjam; ?>"></td>
            </tr>
            <tr>
                <td>tanggal_peminjaman</td>
                <td><?php echo $tanggal_peminjaman; ?></td>
            </tr>
            <tr>
                <td>tanggal_pengembalian</td>
                <td><?php echo $tanggal_pengembalian; ?></td>
            </tr>

            <tr>

                <td><input type="hidden" name="stok_id" value="<?php echo $_GET['stok_id']; ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

<?php



?>



</html>