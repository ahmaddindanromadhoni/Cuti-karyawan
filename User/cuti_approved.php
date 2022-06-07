<?php
	include 'sess_check.php';
	include '../header.php';
	$nik = $nik;
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Aplikasi Cuti Karyawan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <a href="index.php"><img src="../assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"></a>
        </div>
        <div class="info">
          <a href="profil.php" class="d-block"><?php echo strtoupper($_SESSION['a_global']->nama_emp); ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
              <p>
                Cuti
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="cuti.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buat Pengajuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cuti_wait.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menunggu Approval</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cuti_reject.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rejected</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="cuti_approved.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link">
            <i class="nav-icon fas fa-angle-double-left"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Cuti Approved</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <hr>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg col-6">
             <!--  -->
             <table id="example1" class="table table-bordered table-striped text-center">
                  <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>No Cuti</th>
                    <th>Tgl Pengajuan</th>
                    <th>Tgl Awal</th>
                    <th>Tgl Akhir</th>
                    <th>Status</th>
                    <th width="11%">Opsi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                        $Sql = "SELECT cuti.*, employee.* FROM cuti, employee WHERE cuti.nik=employee.nik AND cuti.stt_cuti ='Approved'
                        AND cuti.nik='$nik' ORDER BY cuti.tgl_pengajuan DESC";
                        $Qry = mysqli_query($koneksi, $Sql);
                        while($data = mysqli_fetch_array($Qry)){

                    ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['no_cuti'];?></td>
                    <td><?= $data['tgl_pengajuan'];?></td>
                    <td><?= IndonesiaTgl($data['tgl_awal']);?></td>
                    <td><?= IndonesiaTgl($data['tgl_akhir']);?></td>
                    <td><?= $data['stt_cuti'];?></td>
                    <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?= $data['no_cuti'] ?>"><i class="fas fa-info-circle"></i></button>
                      <a target="_blank" href="cetak_app.php?no_cuti=<?= $data['no_cuti'];?>" class="btn btn-primary"><i class="fas fa-print"></i></a>
                  </td>
                  </tr>
                  <!-- Modal -->
           <div class="modal fade" id="exampleModal<?= $data['no_cuti'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Approved</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">No Cuti :</label>
                            <input type="text" class="form-control" id="recipient-name" value="<?= $data['no_cuti']; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">NIK :</label>
                            <input type="text" class="form-control" id="recipient-name" value="<?= $data['nik']; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Pemohon :</label>
                            <input type="text" class="form-control" id="recipient-name" value="<?= $data['nama_emp']; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="row">
                            <div class="form-group col-sm-6">
                              <label for="recipient-name" class="col-form-label">Tanggal Pengajuan :</label>
                              <input type="text" class="form-control" id="recipient-name" value="<?= $data['tgl_pengajuan'] ?>" readonly>
                            </div>
                            <div class="form-group col-sm-6">
                              <label for="recipient-name" class="col-form-label">Tanggal Awal :</label>
                              <input type="text" class="form-control" id="recipient-name" value="<?= $data['tgl_awal'] ?>" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="row">
                            <div class="form-group col-sm-6">
                              <label for="recipient-name" class="col-form-label">Tanggal Akhir :</label>
                              <input type="text" class="form-control" id="recipient-name" value="<?= $data['tgl_akhir'] ?>" readonly>
                            </div>
                            <div class="form-group col-sm-6">
                              <label for="recipient-name" class="col-form-label">Status :</label>
                              <input type="text" class="form-control" id="recipient-name" value="<?= $data['stt_cuti'] ?>" readonly>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-12">
                          <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Keterangan :</label>
                            <textarea type="text" class="form-control" id="recipient-name" readonly><?= $data['keterangan'] ?></textarea>
                          </div>
                        </div>

                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- modal -->
                  <?php } ?>
                  </tbody>
                </table>
            <!--  -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout Untuk Meninggalkan Halaman Ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
     <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout Untuk Meninggalkan Halaman Ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
 <?php
 include '../footer.php';
?>