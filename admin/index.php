<?php $page = "dashboard"; ?>
<?php include ('../backend/connect/conn.php');  ?>
<?php include ('../backend/controller/admincontrollers.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="../aset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../aset/css/style.css">
    <link rel="shortcut icon" href="/aset/Images/icon.jpeg" type="image/x-icon">
</head>
<body>
    

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark text-white">
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
            <div class="row pb-3">
                <h1>Pengumpulan Project Uas</h1>
            </div>
            <div class="row">
                <table class="table table-striped table-light table-hover text-center">
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
                                    <a href="detail.php?nim=<?= htmlspecialchars($value['nim']) ?>" class="text-dark text-decoration-none">
                                        <?= htmlspecialchars($value['nama']) ?>
                                        [<?= htmlspecialchars($value['nim']) ?>]
                                    </a>
                                </td>
                                <?php if (htmlspecialchars($value['status']) == 0) : ?>
                                    <td class="col-2 text-danger">Belum Mengumpulkan  [<?= htmlspecialchars($value['nilai']) ?>]</td>
                                <?php elseif (htmlspecialchars($value['status']) == 1) :?>
                                    <td class="col-2 text-warning">Menunggu Diperiksa [<?= htmlspecialchars($value['nilai']) ?>]</td>
                                <?php elseif (htmlspecialchars($value['status']) == 2) :?>
                                    <td class="col-2 text-success">Sudah Mengumpulkan [<?= htmlspecialchars($value['nilai']) ?>]</td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
      
      
      
    

    <script src="../aset/js/jquery-3.7.1.min.js"></script>
    <script src="../aset/js/bootstrap.bundle.min.js"></script>
    <script src="../aset/js/script.js"></script>
</body>
</html>