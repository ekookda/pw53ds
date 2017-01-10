<?php
include_once('core/init.php');

if (isset($_POST['btn-login'])){
    $email = $_POST['emailuser'];
    $pass  = $_POST['password'];

    if (!empty($email) && !empty($pass)) {
        if(injection($email, $pass)){
            $query = "SELECT * FROM users INNER JOIN level ON users.kode_level=level.kode_level WHERE users.email='$email'";
            $exec  = mysqli_query($link, $query);

            if (mysqli_num_rows($exec) == 1){
                $row = mysqli_fetch_assoc($exec);
                // cek password
                if (password_verify($pass, $row['password'])){
                    // cek status
                    if ($row['status'] == 1){
                        // jika status == 1, aktifkan session
                        $_SESSION['user']   = $row['nama_lengkap'];
                        $_SESSION['user_id']= $row['user_id'];
                        $_SESSION['status'] = $row['status'];
                        $_SESSION['level']  = $row['nama_level'];

                        $level = $row['kode_level'];
                        if ($level == 'mgr') {
                            header('Location:'.BASE_URL.'manager/index.php?page=manager');
                        } elseif ($level == 'spv'){
                            header('Location:'.BASE_URL.'supervisor/index.php?page=supervisor');
                        } else {
                            header('Location:'.BASE_URL.'staff/index.php?page=staff');
                        }
                    } else {
                        // status disable(0), direct ke form login
                        header('Location: '.BASE_URL.'login.php?page=login&notif=disable');
                    }
                } else {
                    // password salah, direct ke form login
                    header('Location:'.BASE_URL.'login.php?page=login&notif=password');
                }
            } else {
                // jika datanya tidak ada di database
                echo "
                    <script>
                        window.alert('Username belum terdaftar. Silahkan registrasi');
                        window.location.href='register.php?page=registrasi'
                    </script>
                ";
            }
        }
    } else {
        header('Location: '.BASE_URL.'login.php?page=login&notif=empty');
    }
}

?>
