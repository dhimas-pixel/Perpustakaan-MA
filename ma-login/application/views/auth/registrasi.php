<section class="Form-register">
    <div class="container">
        <div class="row">
            <div class="field-register">
                <?php echo form_open_multipart('auth/registrasion'); ?>
                <h2>Daftar Akun</h2>
                <div class="form-group input-register">
                    <input type="text" placeholder="Nomor Induk Siswa" class="form-control text-register" name="nis" value="<?= set_value('nis') ?>">
                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group input-register">
                    <input type="text" placeholder="Alamat Email" class="form-control text-register" name="email" value="<?= set_value('email') ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group input-register">
                    <input type="password" placeholder="Password" class="form-control text-register" name="password1">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group input-register">
                    <input type="password" placeholder="Ketik Ulang Password" class="form-control text-register" name="password2">
                </div>

                <div class="form-group input-register">
                    <input type="file" class="form-control text-register" name="foto" required>
                </div>

                <div>
                    <a href="<?= base_url('auth') ?>"><button type="button" class="back">Kembali</button></a>
                    <button type="submit" class="daftar">Daftar</button>
                </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>
</section>