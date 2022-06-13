<div class="wrapper">
    <div class="sidebar-wrapper">
        <div class="user">
            <img src="<?= base_url('gambar/'); ?><?= $akun['gambar']; ?>" class="profil">
            <span>Selamat Datang</span>
            <br>
            <p><b>
                    <?php if ($akun['role_id'] == 2) :  ?>
                        <?php
                        $ambil = $this->session->userdata('email');
                        $query = "SELECT `anggota`.`kode_anggota`, `anggota`.`nama_anggota` FROM anggota, account WHERE `account`.`id_anggota` = `anggota`.`id_anggota` and `account`.`email` = '$ambil'";
                        $detail = $this->db->query($query)->row_array();
                        ?>
                        <?= $detail['nama_anggota']; ?>
                    <?php else : ?>
                        ADMIN
                    <?php endif; ?>
                </b></p>
        </div>

        <ul class="sidebar-nav">

            <!-- QUERY MENU -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu` FROM `user_menu` JOIN `user_access_menu` ON `user_menu`.`id` = `user_access_menu`.`menu_id` WHERE `user_access_menu`.`role_id` = $role_id ORDER BY `user_access_menu`.`menu_id` ASC";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>

                <!-- SIAPKAN SUB MENU -->
                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                                    FROM `user_sub_menu` JOIN `user_menu` 
                                    ON `user_sub_menu`. `menu_id` = `user_menu`.`id`
                                    WHERE `user_sub_menu`.`menu_id` = $menuId
                                    AND `user_sub_menu`.`is_active` = 1
                                ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

                <?php foreach ($subMenu as $sm) : ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                        <a class="klik-menu" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>" style="margin-right: 16px;"></i>
                            <span><?= $sm['title']; ?></span></a>
                        </li>
                    <?php endforeach; ?>

                <?php endforeach; ?>

        </ul>
    </div>
    <div class="container-fluid utama">