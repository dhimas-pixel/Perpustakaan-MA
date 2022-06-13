<div class="main-content col-lg-12">
    <div class="main">
        <div class="container-fluid mt-3">
            <div class="mb-3">
                <h2>Edit Buku</h2>
            </div>
            <?php foreach ($buku as $b) : ?>
                <form action="<?= base_url('buku/update'); ?>" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $b->id_buku ?>">
                        <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Kode Buku" value="<?= $b->kode_buku; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Judul Buku" value="<?= $b->judul_buku; ?>" required>
                    </div>
                    <div class="form-group">
                        <select type="text" class="form-control" id="kategori" name="kategori" required>
                            <option selected="0">Kategori</option>
                            <?php foreach ($kats as $kat) : ?>
                                <option value="<?= $kat['id_kategori']; ?>" <?= $kat['id_kategori'] == $b->id_kategori ? "selected" : null ?>><?= $kat['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis" value="<?= $b->nama_penulis; ?>" required>
                        <input type="hidden" name="id_penulis" id="id_penulis" value="<?= $b->id_penulis ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit" value="<?= $b->nama_penerbit ?>" required>
                        <input type="hidden" name="id_penerbit" id="id_penerbit" value="<?= $b->id_penerbit ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Tahun Terbit" value="<?= $b->tahun_penerbit ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" id="stok" name="stok" placeholder="Stok Buku" value="<?= $b->stok ?>" required>
                    </div>
                    <a href="<?= base_url('buku'); ?>" class="btn btn-danger mr-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }

    $(function() {
        $("#penulis").autocomplete({
            source: "<?= base_url('admin/getDataAutoCompletePenulis'); ?>",
            select: function(event, data) {
                $('#id_penulis').val(data.item.id_penulis);
            }
        });
        $("#penerbit").autocomplete({
            source: "<?= base_url('admin/getDataAutoCompletePenerbit'); ?>",
            select: function(event, data) {
                $('#id_penerbit').val(data.item.id_penerbit);
            }
        });
    });
</script>