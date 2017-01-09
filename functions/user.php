<?php
define('BASE_URL', 'http://localhost/pw53ds/');

function __autoload($include) {
    include $include.'.php';
}

// validasi login
function injection($email, $password) {
    global $link;
    $email      = trim(mysqli_real_escape_string($link, $email));
    $password   = trim(mysqli_real_escape_string($link, $password));

    return true;
}

function sql_injection($value)
{
    global $link;
    $value = trim(mysqli_real_escape_string($link, $value));
    return $value;
}

function view_level() {
    global $link;
    $query = "SELECT * FROM level";

    $exec  = $link->query($query);

    return $exec;
}


function regex_password($subject) {
    // $pattern = "/^[a-zA-Z0-9!@#$%^&*()_+<>?:]/";
    $pattern_tolower = "/[a-z]/";
    $pattern_toupper = "/[A-Z]/";
    $pattern_digit   = "/[0-9]/";
    $pattern_symbol = "/[!@#$%^&*()_+<>?:]/";

    $msg="karakter harus mengandung angka, huruf, dan simbol";

    if(strlen($subject) > 5){ // cek jumlah karakter minimal 6
        // cek karakter huruf kecil
        if(preg_match($pattern_tolower, $subject)){
            // cek karakter huruf besar
            if(preg_match($pattern_toupper, $subject)){
                // cek karakter angka digit
                if(preg_match($pattern_digit, $subject)){
                    // cek karakter simbol
                    if(preg_match($pattern_symbol, $subject)){
                        $msg="Berhasil. Simbol mengandung karakter angka, huruf, dan simbol";
                    } else {
                        $msg="karakter kombinasi angka, huruf, dan simbol";
                    }
                } else {
                    $msg="karakter kombinasi angka, huruf, dan simbol";
                }
            } else {
                $msg="karakter kombinasi angka, huruf, dan simbol";
            }
        } else {
            $msg="anda hanya menggunakan abjad. karakter kombinasi angka, huruf, dan simbol";
        }
    } else {
        $msg="Password minimal 6 karakter kombinasi angka, huruf, dan simbol";
    }
    return $msg;
}
?>
