<?php $page = "list"; ?>
<?php include ('backend/connect/conn.php');  ?>
<?php include ('backend/controller/usercontrollers.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumpulan Project Uas</title>
    <link rel="stylesheet" href="aset/css/bootstrap.min.css">
    <link rel="stylesheet" href="aset/css/style.css">
    <link rel="shortcut icon" href="/aset/Images/icon.jpeg" type="image/x-icon">
</head>
<body class="bg-dark">

    <div id="particles-js"></div>
    <section class="list bg-dark text-light pb-5 pt-5 font-saira">
        <div class="content bg-dark-1 mx-auto mt-5 pt-5 pb-5 rounded rounded-4">
            <?php if ($showdetails == 0) : ?>
                <div class="container">
                    <div class="row">
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
                        <h1>Pengumpulan Project Uas</h1>
                    </div>
                    <div class="row px-2">
                        <table class="table table-striped table-dark table-hover text-center">
                            <thead>
                                <th scope="row">NO</th>
                                <th scope="row">Nama</th>
                                <th scope="row">Status [Nilai]</th>
                            </thead>
                            <tbody>
                                <?php foreach ($dataMahasiswa as $key => $value) : ?>
                                    <tr>
                                        <th scope="row" class="col-1">
                                        <?= htmlspecialchars($key + 1) ?>
                                        </th>
                                        <td class="col-2">
                                            <a href="?nim=<?= htmlspecialchars($value['nim']) ?>" class="text-white text-decoration-none w-100">
                                                <span class="me-2"><?= htmlspecialchars($value['nama']) ?></span>
                                                [<span class="text-white"><?= htmlspecialchars($value['nim']) ?></span>]
                                            </a>
                                        </td>
                                        <?php if (htmlspecialchars($value['status']) == 0) : ?>
                                            <td class="col-2 text-danger-1">Belum Mengumpulkan [<?= htmlspecialchars($value['nilai']) ?>]</td>
                                        <?php elseif (htmlspecialchars($value['status']) == 1) :?>
                                            <td class="col-2 text-warning">Menunggu Diperiksa [<?= htmlspecialchars($value['nilai']) ?>]</td>
                                        <?php elseif (htmlspecialchars($value['status']) == 2) :?>
                                            <td class="col-2 text-success-1">Sudah Mengumpulkan [<?= htmlspecialchars($value['nilai']) ?>]</td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php elseif  ($showdetails == 1) : ?>
                <div class="container">
                    <div class="row">
                        <div class="col-6 col-sm-4 col-lg-4 col-xl-3">
                            <a href="./list.php" class="btn btn-md btn-secondary mb-3 w-100">
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
                                <p class="fs-4">Belum Mengumpulkan </p>
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
                            <p class="fs-4"><?= htmlspecialchars($dataMahasiswaDetails['nilai']) ?></p>
                        </div>
                    </div>
                    <?php foreach ($dataPengumpulan as $key => $value) : ?>
                        <div class="row">
                            <div class="col-md-3 col-6">
                                <p class="fw-bolder fs-4">Tanggal/Waktu </p>
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
                                <p class="fs-4"><a href=" <?= htmlspecialchars($value['url']) ?>" target="_blank" class="text-light text-decoration-none"> <?= htmlspecialchars($value['url']) ?></a></p>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <iframe src=" <?= htmlspecialchars($value['url']) ?>" frameborder="0" height="720"></iframe>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
        
    </section>
      
      
      
    

    <script src="aset/js/jquery-3.7.1.min.js"></script>
    <script src="aset/js/bootstrap.bundle.min.js"></script>
    <script src="aset/js/particless.js"></script>
    <script src="aset/js/script.js"></script>
</body>
</html>