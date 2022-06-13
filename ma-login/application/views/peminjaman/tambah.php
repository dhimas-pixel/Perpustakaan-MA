<div class="main-content col-lg-12">
    <div class="main">
        <div class="container-fluid mt-3">
            <?php
            date_default_timezone_set('Asia/Jakarta');
            $tgl_pinjam = date('Y-m-d');
            $tgl_kembali = date('Y-m-d', strtotime('+3 days'));
            ?>
            <div class="mb-3">
                <h2>Tambah Peminjaman</h2>
            </div>
            <form action="<?= base_url('peminjaman/tambah'); ?>" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" id="siswa" name="siswa" placeholder="Nama Siswa">
                    <input type="hidden" name="id_anggota" id="id_anggota" value="">
                    <?= form_error('siswa', '<p class="text-danger">', '</p>'); ?>
                </div>
                <div class="form-group">
                    <label for="tgl_pinjam">Tanggal Pinjam</label>
                    <input type="text" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $tgl_pinjam; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tgl_kembali">Tanggal Kembali</label>
                    <input type="text" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $tgl_kembali; ?>" readonly>
                </div>
                <div id="respon_id" class="d-none">
                    <div class="form-group">
                        <input type="text" class="form-control" id="buku1" name="buku[]" placeholder="Buku 1">
                        <input type="hidden" name="id_buku[]" id="id_buku1" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="buku2" name="buku[]" placeholder="Buku 2">
                        <input type="hidden" name="id_buku[]" id="id_buku2" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="buku3" name="buku[]" placeholder="Buku 3">
                        <input type="hidden" name="id_buku[]" id="id_buku3" value="">
                    </div>
                </div>
                <p class="pesan"></p>
                <a href="<?= base_url('peminjaman'); ?>" class="btn btn-danger mr-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(function() {
        $("#siswa").autocomplete({
            source: "<?= base_url('peminjaman/getDataAutoCompletePinjam'); ?>",
            select: function(event, data) {
                $('#id_anggota').val(data.item.id_anggota);
                keySiswa();
            }
        });
        $("#buku1").autocomplete({
            source: "<?= base_url('peminjaman/getDataAutoCompleteBuku'); ?>",
            select: function(event, data) {
                $('#id_buku1').val(data.item.id_buku);
            }
        });
        $("#buku3").autocomplete({
            source: "<?= base_url('peminjaman/getDataAutoCompleteBuku'); ?>",
            select: function(event, data) {
                $('#id_buku3').val(data.item.id_buku);
            }
        });
        $("#buku2").autocomplete({
            source: "<?= base_url('peminjaman/getDataAutoCompleteBuku'); ?>",
            select: function(event, data) {
                $('#id_buku2').val(data.item.id_buku);
            }
        });
    });

    function keySiswa() {

        var nama = document.getElementById("id_anggota").value;
        if (nama != '') {
            document.getElementById("respon_id").className = "";
        } else {
            document.getElementById("respon_id").className = "d-none";
        }
        $.ajax({
            type: 'POST',
            data: 'kode=' + nama,
            url: 'getSisa',
            dataType: 'JSON',
            success: function(data) {
                $('#buku1').show();
                $('#buku2').show();
                $('#buku3').show();
                if (data.jumlah == 3) {
                    $('.pesan').text('Peminjaman Sudah mencapai Maks!').show();
                } else {
                    $('.pesan').hide();
                }
                for (var i = 3; i > (3 - data.jumlah); i--) {
                    $('#buku' + (i)).hide();
                }
            }
        });
    }
</script>