<?php 

    if($page == "admin_login") {

        session_start();
        if (isset($_SESSION['admin'])) {
            header("Location: ./");
            exit;
        }

        $key = "IYXNMRJKOV0NSNFNI2XMCG2SYSWKLOOZGROTO1QWVX9EKIONLBVXB64FIQSSZQ0DBEIMHIWBXHB7PTQ4FYAWT3SC0VDCK5N9YCMPQGFVUZRSWD0VAVNVQ2FUKO2AGAESTWWHOZWBW1YEDF9MSQWVTJDFJ64NQYAAHY0LJMQUPQEJFPJ7XBY4NGIEB3AK0DLKS5V9GKUXJZYONSKLPW0OTOGOJ2YNDH2TZTXLMPPAHSPUP1RXWY9FLJPOMCWYC64GJRTTAR0ECFJNIJXCYIC7QUR4GZBXU3TD0WEDL5O9ZDNQPFEUTYQRVC0UZUMUP2ETJN2ZFZDRSVVGNYVAV1XDCE9LRPVUSICEI64MPXZZGX0KILPTOPDIEOI7WAX4MFHDA3ZJ0CKJR5U9FJTWHXWMLQIJNU0MRMEMH2WLBF2RXRVJKNNYFQNSN1PVUW9DJHNMKAUWA64EHPRRYP0CADHLGHVAWGA7OSP4EXZVS3RB0UCBJ5M9XBLOQGFVUZRSWD0VAVNVQ2FUKO2AGAESTWWHOZWBW1YEDF9MSQWVTJDFJ64NQYAAHY0LJMQUPQEJFPJ7XBY4NGIEB3AK0DLKS5V9GKUXOEDTSXPQUB0TYTLTO2DSIM2YEYCQRUUFMXUZU1WCBD9KQOUTRHBDH64LOWYYFW0JHKOSNOCHDNH7VZW4LEGCZ3YI0BJIQ5T9EISVKAZPOTLMQX0PUPHPK2ZOEI2UAUYMNQQBITQVQ1SYXZ9GMKQPNDXZD64HKSUUBS0FDGKOJKYDZJD7RVS4HACYV3UE0XFEM5P9AEORPFEUTYQRVC0UZUMUP2ETJN2ZFZDRSVVGNYVAV1XDCE9LRPVUSICEI64MPXZZGX0KILPTOPDIEOI7WAX4MFHDA3ZJ0CKJR5U9FJTW";

            function caesarEncrypt($input, $shift) {
                $output = '';
            
                $input = strtoupper($input); // Convert input to uppercase for simplicity
                $length = strlen($input);
            
                for ($i = 0; $i < $length; $i++) {
                    $char = $input[$i];
            
                    // Encrypt uppercase letters (A-Z)
                    if (ctype_upper($char)) {
                        $output .= chr((ord($char) + $shift - 65) % 26 + 65);
                    } else {
                        // Leave non-alphabetic characters unchanged
                        $output .= $char;
                    }
                }
            
                return $output;
            }

            function hashPassword($password) {
                return password_hash($password, PASSWORD_DEFAULT);
            }

        if(empty($_GET['key'])) {

            header('Location: ../404.php');
            
            // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //     if (isset($_POST['inputkey'])) {
            //         $inputkey = $_POST['inputkey'];

            //         $encryptedKey1 = caesarEncrypt($inputkey, 10);
            //         $encryptedKey2 = caesarEncrypt($inputkey, 2);
            //         $encryptedKey3 = caesarEncrypt($inputkey, 3);
            //         $encryptedKey4 = caesarEncrypt($inputkey, 10);
            //         $encryptedKey5 = caesarEncrypt($inputkey, 9);
            //         $encryptedKey6 = caesarEncrypt($inputkey, 4);
            //         $encryptedKey7 = caesarEncrypt($inputkey, 1);
            //         $encryptedKey8 = caesarEncrypt($inputkey, 8);
            //         $encryptedKey9 = caesarEncrypt($inputkey, 9);
            //         $encryptedinputkey = $encryptedKey2.$encryptedKey1.$encryptedKey3.$encryptedKey5.$encryptedKey7.$encryptedKey4.$encryptedKey8.$encryptedKey6.$encryptedKey9;

            //         if($encryptedinputkey == $key) {
            //             $_SESSION['admin'] = "admin";
            //             header("Location: ./");
            //             exit;
            //         } else {
            //             echo "<script>alert('Key salah!');</script>";
            //             header("Location: ./login.php");
            //         }
            //     }
            // }
        } elseif (!empty($_GET['key'])){
            
            $inputkey = $_GET['key'];

            $encryptedKey1 = caesarEncrypt($inputkey, 10);
            $encryptedKey2 = caesarEncrypt($inputkey, 2);
            $encryptedKey3 = caesarEncrypt($inputkey, 3);
            $encryptedKey4 = caesarEncrypt($inputkey, 10);
            $encryptedKey5 = caesarEncrypt($inputkey, 9);
            $encryptedKey6 = caesarEncrypt($inputkey, 4);
            $encryptedKey7 = caesarEncrypt($inputkey, 1);
            $encryptedKey8 = caesarEncrypt($inputkey, 8);
            $encryptedKey9 = caesarEncrypt($inputkey, 9);
            $encryptedinputkey = $encryptedKey2.$encryptedKey1.$encryptedKey3.$encryptedKey5.$encryptedKey7.$encryptedKey4.$encryptedKey8.$encryptedKey6.$encryptedKey9;

            if($encryptedinputkey == $key) {
                $_SESSION['admin'] = "admin";
                header("Location: ./");
                exit;
            } else {
                echo "<script>alert('Key salah!');</script>";
                header("Location: ./login.php");
            }
        }

        
    }

    else if($page == "dashboard"){

        session_start();
        if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
            header("Location: login.php");
            exit;
        }

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
    
    } else if($page == "details") {

        session_start();
        if (!isset($_SESSION['admin']) || !$_SESSION['admin']) {
            header("Location: login.php");
            exit;
        }

        if(empty($_GET['nim'])){
            header("Location: dashboard.php");
        }
        $nim = mysqli_real_escape_string($conn, $_GET['nim']);

        $query = "SELECT * FROM mahasiswa WHERE nim = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $dataMahasiswaDetails = $result->fetch_assoc();
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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['set_status_to_0'])) {
                $nim = mysqli_real_escape_string($conn, $_POST['nim']);
                $status = 0;
                $query = "UPDATE mahasiswa SET status = ? WHERE nim = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $status, $nim);
                $stmt->execute();
                echo "<script>";
                echo "window.location.href = window.location.href;";
                echo "</script>";
            }
            elseif (isset($_POST['set_status_to_1'])) {
                $nim = mysqli_real_escape_string($conn, $_POST['nim']);
                $status = 1;
                $query = "UPDATE mahasiswa SET status = ? WHERE nim = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $status, $nim);
                $stmt->execute();
                echo "<script>";
                echo "window.location.href = window.location.href;";
                echo "</script>";
            }
            elseif (isset($_POST['set_status_to_2'])) {
                $nim = mysqli_real_escape_string($conn, $_POST['nim']);
                $status = 2;
                $query = "UPDATE mahasiswa SET status = ? WHERE nim = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ss", $status, $nim);
                $stmt->execute();
                echo "<script>";
                echo "window.location.href = window.location.href;";
                echo "</script>";
            } elseif (isset($_POST['update_nilai'])) {
                $nim = mysqli_real_escape_string($conn, $_POST['nim']);
                $nilai = intval($_POST['update_nilai']);
                $query = "UPDATE mahasiswa SET nilai = ? WHERE nim = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("is", $nilai, $nim);
                $stmt->execute();
                echo "<script>";
                echo "window.location.href = window.location.href;";
                echo "</script>";
            }
        }

        
    }
