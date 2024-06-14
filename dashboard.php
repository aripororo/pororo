<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="dashboard.php">My Cooks</a></h1>
            <ul>
                <li><a href="profil.php">Edit Akun</a></li>
                <li><a href="datafoto.php">Tambah Menu</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
    </header>
    <h1>Welcome, <?php echo $_SESSION['a_global']->username ?>!</h1>
    <p>You are now on the dashboard.</p>
    <a href="logout.php">Logout</a>
</body>

</html>