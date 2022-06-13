<!-- Page Content -->
<div class="main-content col-lg-12">
    <div class="main">
        <div class="m-3">
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#MenuModal">Tambah Menu</a>
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>
            <?= $this->session->flashdata('menu'); ?>
            <table class="table table-hover" id="tbl_peminjaman">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <!-- yang asli -->
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <a href="#" class="badge badge-success"><i class="fas fa-edit"></i></a>
                                <a href="#" class="badge badge-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="MenuModal" tabindex="-1" role="dialog" aria-labelledby="MenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MenuModalLabel">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
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