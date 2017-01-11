<?php include_once '../init.php'; ?>

<?php if (!$_SESSION['user']) header('Location: ../login.php?page=login&notif=notlogin'); ?>

<?php include_once "../template/header.php"; ?>

<!-- kontent staff -->
<div class="welcome">
	<h2 class="pesan text-center">Selamat datang <strong><?php echo $_SESSION['user']; ?></strong>, anda login sebagai <?php echo $_SESSION['level']; ?></h2>
</div>

<div class="data-table">
	<?php
		$notif = isset($_GET['act'])?$_GET['act']:false;

		if ($notif == 'del') {
			echo "<div class='alert alert-danger'>Data sudah terhapus</div>";
		}
	?>
	<h3 class="text-center">Data User</h3>
	<table class="table table-striped table-hover" border="1">
		<thead>
			<tr>
				<th class="text-center">#</th>
				<th class="text-center">Nama Lengkap</th>
				<th class="text-center">Email</th>
				<th class="text-center">Status</th>
				<th class="text-center">Level</th>
				<th class="text-center">Tgl Registrasi</th>
				<th class="text-center" colspan="2">Action</th>
			</tr>
        </thead>
        <tbody>
		<?php
			$id_user = $_SESSION['user_id'];

			$query = "SELECT * FROM users INNER JOIN level ON users.kode_level=level.kode_level ORDER BY tgl_input ASC";

			$result = mysqli_query($link, $query);

			if (mysqli_num_rows($result) > 0) {
				$no = 1;
				while ($k = mysqli_fetch_assoc($result)) {
		?>
					<tr>
						<td class="text-center"><?php echo $no; ?></td>
						<td><?php echo $k['nama_lengkap']; ?></td>
						<td class="text-center"><?php echo $k['email']; ?></td>
						<?php
							$status = $k['status'];
							switch ($status) {
								case '0':
									$msg = "Disable";
									break;

								default:
									$msg = "Aktif";
									break;
							}
						?>
						<td class="text-center"><?php echo $msg; ?></td>
						<td class="text-center"><?php echo $k['nama_level']; ?></td>
						<td class="text-center"><?php echo $k['tgl_input']; ?></td>
						<?php
							$sessid = $_SESSION['user_id'];
							if ($sessid == $k['user_id']) {
						?>
								<td class="text-center"><a href="edit.php?id=<?php echo $k['user_id'];?>"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
								<td class="text-center"><a href="#"><i class="glyphicon glyphicon-trash"></i> Hapus</a></td>
						<?php } else { ?>
								<td class="text-center"><a href="edit.php?id=<?php echo $k['user_id'];?>"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
								<td class="text-center"><a href="hapus.php?id=<?php echo $k['user_id'];?>" onclick="confirm()"><i class="glyphicon glyphicon-trash"></i> Hapus</a></td>
						<?php } ?>
					</tr>
		<?php
					$no++;
				}
			}
		?>
		</tbody>
	</table>
</div>

<?php include_once '../template/footer-js.php'; ?>

<script type="text/javascript">
function confirm() {
	var c = window.confirm("Anda yakin ingin menghapus data ini ?");
	if (c == true) {
		return true;
	} else {
		return false;
	}
}
</script>

<?php include_once '../template/footer.php'; ?>
