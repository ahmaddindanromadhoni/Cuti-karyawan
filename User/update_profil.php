<?php
	include("sess_check.php");
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
            <h1 class="m-0">Update Akun</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <hr>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-8">
              <!-- form start -->
              <?php
            $no = 1;
            $user = mysqli_query($koneksi, "SELECT * FROM employee WHERE nik='$nik'");
            while ($d = mysqli_fetch_array($user)){
            ?>
              <form class="form-horizontal"action="proses_updateprofil.php" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <input type="hidden" class="form-control" name="nik" value="<?= $d['nik']?>">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama_emp" value="<?= $d['nama_emp']?>"></input>
                  </div>
                  <div class="col-sm-12">
                    <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="recipient-name" class="col-form-label">Jabatan :</label>
                        <input type="text" class="form-control" id="recipient-name" name="jabatan" value="<?= $d['jabatan'] ?>">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="recipient-name" class="col-form-label">Jenis Kelamin :</label>
                        <select name="jk_emp" id="jk_emp" class="form-control">
                            <option value=""><?= $d['jk_emp'];?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-sm-12">
                <div class="row">
                  <div class="form-group col-sm-6">
                    <label>Telepon</label>
                    <input type="text" class="form-control" name="telp_emp"value="<?= $d['telp_emp']?>"></input>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" value="<?= $d['password']?>"></input>
                  </div>
                </div>
                </div>
                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea type="text" class="form-control" rows="3" name="alamat"><?= $d['alamat']?></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Profil</button>
                  </div>
              </form>
              <?php } ?>
            </div>
            <!-- /.card -->
            
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