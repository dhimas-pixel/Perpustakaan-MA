<!-- Page Content -->
<div class="main-content col-lg-12">
  <div class="main">
    <div class="m-3">
      <h1>Selamat Datang di Perpustakaan RIDUS</h1>
      <hr size="10px" width="100%">
      <br>

      <style>
        div.tata-tertib {
          text-align: center;
        }

        div.info {
          background-color: #CCCCCC;
          padding: 0.5rem;
          border-left: solid 5px;
        }
      </style>
      <div class="tata-tertib">
        <h3><strong>PERATURAN & TATA TERTIB</strong></h3>
        <img src="<?= base_url('assets/'); ?>image/LogoMA.png" class="logo-ma" alt="Image" height="120" width="120">
      </div>
      <div class="container-fluid mt-3">
        <p><strong> 1. Program ini hanya boleh di operasikan oleh admin perpustakaan</strong></p>
        <p><strong> 2. Setiap peminjaman buku harus ada tanda bukti</strong></p>
        <p><strong> 3. Pengembalian buku yang melewati jatuh tempo harus tetap di kenai denda</strong></p>
        <p><strong> 4. Dilarang menghapus data penting dalam aplikasi ini</strong></p>
        <p><strong> 5. Backup database apabila ada keperluan</strong></p>
      </div>
      <br>
      <br>
      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6 border-primary info">
            <!--small box-->
            <div class="small-box">
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <div class="inner">
                <p>Anggota</p>
              </div>
              <a href="<?= base_url('Admin/siswa'); ?>">More info <i class="fa fa-arrow-circle-right ml-2"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6 border-success info">
            <!--small box-->
            <div class="small-box">
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <div class="inner">
                <p>Jenis Buku</p>
              </div>
              <a href="<?= base_url('Admin/buku'); ?>">More info <i class="fa fa-arrow-circle-right ml-2"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6 border-warning info">
            <!-- small box -->
            <div class="small-box">
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
              <div class="inner">
                <p>Pinjam</p>
              </div>
              <a href="<?= base_url('Admin/peminjaman'); ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-xs-6 border-danger info">
            <div class="small-box">
              <div class="icon">
                <i class="fa fa-list"></i>
              </div>
              <div class="inner">
                <p>Di Kembalikan</p>
              </div>
              <a href="<?= base_url('Admin/pengembalian'); ?>">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
      </section>
    </div>
  </div>
</div>
<!-- /.content -->