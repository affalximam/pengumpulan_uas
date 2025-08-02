<?php $page = "send"; ?>
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
    
    <div id="particles-js" class="particles-js"></div>
    <section class="send pt-5 pb-5">
        <div class="content px-2 px-lg-5 py-5 m-auto rounded-4 text-white font-saira">
            <div class="row banner">
                <img src="aset/Images/203690603-726e50ce-2cf6-4b62-82ee-d51ed9100f05.gif"  class="w-100" alt="" srcset="">
            </div>
            <div class="row mt-4">
                <h1>PENGUMPULAN PROJECT UAS</h1>
                <h2>MATA KULIAH PEMROGRAMAN WEB 1</h2>
            </div>
            <div class="row mt-3 text-justify">
                <p class="fs-4 fw-bold mb-0">Tugas : </p>
                <p class="fs-5">Buatlah sebuah website sederhana menggunakan framework CSS, Lalu upload ke Online Hosting agar bisa dikunjungi melalui internet.</p>
            </div>
            <div class="row">
                <form method="POST">
                    <div class="mb-3 mt-3">
                        <label for="exampleFormControlInput1" class="form-label fs-4">NIM : </label>
                        <input type="text" name="nim" class="form-control form-control-lg" id="exampleFormControlInput1" required placeholder="Masukan NIM"  value="<?= htmlspecialchars($datamahasiswa['nim']) ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fs-4">NAMA : </label>
                        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" required placeholder="Masukan Nama"  value="<?= htmlspecialchars($datamahasiswa['nama']) ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fs-4">PRODI : </label>
                        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1" required placeholder="Masukan Prodi"  value="<?= htmlspecialchars($datamahasiswa['prodi']) ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fs-4">URL WEB : </label>
                        <input type="text" name="url" class="form-control form-control-lg" id="url" required placeholder="https://">
                    </div>
                    <div class="row mt-5">
                        <div class="mb-3 col-md-3 col-sm-6">
                            <a href="./logout.php" class="btn btn-lg btn-danger w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-square me-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                                  </svg>
                                 KEMBALI
                            </a>
                        </div>
                        <div class="mb-3 col-md-3 offset-md-6 col-sm-6">
                            <button type="submit" name="send" class="btn btn-lg btn-success w-100">KIRIM  
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-square ms-2" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row mt-3" id="iframe-container">
                <iframe id="liveIframe" src="" height="720px"></iframe>
            </div>
        </div>
    </section>
    

    <script src="aset/js/jquery-3.7.1.min.js"></script>
    <script src="aset/js/bootstrap.bundle.min.js"></script>
    <script src="aset/js/particless.js"></script>
    <script src="aset/js/script.js"></script>

</body>
</html>
