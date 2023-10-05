<?php
// Koneksi ke database (gantilah dengan informasi koneksi Anda)
$servername = "localhost";
$username = "username";
$password = "password";
$database = "nama_database";

$conn = new mysqli($servername, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data barang (grocery)
$sql = "SELECT * FROM cicrud";
$result = $conn->query($sql);

// Tutup koneksi database jika sudah selesai mengambil data
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Manage Data</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <!-- Tambahkan kolom lain sesuai dengan struktur tabel Anda -->
                </tr>
            </thead>
            <tbody>
                <?php
                // Perulangan untuk menampilkan data dari hasil query
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["Nama_Barang"] . "</td>";
                        echo "<td>" . $row["Harga"] . "</td>";
                        // Tambahkan kolom lain sesuai dengan struktur tabel Anda
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data barang.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>