<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galleri foto</title>
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
</head>
<body>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="profil.php">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
<main>
        <section id="menu">
            <h2>Daftar Menu Makanan</h2>
            <button><a href="tambah.php" class="button">Tambah Menu</a></button>
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                require 'db.php';
                // Query untuk mengambil data dari tb_image
                $sql = "SELECT image_id, image_name, category_name, image_description, admin_name, image_status, image, date_created FROM tb_image";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data untuk setiap baris
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["image_name"]) . "</td>
                                <td>" . htmlspecialchars($row["category_name"]) . "</td>
                                <td>" . htmlspecialchars($row["image_description"]) . "</td>
                                <td>" . htmlspecialchars($row["admin_name"]) . "</td>
                                <td>" . ($row["image_status"] ? 'Active' : 'Inactive') . "</td>
                                <td><img src='img/" . htmlspecialchars($row["image"]) . "' width='50'></td>
                                <td>" . htmlspecialchars($row["date_created"]) . "</td>
                                <td>
                                    <a href='update.php?id=" . htmlspecialchars($row["image_id"]) . "'>Update</a>
                                    <a href='delete.php?id=" . htmlspecialchars($row["image_id"]) . "' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Delete</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Tidak ada data</td></tr>"; // Perbaikan colspan untuk mencakup semua kolom
                }

                $conn->close();
                ?>
            </tbody>


            </table>
        </section>
    </main>
</body>
</html>