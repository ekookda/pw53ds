<?php include_once('functions/user.php'); ?>
<?php include_once('template/header.php'); ?>

<!-- Form Login -->
<div class="row">
    <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <div class="form-login">
            <div class="panel panel-default">
                <div class="panel-heading"><h2 class="text-center">Web User Login</h2></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo BASE_URL.'validate.php'?>">
                        <?php
                            $notif = isset($_GET['notif'])?$_GET['notif']:false;
                            if ($notif == 'empty'):
                                echo "<div class='alert alert-danger'>Form tidak boleh kosong</div>";
                            elseif ($notif == 'password'):
                                echo "<div class='alert alert-danger'>Password salah!</div>";
                            elseif ($notif == 'disable'):
                                echo "<div class='alert alert-danger text-center'>Maaf, status anda di non-aktifkan! Silahkan hubungi administrator</div>";
                            elseif ($notif == 'notlogin'):
                                echo "<div class='alert alert-danger text-center'>Maaf, anda harus login dulu.</div>";
                            endif;

                        ?>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Email </label>
                            <div class="col-sm-9">
                                <input type="text" name="emailuser" id="email" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pass">Password </label>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="pass" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-9">
                                <input type="submit" name="btn-login" value="Login" class="btn btn-block btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-center">Copyright <i class="glyphicon glyphicon-copyright-mark"></i> <?php echo date("Y") ?> </div>
            </div>
        </div>
    </div>
</div>

<?php include_once('template/footer-js.php'); ?>

<?php include_once('template/footer.php'); ?>
