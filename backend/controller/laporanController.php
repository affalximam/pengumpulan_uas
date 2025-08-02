<?php 

    session_start();
    if (!isset($_SESSION['admin'])) {
        header("Location: ./");
        exit;
    }

    $query = "SELECT * FROM mahasiswa ORDER BY id ASC";
    $stmtShow = $conn->prepare($query);
    $stmtShow->execute();
    $result = $stmtShow->get_result();
    $mahasiswa = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_array()) {
            $mahasiswa[] = $row;
        }
    }
    $stmtShow->close();

    function getUrl($conn, $nim) {
        $query = "SELECT * FROM pengumpulan WHERE nim = ?";
        $stmtShow = $conn->prepare($query);
        $stmtShow->bind_param("s", $nim);
        $stmtShow->execute();
        $result = $stmtShow->get_result();
        $urls = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $urls[] = $row['url'];
            }
        }
        return $urls;
    }
