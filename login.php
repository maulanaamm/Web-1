<?php
session_start();

// Simulasi data pengguna yang valid
$validUsername = 'admin';
$validPassword = 'password';

// Cek apakah pengguna telah mengirimkan form login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah data yang dikirim pengguna valid
    if ($username === $validUsername && $password === $validPassword) {
        // Jika berhasil, simpan data pengguna ke session
        $_SESSION['username'] = $username;
        $_SESSION['loggedIn'] = true;

        // ke halaman setelah login sukses
        header('Location: landing_page.html');
        exit;
    } else {
        // Jika gagal, tampilkan pesan error
        $errorMessage = 'Username atau password salah';
    }
}

// Jika pengguna telah login, langsung ke halaman index.html
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    header('Location: landing_page.html');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Wisata Website - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="icon.png">
<body>
    <header>
        <h1>Selamat datang di Website Wisata</h1>
        <nav>
            <ul>
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Destinasi</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="landing_page.html">Kembali</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="login-form">
        <h2>Login</h2>
        <?php if (isset($errorMessage)) : ?>
            <p class="error-message"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            
            <input type="submit" value="Login">
        </form>
    </div>
    
    <footer>
        <p>Hak Cipta &copy; 2023 Kelompok 2. All rights reserved.</p>
    </footer>
</body>
</html>
