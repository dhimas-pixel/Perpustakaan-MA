<div class="main-content col-lg-12">
    <div class="main">
        <div class="container-fluid mt-3">
            <div class="mb-3">
                <h2>Tambah Buku</h2>
            </div>
            <form action="<?= base_url('buku/tambah'); ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Kode Buku">
                    <?= form_error('kode_buku', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Judul Buku">
                    <?= form_error('judul_buku', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <select type="text" class="form-control" id="kategori" name="kategori">
                        <option selected="0">Kategori</option>
                        <?php foreach ($kats as $kat) : ?>
                            <option value="<?= $kat['id_kategori']; ?>"><?= $kat['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kategori', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Penulis">
                    <input type="hidden" name="id_penulis" id="id_penulis" value="">
                    <?= form_error('id_penulis', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit">
                    <input type="hidden" name="id_penerbit" id="id_penerbit" value="">
                    <?= form_error('id_penerbit', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Tahun Terbit">
                    <?= form_error('tahun_terbit', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" id="stok" name="stok" placeholder="Stok Buku">
                    <?= form_error('stok', '<p class="text-danger">', '</p>'); ?>
                </div>
                <a href="<?= base_url('buku'); ?>" class="btn btn-danger mr-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
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
            source: "<?= base_url('buku/getDataAutoCompletePenulis'); ?>",
            select: function(event, data) {
                $('#id_penulis').val(data.item.id_penulis);
            }
        });
        $("#penerbit").autocomplete({
            source: "<?= base_url('buku/getDataAutoCompletePenerbit'); ?>",
            select: function(event, data) {
                $('#id_penerbit').val(data.item.id_penerbit);
            }
        });
    });
</script>