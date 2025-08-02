<?php $page = "details"; ?>
<?php include ('../backend/connect/conn.php');  ?>
<?php include ('../backend/controller/admincontrollers.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengumpulan Project Uas</title>
    <link rel="stylesheet" href="../aset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../aset/css/style.css">
    <link rel="shortcut icon" href="/aset/Images/icon.jpeg" type="image/x-icon">
</head>
<body class="bg-light-1">
    

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark text-white fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand font-saira">DASHBOARD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-auto justify-content-end" id="navbarText">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white font-saira" href="./">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-saira" href="./generate_pdf.php">Cetak Pdf</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-saira" href="../">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-saira" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="bg-light-1 text-dark pb-5 pt-5 font-saira">
        <div class="container">
            <div class="row mt-5">
                <div class="col-6 col-sm-4 col-lg-4 col-xl-3">
                    <a href="./" class="btn btn-md btn-secondary mb-3 w-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
            <div class="row pb-3">
                <h1>Detail Pengumpulan Project Uas</h1>
            </div>
            <div class="row">
                <div class="col-md-3 col-3">
                    <p class="fw-bolder fs-4">Nama</p>
                </div>
                <div class="col-md-1 col-1 fs-4">:</div>
                <div class="col-md-8">
                    <p class="fs-4"><?= htmlspecialchars($dataMahasiswaDetails['nama']) ?></p>
                </div>
                <div class="col-md-3 col-3">
                    <p class="fw-bolder fs-4">Nim</p>
                </div>
                <div class="col-md-1 col-1 fs-4">:</div>
                <div class="col-md-8">
                    <p class="fs-4"><?= htmlspecialchars($dataMahasiswaDetails['nim']) ?></p>
                </div>
                <div class="col-md-3 col-3">
                    <p class="fw-bolder fs-4">Prodi</p>
                </div>
                <div class="col-md-1 col-1 fs-4">:</div>
                <div class="col-md-8">
                    <p class="fs-4"><?= htmlspecialchars($dataMahasiswaDetails['prodi']) ?></p>
                </div>
                <div class="col-md-3 col-3">
                    <p class="fw-bolder fs-4">Status</p>
                </div>
                <div class="col-md-1 col-1 fs-4">:</div>
                <div class="col-md-8">
                    <?php if (intval($dataMahasiswaDetails['status']) == 0) : ?>
                        <p class="fs-4">Belum Mengumpulkan</p>
                    <?php elseif (intval($dataMahasiswaDetails['status']) == 1) : ?>
                        <p class="fs-4">Menunggu Diperiksa</p>
                    <?php elseif (intval($dataMahasiswaDetails['status']) == 2) : ?>
                        <p class="fs-4">Sudah Mengumpulkan</p>
                    <?php endif; ?>
                </div>
                <div class="col-md-3 col-3">
                    <p class="fw-bolder fs-4">Nilai</p>
                </div>
                <div class="col-md-1 col-1 fs-4">:</div>
                <div class="col-md-8">
                    <form method="POST">
                        <input type="hidden" name="nim" value="<?= htmlspecialchars($dataMahasiswaDetails['nim']) ?>">
                        <input type="number" name="update_nilai" class="form-control" value="<?= htmlspecialchars($dataMahasiswaDetails['nilai']) ?>">
                    </form>
                </div>
            </div>
            <?php foreach ($dataPengumpulan as $key => $value) : ?>
                <div class="row">
                    <div class="col-md-3 col-6">
                        <p class="fw-bolder fs-4">Tangga/Waktu </p>
                    </div>
                    <div class="col-md-1 col-1 fs-4">:</div>
                    <div class="col-md-8">
                        <p class="fs-4"><?= htmlspecialchars(date( 'd-m-Y/H:i:s', strtotime($value['waktu']))); ?></p>

                    </div>
                    <div class="col-md-3 col-3">
                        <p class="fw-bolder fs-4">Url </p>
                    </div>
                    <div class="col-md-1 col-1 fs-4">:</div>
                    <div class="col-md-8">
                        <p class="fs-4"><a href=" <?= htmlspecialchars($value['url']) ?>" target="_blank" class="text-dark text-decoration-none"> <?= htmlspecialchars($value['url']) ?></a></p>
                    </div>
                </div>
                <div class="row mb-5">
                    <iframe src=" <?= htmlspecialchars($value['url']) ?>" frameborder="0" height="720"></iframe>
                </div>
            <?php endforeach; ?>
            <div class="row pt-5 pb-5">
                <h2 class="font-saira">ACTION</h2>
                <div class="col-sm-6 col-xl-3">
                    <form method="POST">
                        <input type="hidden" name="nim" value="<?= htmlspecialchars($dataMahasiswaDetails['nim']) ?>">
                        <button type="submit" name="set_status_to_0" class="btn btn-danger w-100 mb-3">Jadikan Belum Mengumpulkan</button>
                    </form>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <form method="POST">
                        <input type="hidden" name="nim" value="<?= htmlspecialchars($dataMahasiswaDetails['nim']) ?>">
                        <button type="submit" name="set_status_to_1" class="btn btn-warning w-100 mb-3">Jadikan Menunggu Diperiksa</button>
                    </form>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <form method="POST">
                        <input type="hidden" name="nim" value="<?= htmlspecialchars($dataMahasiswaDetails['nim']) ?>">
                        <button type="submit" name="set_status_to_2" class="btn btn-success w-100 mb-3">Jadikan Sudah Mengumpulkan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
      
      
      
    

    <script src="../aset/js/jquery-3.7.1.min.js"></script>
    <script src="../aset/js/bootstrap.bundle.min.js"></script>
    <script src="../aset/js/script.js"></script>
</body>
</html>