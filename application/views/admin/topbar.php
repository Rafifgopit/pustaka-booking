<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <h1 class="h3 mb-2 text-gray-800"><?= $judul;?></h1>
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
                <li class="nav-item dropdown no-arrow">
                    <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama'];?></span>
                        <img src="<?= base_url('assets/img/profile/');?>account.png " class="img-profile rounded-circle"> <!-- . $user['image']; -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                        <a href="<?= base_url('user'); ?>" class="dropdown-item">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile Saya
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url('autentifikasi/logout');?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
    <!-- </div>
</div> -->