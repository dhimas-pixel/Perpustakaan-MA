<div class="main-content col-lg-12">
    <div class="main">
        <div class="container-fluid mt-3">
            <table class="table table-hover" id="tbl_buku">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Kembali</th>
                        <th scope="col">Status</th>
                        <th scope="col">Denda</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($info as $pen) : ?>
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
                            <td>
                                <?php if ($tgl_kembali >= $tgl_sekarang or $selisih == 0) : ?>
                                    <span class="badge badge-danger"><?= $pen['status']; ?></span>
                                <?php else : ?>
                                    Telat <b style="color: red;"><?= $selisih; ?></b> Hari
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($tgl_kembali >= $tgl_sekarang or $selisih == 0) : ?>
                                    <span class="badge badge-info">Belum Denda</span>
                                <?php else : ?>
                                    <b style="color: red;">Rp <?= $selisih * 500; ?></b>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>