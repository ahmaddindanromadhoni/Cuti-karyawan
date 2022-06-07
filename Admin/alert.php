<?php
	// login message
	if(isset($_GET['err']) && $_GET['err'] == "empty") {
		echo '<div class="alert alert-warning alert-dismissable">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		echo "Maaf, nama pengguna atau kata sandi belum diisi.";
		echo '</div>';
	}
	elseif(isset($_GET['err']) && $_GET['err'] == "not_found") {
		echo '<div class="alert alert-danger alert-dismissable">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		echo "Maaf, nama pengguna atau password salah.";
		echo '</div>';
	}?>