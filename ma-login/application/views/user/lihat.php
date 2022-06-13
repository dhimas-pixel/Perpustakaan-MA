<div class="main-content col-lg-12">
    <div class="main">
        <div class="container-fluid mt-3">
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
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($lihat as $b) : ?>
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#tbl_buku').DataTable();
    });
</script>