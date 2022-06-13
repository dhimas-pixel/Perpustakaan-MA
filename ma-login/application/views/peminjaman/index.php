<div class="main-content col-lg-12">
    <div class="main">
        <div class="container-fluid mt-3">
            <!-- BTN Tambah Peminjaman -->
            <a href="<?= base_url('peminjaman/tambah'); ?>" class="btn btn-primary mt-3 mb-3 ml-3">Tambah peminjaman</a>
            <a href="<?= base_url('peminjaman/pdf'); ?>" class="btn btn-danger mt-3 mb-3 ml-3" target="_BLANK">Unduh PDF</a>
            <table class="table table-hover" id="tbl_peminjaman">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($peminjaman as $pen) : ?>
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl_kembali = new DateTime($pen['tanggal_kembali']);
                        $tgl_sekarang = new DateTime();
                        $selisih = $tgl_sekarang->diff($tgl_kembali)->format("%a");
                        ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <!-- yang asli -->
                            <td><?= $pen['nama_anggota']; ?></td>
                            <td><?= $pen['judul_buku']; ?></td>
                            <td><?= $pen['tanggal_pinjam']; ?></td>
                            <td><?= $pen['tanggal_kembali']; ?></td>
                            <?php if ($pen['status'] == "Sudah Kembali") : ?>
                                <td><span class="badge badge-success"><?= $pen['status']; ?></span></td>
                                <td><span class="badge badge-warning"><b>DONE</b></span></td>
                            <?php else : ?>
                                <td>
                                    <?php if ($tgl_kembali >= $tgl_sekarang or $selisih == 0) : ?>
                                        <span class="badge badge-danger"><?= $pen['status']; ?></span>
                                    <?php else : ?>
                                        Telat <b style="color: red;"><?= $selisih; ?></b> Hari
                                    <?php endif; ?>
                                </td>
                                <td><a href="<?= base_url('pengembalian/tambah/') ?><?= $pen['id_peminjaman'] ?>" class="btn btn-info btn-xs">Kembalikan</a></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tbl_peminjaman').DataTable();
    });
</script>