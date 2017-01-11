<?php include_once '../init.php'; ?>

<?php if (!$_SESSION['user']) header('Location: ../login.php?page=login&notif=notlogin'); ?>

<?php include_once "../template/header.php"; ?>

<!-- kontent staff -->
<div class="welcome">
	<h2 class="alert alert-info text-center">Selamat datang <strong><?php echo $_SESSION['user']; ?></strong>, anda login sebagai <?php echo $_SESSION['level']; ?></h2>
</div>

<!-- Form Login -->
<div class="row">
    <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <div class="form-edit">
            <div class="panel panel-default">
                <div class="panel-heading"><h2 class="text-center">Form Edit Data</h2></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="update.php">
                        <?php
                        	// error notification
                            $notif = isset($_GET['notif'])?$_GET['notif']:false;
                            if ($notif == 'empty'):
                                echo "<div class='alert alert-danger text-center'>Form tidak boleh kosong</div>";
							elseif ($notif == 'gagal'):
								echo "<div class='alert alert-danger text-center'>Data gagal disimpan</div>";
                            endif;
                        ?>
                        <?php
                            // tampilkan data user berdasarkan user_id
                            $user_id = isset($_GET['id'])?$_GET['id']:false;
							$sess_level = isset($_SESSION['level'])?$_SESSION['level']:false;
                            $select  = "SELECT * FROM level INNER JOIN users ON level.kode_level=users.kode_level WHERE users.user_id='$user_id'";
                            $exec = mysqli_query($link, $select);

                            if (mysqli_num_rows($exec) > 0) {
                                $r = mysqli_fetch_assoc($exec);
                        ?>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="id"></label>
                            <div class="col-sm-9">
                                <input type="hidden" name="user_id" id="id_user" value="<?php echo $r['user_id']; ?>" />
                            </div>
                        </div>

						<div class="form-group">
                            <label class="control-label col-sm-3" for="id"></label>
                            <div class="col-sm-9">
                                <input type="hidden" name="tgl_register" id="regist" value="<?php echo $r['tgl_input']; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="nama">Nama Lengkap </label>
                            <div class="col-sm-9">
                                <input type="text" name="namalengkap" id="nama" class="form-control" required="" placeholder="example: Batman and Robin" value="<?php echo $r['nama_lengkap']; ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Email </label>
                            <div class="col-sm-9">
                                <input type="email" name="emailuser" id="email" class="form-control" disabled="" required="" placeholder="example: batman@gotham.com" value="<?php echo $r['email']; ?>" />
								<span class="text-danger"><small>email tidak bisa diubah</small></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="status">Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control">
                                	<option value="0" <?php if($r['status'] == 0) { echo "selected"; } ?>>Tidak Aktif</option>
                                	<option value="1" <?php if($r['status'] == 1) { echo "selected"; } ?>>Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="level">Level </label>
                            <div class="col-sm-9">
	                            <select name="level" class="form-control">
	                        <?php
                            	// menampilkan list level
                            	$query = "SELECT * FROM level";
                            	$result = mysqli_query($link, $query);

                            	if (mysqli_num_rows($result) > 0) {
                            		foreach ($result as $v) {
							?>
								<option value="<?php echo $v['kode_level']; ?>" <?php if($r['kode_level'] == $v['kode_level']) { echo "selected"; } ?>><?php echo ucfirst($v['nama_level']); ?></option>
	                        <?php
									}
                            	}
							}
	                        ?>
	                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-9">
                                <input type="submit" name="btn-update" value="Simpan" class="btn btn-block btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-center">Copyright <i class="glyphicon glyphicon-copyright-mark"></i> <?php echo date("Y"); ?> </div>
            </div>
        </div>
    </div>
</div>

<?php include_once '../template/footer-js.php'; ?>

<?php include_once '../template/footer.php'; ?>
