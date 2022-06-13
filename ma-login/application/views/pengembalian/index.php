<div class="main-content col-lg-12">
    <div class="main">
        <div class="container-fluid mt-3">
            <!-- BTN Tambah Peminjaman -->
            <a href="<?= base_url('pengembalian/pdf'); ?>" class="btn btn-danger mt-3 mb-3 ml-3" target="_BLANK">Unduh PDF</a>
            <table class="table table-hover" id="tbl_pengembalian">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Denda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengembalian as $pen) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <!-- yang asli -->
                            <td><?= $pen['nama_anggota']; ?></td>
                            <td><?= $pen['tanggal_kembali']; ?></td>
                            <td><?= $pen['tanggal_pengembalian']; ?></td>
                            <td><?= $pen['judul_buku']; ?></td>
                            <td><?= $pen['denda']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tbl_pengembalian').DataTable();
    });
</script>