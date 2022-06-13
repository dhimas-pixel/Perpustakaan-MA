<!-- Page Content -->
<div class="main-content col-lg-12">
    <div class="main">
        <div class="container-fluid m-3">
            <div class="row">
                <div class="col-15">

                    <table class="table table-hover" id="tbl_siswa">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NISN</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">NIS Lokal</th>
                                <th scope="col">Tempat, Tanggal lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($siswa as $s) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <!-- yang asli -->
                                    <td><?= $s['kode_anggota']; ?></td>
                                    <td><?= $s['nama_anggota']; ?></td>
                                    <td><?= $s['jk_siswa_anggota']; ?></td>
                                    <td><?= $s['nis_lokal']; ?></td>
                                    <td><?= $s['ttl']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tbl_siswa').DataTable();
    });
</script>