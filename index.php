<?php $page = "home"; ?>
<?php include ('backend/connect/conn.php'); ?> 
<?php include ('backend/controller/usercontrollers.php'); ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENGUMPULAN PROJECT UAS MATA KULIAH PEMROGRAMAN WEB 1</title>
    <link rel="stylesheet" href="aset/css/bootstrap.min.css">
    <link rel="stylesheet" href="aset/css/style.css">
    <link rel="shortcut icon" href="/aset/Images/icon.jpeg" type="image/x-icon">
</head>
<body>
    
    <div id="particles-js"></div>
    <section class="jumbotron d-flex flex-column justify-content-center align-content-center text-white font-saira">
        <div class="container">
            <div class="row text-center">
                <h1>PENGUMPULAN PROJECT UAS</h1>
                <h2>MATA KULIAH PEMROGRAMAN WEB 1</h2>
                <p class="fs-4"><span class="fw-bold">Tugas :</span> Buatlah sebuah website sederhana menggunakan framework CSS, Lalu upload ke Online Hosting agar bisa dikunjungi melalui internet.</p>
                <h3 class="mb-5">Timer : <span id="countdown"></span></h3>
            </div>
            <div class="row">
                <form method="POST">
                    <div class="col-lg-6 offset-lg-3 form-floating mb-3">
                        <input type="text" name="nim" class="form-control shadow-none transparent-input text-dark" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput" class="text-dark">Masukan NIM [KAPITAL]</label>
                    </div>
                    <div class="col-lg-6 offset-lg-3">
                        <button type="submit" name="login_user" class="btn btn-lg btn-secondary w-100 rounded-3">Login</button>
                    </div>
                </form>
            </div>
            <div class="row mt-3">
                <a href="./list.php" class="link-light text-decoration-none text-center fs-4 mt-3">Sudah Mengumpulkan?  </a>
            </div>
        </div>
    </section>
    

    <script src="aset/js/jquery-3.7.1.min.js"></script>
    <script src="aset/js/bootstrap.bundle.min.js"></script>
    <script src="aset/js/particless.js"></script>
    <script src="aset/js/script.js"></script>
    <script src="aset/js/timer.js"></script>
</body>
</html>