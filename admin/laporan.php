<?php include ('../backend/connect/conn.php');  ?>
<?php include ('../backend/controller/laporanController.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
</head>
<body>
    <h1 style="font-size: 20px;">Pengumpulan UAS Mata Kuliah Pemrograman Web 1 Program Studi Teknik Informatika STIMIK Tunas Bangsa Banjarengara</h1>
    <hr style="border-bottom: 2px solid black";>
    <p style="font-size: 16px;margin: 5px 0 5px 0;"><span style="font-weight: bold;">Tugas : </span> Buatlah sebuah website sederhana menggunakan framework CSS, Lalu upload ke Online Hosting agar bisa dikunjungi melalui internet.</p>
    <p style="font-size: 16px;margin: 5px 0 5px 0;"><span style="font-weight: bold;">Link Pengumpulan : </span> https://ife22.my.id/</p>
    <p style="font-size: 16px;margin: 5px 0 5px 0;"><span style="font-weight: bold;">Batas Akhir : </span> 15 Juli 2024, Pukul 18:00 WIB</p>

    <hr style="border-bottom: 2px solid black;">
    <table style="width: 100%; border-collapse: collapse; margin-bottom: 1rem; font-size: 12px;">
        <thead">
            <th style="font-weight: bold; border-bottom: 1px solid black;">NO</th>
            <td style="font-weight: bold; padding: 5px 0 5px 0; border-bottom: 1px solid black;">Nama</td>
            <td style="font-weight: bold; padding: 5px 0 5px 0; border-bottom: 1px solid black;">Nim</td>
            <td style="font-weight: bold; padding: 5px 0 5px 0; border-bottom: 1px solid black;">Url Web</td>
            <td style="font-weight: bold; padding: 5px 0 5px 0; border-bottom: 1px solid black;">Nilai</td>
        </thead>
        <tbody>
            <?php foreach($mahasiswa as  $key => $value) : ?>
                <tr style="border-bottom: 1px solid black;">
                    <th style="font-weight: bold;"><?= intval( $key + 1) ?></th>
                    <td style="padding: 5px 0 5px 0;"><?= htmlspecialchars( $value['nama']) ?></td>
                    <td style="padding: 5px 0 5px 0;"><?= htmlspecialchars( $value['nim']) ?></td>
                    <?php  if($value['status'] == 2) : ?>
                        <?php $nim = htmlspecialchars( $value['nim']); ?>
                        <?php $urls = getUrl($conn, $nim); ?>
                        <td style="padding: 5px 0 5px 0;">
                            <?php foreach($urls as $url) : ?>
                                <a href="<?= htmlspecialchars($url); ?>" style="text-decoration: none; color: black;"><?= htmlspecialchars($url); ?></a>
                            <?php endforeach; ?>
                        </td>
                    <?php else : ?>
                        <td>-</td>
                    <?php endif; ?>
                    <td style="padding: 5px 0 5px 0;"><?= htmlspecialchars( $value['nilai']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p style="font-size: 16px;">
        <span style="font-weight: bold;">Diunduh dari : </span>
        <a style="text-decoration: none; color: black;" href="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>"><?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?></a>
    </p>

</body>
</html>