<?php
session_start();
echo "Hai, " . $_SESSION['user_login'];
include_once("../model/config.php");

$result = mysqli_query($mysqli, "SELECT * FROM stok ORDER BY stok_id ASC");

?>
<html>
<a class="btn btn-primary" href="../index.php?logout=true">Logout</a>
<br>

</html>


<html>

<head>
    <title>Home page</title>
</head>

<body>
    <a href="add.php">Add books</a><br /><br />

    <table width='80%' border=1>

        <tr>
            <th>stok_id</th>
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
            echo "<td>" . $book_data['stok_nama'] . "</td>";
            echo "<td>" . $book_data['stok_kode'] . "</td>";
            echo "<td>" . $book_data['stok_status'] . "</td>";
            echo "<td>" . $book_data['stok_peminjam'] . "</td>";
            echo "<td>" . $book_data['tanggal_peminjaman'] . "</td>";
            echo "<td>" . $book_data['tanggal_pengembalian'] . "</td>";
            echo "<td>" . $book_data['user_id'] . "</td>";
            echo "<td> <a href='pinjam.php?stok_id=$book_data[stok_id]'>Pinjam</a>|<a href='kembalikan.php?stok_id=$book_data[stok_id]'>Kembalikan</a> |<a href='edit.php?stok_id=$book_data[stok_id]'>Edit</a> | <a href='delete.php?stok_id=$book_data[stok_id]'>Delete</a></td></tr>";
        }
        ?>
    </table>

</body>

</html>