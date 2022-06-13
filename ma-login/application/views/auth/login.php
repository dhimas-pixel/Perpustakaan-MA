<section class="Form-login">
    <div class="container">
        <div class="row">
            <div class="col-md-5 my-auto gambar">
                <img src="<?= base_url('assets/'); ?>image/row.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 px-md-5 pt-md-2">
                <div class="py-2 judul">
                    <img src="<?= base_url('assets/'); ?>image/LogoMA.png" class="logo float-left mr-3" alt="">
                    <h4 class="font-weight-bold">Madrasah Aliyah</h4>
                    <h1 class="font-weight-bold">AR-RIDLO</h1>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('auth'); ?>" class="field" method="POST">
                    <div class="form-group input">
                        <input type="text" placeholder="Alamat Email" class="form-control input-text" name="email" value="<?= set_value('email'); ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group input">
                        <input type="password" placeholder="Password" class="form-control input-text" name="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div>
                        <button type="submit" class="btn1 mt-3 mb-3">Login</button>
                    </div>
                    <!-- <a href="#">Lupa Password</a> -->
                    <br>
                    <p>Tidak Punya Akun? <a href="<?= base_url('auth/registrasion') ?>">Daftar Disini</a></p>
                </form>
            </div>
        </div>
    </div>
</section>