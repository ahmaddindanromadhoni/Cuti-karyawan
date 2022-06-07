<?php
// delete message
	if(isset($_GET['act']) && $_GET['act'] == "delete" && $_GET['msg'] == "success") {
		echo '<div class="alert alert-success alert-dismissable">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		echo "Data berhasil dihapus.";
		echo '</div>';
	}
	elseif(isset($_GET['act']) && $_GET['act'] == "delete" && $_GET['msg'] == "fail") {
		echo '<div class="alert alert-danger alert-dismissable">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		echo "Gagal menghapus data.";
		echo '</div>';
	}
	if(isset($_GET['act']) && $_GET['act'] == "update" && $_GET['msg'] == "success") {
		echo '<div class="alert alert-info alert-dismissable">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		echo "Data berhasil diperbarui.";
		echo '</div>';
	}
	elseif(isset($_GET['act']) && $_GET['act'] == "update" && $_GET['msg'] == "fail") {
		echo '<div class="alert alert-danger alert-dismissable">';
		echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		echo "Gagal memperbarui data.";
		echo '</div>';
	}