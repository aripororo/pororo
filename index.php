<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Menu Makanan</title>
    <link rel="stylesheet" href="styles.csss">
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background-color: #6DC5D1;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }

    nav {
        background-color: #6DC5D1;
        color: #fff;
        padding: 10px 0;
    }

    .button {
        color: #000000;
    }

    nav ul {
        list-style: none;
        padding: 0;
        text-align: center;
    }

    nav ul li {
        display: inline;
        margin: 0 15px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
    }

    main {
        padding: 20px;
    }

    h2 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    button {
        background-color: #6DC5D1;
        color: #fff;
        border: none;
        border-radius: 15px;
        padding: 5px 10px;
        cursor: pointer;
        margin-left: 20px;
    }

    button:hover {
        background-color: #CDE8E5;
    }

    footer {

        color: #000;
        text-align: center;
        padding: 10px 0;
        position: fixed;
        width: 100%;
        bottom: 0;
    }
</style>

<body>
    <header>
        <h1>My Cooks</h1>
    </header>
    <nav>
        <button><a href="login.php" class="button">Login</a></button>
        <button><a href="register.php" class="button">Register</a></button>
    </nav>
    <main>
        <section id="menu">
            <h2>Daftar Menu Makanan</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nama Makanan</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Admin</th>
                        <th>Status</th>
                        <th>Gambar</th>
                        <th>Tanggal Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'db.php';

                    // Query untuk mengambil data dari tb_image
                    $sql = "SELECT image_name, category_name, image_description, admin_name, image_status, image, date_created FROM tb_image";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Menampilkan data untuk setiap baris
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row["image_name"] . "</td>
                                    <td>" . $row["category_name"] . "</td>
                                    <td>" . $row["image_description"] . "</td>
                                    <td>" . $row["admin_name"] . "</td>
                                    <td>" . ($row["image_status"] ? 'Active' : 'Inactive') . "</td>
                                    <td>" . $row["image"] . "</td>
                                    <td>" . $row["date_created"] . "</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Dashboard Menu Makanan. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id =2");
$a = mysqli_fetch_object($kontak);

?>