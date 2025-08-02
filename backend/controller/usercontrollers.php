<?php 

    if($page == "home") {

        session_start();
        if (isset($_SESSION['user'])) {
            header('Location: send.php');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['login_user'])) {
                if (isset($_POST['nim'])) {
                    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
                    $query = "SELECT * FROM mahasiswa WHERE nim = ? LIMIT 1";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $nim);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                        $_SESSION['user'] = $row['nim'];
                        header("Location: send.php");
                    } else {
                        echo "<script>";
                        echo "alert('Nim Tidak Ditemukan');";
                        echo "</script>";
                    }
                }

            }
        }
    }

    else if($page == "send") {
        session_start();
        if (!isset($_SESSION['user']) OR !$_SESSION['user']) {
            header('Location: ./');
            exit;
        }

        $nim = mysqli_real_escape_string($conn, $_SESSION['user']);
        $query = "SELECT * FROM mahasiswa WHERE nim = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $datamahasiswa = $result->fetch_assoc();
        }
        $stmt->close();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['send'])) {
                date_default_timezone_set('Asia/Jakarta');
                $datetime = date('Y-m-d H:i:s');
                $nim = mysqli_real_escape_string($conn, $_SESSION['user']);
                $url = mysqli_real_escape_string($conn, $_POST['url']);

                if (!preg_match("/^https?:\/\//i", $url)) {
                    $url = "https://" . $url;
                }                

                $query = "INSERT INTO pengumpulan (nim, url, waktu) VALUES (?, ?, ?)";
                $stmtInsert = $conn->prepare($query);
                $stmtInsert->bind_param("sss", $nim, $url, $datetime);
                if($stmtInsert->execute()) {
                    $status = 1;
                    $nim = mysqli_real_escape_string($conn, $_SESSION['user']);
                    $query = "UPDATE mahasiswa SET status = ? WHERE nim = ?";
                    $stmtUpdate = $conn->prepare($query);
                    $stmtUpdate->bind_param("ss", $status, $nim);
                    if($stmtUpdate->execute()){

                        if (ini_get("session.use_cookies")) {
                            $params = session_get_cookie_params();
                            setcookie(session_name(), '', time() - 42000,
                                $params["path"], $params["domain"],
                                $params["secure"], $params["httponly"]
                            );
                        }

                        session_destroy();

                        header("Location: ./success.php");
                        exit;
                    }
                }
            }
        }
    }

    else if($page == "list") {

        if(empty($_GET['nim'])) {
            
            $showdetails = 0;
            $query = "SELECT * FROM mahasiswa ORDER BY id ASC";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            $dataMahasiswa = array();
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                    $dataMahasiswa[] = $row;
                }
            }
            $stmt->close();
        } elseif(!empty($_GET['nim'])){
            $showdetails = 1;
            $nim = mysqli_real_escape_string($conn, $_GET['nim']);

            $query = "SELECT * FROM mahasiswa WHERE nim = ? LIMIT 1";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $nim);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $dataMahasiswaDetails = $result->fetch_assoc();
            } else {
                header("Location: ./list.php");
            }
            $stmt->close();

            $nim = mysqli_real_escape_string($conn, $_GET['nim']);
            $query = "SELECT * FROM pengumpulan WHERE nim = ? ORDER BY id DESC";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $nim);
            $stmt->execute();
            $result = $stmt->get_result();
            $dataPengumpulan = array();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_array()) {
                    $dataPengumpulan[] = $row;
                }
            } else {
                $status = 0;    
            }
            $stmt->close();
        }

    }