<html>
<h1>RECYLE BIN</h1>

</html>
<?php
session_start();
echo "Hai, " . $_SESSION['user_login'];
include_once("../model/config.php");

$result = mysqli_query($mysqli, "SELECT * FROM stok where stok_delete = '1' ORDER BY stok_id ASC");

?>
<html>
<title>RECYLE BIN</title>

<a class="btn btn-primary" href="../index.php?logout=true">Logout</a>
<br>

</html>


<html>

<head>
    <title>Rcycle bin</title>
</head>

<body>


    <a href="mainpage.php">back to Home Page</a><br /> <br />
    <table width='80%' border=1>

        <tr>
            <th>stok_id</th>
            <th>Image</th>
            <th>judul buku</th>
            <th>kode buku</th>
            <th>status buku</th>
            <th>nama peminjam</th>
            <th>tanggal peminjaman</th>
            <th>tanggal pengembalian</th>
            <th>no admin pengurus</th>
        </tr>
        <?php
        while ($book_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $book_data['stok_id'] . "</td>";
            echo "<td>" . "<img src='../upload/" . $book_data['stok_image'] . "' height='130' width='150' >" . "</td>";
            echo "<td>" . $book_data['stok_nama'] . "</td>";
            echo "<td>" . $book_data['stok_kode'] . "</td>";
            echo "<td>" . $book_data['stok_status'] . "</td>";
            echo "<td>" . $book_data['stok_peminjam'] . "</td>";
            echo "<td>" . $book_data['tanggal_peminjaman'] . "</td>";
            echo "<td>" . $book_data['tanggal_pengembalian'] . "</td>";
            echo "<td>" . $book_data['user_id'] . "</td>";
            echo "<td> <a href='../model/urungkan_delete.php?stok_id=$book_data[stok_id]'>Urungkan delete</a> | <a href='../model/delete.php?stok_id=$book_data[stok_id]'>Delete Permanen</a></td></tr>";
        }


        ?>
    </table>

</body>

</html>