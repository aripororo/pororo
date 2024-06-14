<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Sertakan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../Menu-Makan/styles.css">
    <title>Login</title>
</head>

<body id="bg-login">
    <div class="login">
        <img src="../Menu-Makan/img/login-bg.png" alt="image" class="login__bg">
        <form action="" method="post" class="login__form">
            <h1 class="login__title">Login</h1>
            <div class="login__inputs">
                <div class="login__box">
                    <input type="text" name="user" placeholder="Username"  required class="login__input" class="input-control">
                    <i class="ri-mail-fill"></i>
                </div>
                <div class="login__box">
                    <input type="password" name="pass" placeholder="Password" required class="login__input" class="input-control">
                    <i class="ri-lock-2-fill"></i>
                </div>
            </div>
            <div class="login__check">
                <div class="login__check-box">
                    <input type="checkbox" class="login__check-input" id="user-check">
                    <label for="user-check" class="login__check-label">Remember me</label>
                </div>
                <a href="#" class="login__forgot">Forgot Password?</a>
            </div>
            <button type="submit" name="submit" value="login" class="login__button">Login</button>
            <div class="login__register">
                Don't have an account? <a href="register.php">Register</a>
            </div>
        </form>
    </div>

 <?php
      if(isset($_POST['submit'])){
			session_start();
			include 'db.php';

         $user = mysqli_real_escape_string($conn, $_POST['user']);
			$pass = mysqli_real_escape_string($conn, $_POST['pass']);
			$cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."'AND password = '".$pass."'");
		
      if(mysqli_num_rows($cek) > 0){
			$d = mysqli_fetch_object($cek);
			$_SESSION['status_login'] = true;
			$_SESSION['a_global'] = $d;
			$_SESSION['id'] = $d->admin_id;
			echo '<script>window.location="dashboard.php"</script>';
		}else{
			echo '<script>alert("Username atau password anda salah")</script>';
		}
	}
   ?>
</body>

</html>