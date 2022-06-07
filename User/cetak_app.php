<?php
	include("sess_check.php");
	$no 	 = $_GET['no_cuti'];
	$sql = "SELECT cuti.*, employee.* FROM cuti, employee WHERE cuti.nik=employee.nik
			AND cuti.no_cuti ='$no'";
	$query = mysqli_query($koneksi,$sql);
	$result = mysqli_fetch_array($query);
	// deskripsi halaman
	$pagedesc = "Cetak Form Cuti";
	$pagetitle = str_replace(" ", "_", $pagedesc)
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Cuti Karyawan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.min.css">
  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
</head>

<body>
	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">FORM PENGAJUAN CUTI (APPROVED)</h4>
      <hr>
			<br />
			<br />
			<table class="table table-bordered">
<h3>
				<tbody>
					<tr>
						<td width="30%">No. Cuti</td>
						<td><?php echo $result['no_cuti'];?></td>
					</tr>
					<tr>
						<td>nik</td>
						<td><?php echo $result['nik'] ?></td>
					</tr>
					<tr>
						<td>Pemohon</td>
						<td><?php echo $result['nama_emp'] ?></td>
					</tr>
					<tr>
						<td>Telepon</td>
						<td><?php echo $result['telp_emp'];?></td>
					</tr>
					<tr>
						<td>Jabatan</td>
						<td><?php echo $result['jabatan'];?></td>
					</tr>
					<tr>
						<td>Tanggal Pengajuan</td>
						<td><?php echo IndonesiaTgl($result['tgl_pengajuan']);?></td>
					</tr>
					<tr>
						<td>Tanggal Mulai</td>
						<td><?php echo IndonesiaTgl($result['tgl_awal']);?></td>
					</tr>
					<tr>
						<td>Tanggal Akhir</td>
						<td><?php echo IndonesiaTgl($result['tgl_akhir']);?></td>
					</tr>
					<tr>
						<td>Durasi</td>
						<td><?php echo $result['durasi'];?> Hari</td>
					</tr>
					<tr>
						<td>Keterangan</td>
						<td><?php echo $result['keterangan'];?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td><?php echo $result['stt_cuti'];?></td>
					</tr>
				</tbody>
				</h3>
			</table>
			<br>
			<div>
			<label>*Form ini dicetak oleh sistem dan tidak memerlukan tanda tangan atau pengesahan lain.</label>
			</div>
			
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../assets/dist/js/pages/dashboard.js"></script>
</body>
</html>
