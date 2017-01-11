<?php include_once '../init.php'; ?>
<?php
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $query = "DELETE FROM users WHERE user_id='$user_id'";

    $exec  = mysqli_query($link, $query);

    if ($exec) {
        header('Location: index.php?page=manager&act=del');
    }
}

?>
