<?php include_once('core/init.php'); ?>
<?php include_once('template/header.php'); ?>

<!-- Form Login -->
<div class="row">
    <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
        <div class="form-login">
            <div class="panel panel-default">
                <div class="panel-heading"><h2 class="text-center">Form Registration</h2></div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" action="<?php echo BASE_URL.'validate_regist.php'?>">
                        <?php
                        	// error notification
                            $notif = isset($_GET['notif'])?$_GET['notif']:false;
                            if ($notif == 'empty'):
                                echo "<div class='alert alert-danger text-center'>Form tidak boleh kosong</div>";
                            elseif ($notif == 'password'):
                                echo "<div class='alert alert-danger text-center'>Password salah!</div>";
                            elseif ($notif == 'disable'):
                                echo "<div class='alert alert-danger text-center'>Maaf, status anda di non-aktifkan! Silahkan hubungi administrator</div>";
                            elseif ($notif == 'char'):
                                echo "<div class='alert alert-danger text-center'>Password minimal 6 karakter kombinasi huruf, angka dan simbol.<br>Misal: P@ssw0rd</div>";
                            endif;
                        ?>
                        
						<div class="form-group">
                            <label class="control-label col-sm-3" for="nama">Nama Lengkap </label>
                            <div class="col-sm-9">
                                <input type="text" name="namalengkap" id="nama" class="form-control" required="" placeholder="example: Batman and Robin" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Email </label>
                            <div class="col-sm-9">
                                <input type="email" name="emailuser" id="email" class="form-control" required="" placeholder="example: batman@gotham.com" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pass">Password </label>
                            <div class="col-sm-9">
                                <input type="password" name="password" id="pass" class="form-control" required="" minlength="6" placeholder="Minimal 6 karakter kombinasi huruf, angka dan simbol" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="level">Level </label>
                            <div class="col-sm-9">
	                            <select name="level" class="form-control">
	                            <?php 

	                            	// menampilkan list level
	                            	$query = "SELECT * FROM level";
	                            	$result = $link->query($query);

	                            	if ($result->num_rows > 0) {
	                            		foreach ($result as $v) {
	                            			echo "
	                            				<option value=\"$v[kode_level]\">".ucfirst($v['nama_level'])."</option>}
	                            				option
	                            			";
	                            		}
	                            	}
	                            ?>
	                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="status">Status</label>
                            <div class="col-sm-9">
                                <select name="status" class="form-control">
                                	<option value="0">Tidak Aktif</option>
                                	<option value="1">Aktif</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-9">
                                <input type="submit" name="btn-daftar" value="Daftar" class="btn btn-block btn-primary" />
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
