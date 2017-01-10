<?php
include_once 'core/init.php';

session_destroy();

echo "
	<script>
		window.alert('Anda telah melakukan logout');
		window.location.href='index.php';
	</script>
";

?>