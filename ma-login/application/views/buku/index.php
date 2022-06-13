<div class="main-content col-lg-12">
    <div class="main">
        <div class="container-fluid mt-3">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item active"><a class="nav-link active" data-toggle="tab" href="#buku">Buku</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kategori">Kategori</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#penulis">Penulis</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#penerbit">Penerbit</a></li>
            </ul>

            <!-- Fitur Buku -->
            <div class="tab-content">
                <div id="buku" class="m-3 tab-pane fade show active">
                    <!-- BTN Tambah Buku -->
                    <a href="<?= base_url('buku/tambah'); ?>" class="btn btn-primary mb-3">Tambah Buku</a>
                    <a href="<?= base_url('buku/pdf'); ?>" class="btn btn-danger mb-3" target="_BLANK">Unduh PDF</a>
                    <?= $this->session->flashdata('status'); ?>
                    <table class="table table-hover" id="tbl_buku">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Buku</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun Penerbit</th>
                                <th scope="col">Stok Buku</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($buku as $b) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <!-- yang asli -->
                                    <td><?= $b['kode_buku']; ?></td>
                                    <td><?= $b['judul_buku']; ?></td>
                                    <td><?= $b['nama_kategori']; ?></td>
                                    <td><?= $b['nama_penulis']; ?></td>
                                    <td><?= $b['nama_penerbit']; ?></td>
                                    <td><?= $b['tahun_penerbit']; ?></td>
                                    <td><?= $b['stok']; ?></td>
                                    <td>
                                        <a href="<?= base_url('buku/edit/'); ?><?= $b['id_buku']; ?>" class="badge badge-success"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url('buku/hapus/'); ?><?= $b['id_buku']; ?>" class="badge badge-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Fitur Kategori -->
                <div id="kategori" class="m-3 tab-pane fade">
                    <?= form_error('nama_kategori', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>
                    <?= $this->session->flashdata('kategori'); ?>
                    <!-- BTN Tambah Kategori -->
                    <a href="#TambahKategori" class="btn btn-primary mb-3" data-toggle="modal">Tambah Kategori</a>
                    <table class="table table-hover" id="tbl_kategori">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kategori as $kat) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <!-- yang asli -->
                                    <td><?= $kat['nama_kategori']; ?></td>
                                    <td>
                                        <button type="button" data-target="#EditKategori<?= $kat['id_kategori']; ?>" class="badge badge-success" data-toggle="modal"><i class="fas fa-edit"></i></button>
                                        <a href="<?= base_url('buku/hapusKategori/'); ?><?= $kat['id_kategori']; ?>" class="badge badge-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Fitur Penulis -->
                <div id="penulis" class="m-3 tab-pane fade">
                    <?= form_error('nama_penulis', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>
                    <?= $this->session->flashdata('penulis'); ?>
                    <!-- BTN Tambah Penulis -->
                    <a href="#TambahPenulis" class="btn btn-primary mb-3" data-toggle="modal">Tambah Penulis</a>
                    <table class="table table-hover" id="tbl_penulis">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Penulis</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($penulis as $pen) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <!-- yang asli -->
                                    <td><?= $pen['nama_penulis']; ?></td>
                                    <td>
                                        <button type="button" data-target="#EditPenulis<?= $pen['id_penulis']; ?>" class="badge badge-success" data-toggle="modal"><i class="fas fa-edit"></i></button>
                                        <a href="<?= base_url('buku/hapusPenulis/'); ?><?= $pen['id_penulis']; ?>" class="badge badge-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Fitur Penerbit -->
                <div id="penerbit" class="m-3 tab-pane fade">
                    <?= form_error('nama_penerbit', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>
                    <?= $this->session->flashdata('penerbit'); ?>
                    <!-- BTN Tambah Penerbit -->
                    <a href="#TambahPenerbit" class="btn btn-primary mb-3" data-toggle="modal">Tambah Penerbit</a>
                    <table class="table table-hover" id="tbl_penerbit">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Penerbit</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($penerbit as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <!-- yang asli -->
                                    <td><?= $p['nama_penerbit']; ?></td>
                                    <td>
                                        <button type="button" data-target="#EditPenerbit<?= $p['id_penerbit']; ?>" class="badge badge-success" data-toggle="modal"><i class="fas fa-edit"></i></button>
                                        <a href="<?= base_url('buku/hapusPenerbit/'); ?><?= $p['id_penerbit']; ?>" class="badge badge-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Modal Kategori -->
<div class="modal fade" id="TambahKategori" tabindex="-1" role="dialog" aria-labelledby="TambahKategoriLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahKategoriLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku/tambahKategori'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------------------- -->
</div>

<!-- Modal Edit Kategori -->
<?php $no = 0;
foreach ($kategori as $kat) : $no++; ?>
    <div class="modal fade" id="EditKategori<?= $kat['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditKategoriLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditKategoriLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('buku/editKategori'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_kategori" name="id_kategori" value="<?= $kat['id_kategori'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="<?= $kat['nama_kategori'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- ------------------------------------------------------------------------------------------------- -->
    </div>
<?php endforeach; ?>

<!-- Modal Penulis -->
<div class="modal fade" id="TambahPenulis" tabindex="-1" role="dialog" aria-labelledby="TambahPenulisLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahPenulisLabel">Tambah Penulis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku/tambahPenulis'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" placeholder="Nama Penulis">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
    <!-- ------------------------------------------------------------------------------------------------- -->
</div>

<!-- Modal Edit Penulis -->
<?php $no = 0;
foreach ($penulis as $pen) : $no++; ?>
    <div class="modal fade" id="EditPenulis<?= $pen['id_penulis']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditPenulisLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditPenulisLabel">Edit Penulis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('buku/editPenulis'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_penulis" name="id_penulis" value="<?= $pen['id_penulis']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" placeholder="Nama Penulis" value="<?= $pen['nama_penulis']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- ------------------------------------------------------------------------------------------------- -->
    </div>
<?php endforeach; ?>

<!-- Modal Penerbit -->
<div class="modal fade" id="TambahPenerbit" tabindex="-1" role="dialog" aria-labelledby="TambahPenerbitLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahPenerbitLabel">Tambah Penerbit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku/tambahPenerbit'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" placeholder="Nama Penerbit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ------------------------------------------------------------------------------------------------- -->
<!-- Modal Edit Penerbit -->
<?php $no = 0;
foreach ($penerbit as $p) : $no++; ?>
    <div class="modal fade" id="EditPenerbit<?= $p['id_penerbit']; ?>" tabindex="-1" role="dialog" aria-labelledby="EditPenerbitLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditPenerbitLabel">Edit Penerbit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('buku/editPenerbit'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_penerbit" name="id_penerbit" value="<?= $p['id_penerbit']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" placeholder="Nama Penerbit" value="<?= $p['nama_penerbit']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- ------------------------------------------------------------------------------------------------- -->

<script>
    $(document).ready(function() {
        $(".nav-tabs a").click(function() {
            $(this).tab('show');
        });
    });

    $(document).ready(function() {
        $('#tbl_buku').DataTable();
        $('#tbl_kategori').DataTable();
        $('#tbl_penulis').DataTable();
        $('#tbl_penerbit').DataTable();
    });
</script>