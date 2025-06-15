<aside class="main-sidebar">
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
      <img src="<?php echo base_url('assets/images/user/admin.jpeg'); ?>" class="img-circle" alt="User Image"/>

      </div>
      
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('name'); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header"><font style="font-size: 16px;color: white; font-weight: bold">MENU UTAMA</font></li>
      <li <?php if($this->uri->segment(2)=="dashboard"){echo "class='active'";} ?>>
        <a href="<?php echo base_url('admin/dashboard') ?>">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="<?php echo base_url() ?>" target="_blank">
          <i class="fa fa-globe"></i> <span>Lihat Website</span>
        </a>
      </li>

      <li <?php if($this->uri->segment(2) == "pengajuan"){echo "class='active'";} ?>>
    <a href="<?php echo base_url('admin/pengajuan') ?>">
        <i class="fa fa-file-text"></i> <span>Pengajuan</span>
    </a>
</li>
      
      <li <?php if($this->uri->segment(2) == "album"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-folder'></i><span> Album </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "album" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/album/create') ?>'><i class='fa fa-circle-o'></i> Tambah Album </a></li>
          <li <?php if($this->uri->segment(2) == "album" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/album') ?>'><i class='fa fa-circle-o'></i> Data Album </a></li>
        </ul>
      </li>
      <li <?php if($this->uri->segment(2) == "foto"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-picture-o'></i><span> foto</span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "foto" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/foto/create') ?>'><i class='fa fa-circle-o'></i> Tambah foto </a></li>
          <li <?php if($this->uri->segment(2) == "foto" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/foto') ?>'><i class='fa fa-circle-o'></i> Data foto </a></li>
        </ul>
      </li>
      <li <?php if($this->uri->segment(2) == "berita"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-newspaper-o'></i><span> berita </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "berita" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/berita/create') ?>'><i class='fa fa-circle-o'></i> Tambah Berita </a></li>
          <li <?php if($this->uri->segment(2) == "berita" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/berita') ?>'><i class='fa fa-circle-o'></i> Data Berita </a></li>
        </ul>
      </li>
      <li <?php if($this->uri->segment(2) == "kategori"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-tag'></i><span> Kategori </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "kategori" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/kategori/create') ?>'><i class='fa fa-circle-o'></i> Tambah Kategori </a></li>
          <li <?php if($this->uri->segment(2) == "kategori" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/kategori') ?>'><i class='fa fa-circle-o'></i> Data Kategori </a></li>
        </ul>
      </li>
      <li <?php if($this->uri->segment(2) == "slider"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-credit-card'></i><span> Slider </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "slider" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/slider/create') ?>'><i class='fa fa-circle-o'></i> Tambah Slider </a></li>
          <li <?php if($this->uri->segment(2) == "slider" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/slider') ?>'><i class='fa fa-circle-o'></i> Data Slider </a></li>
        </ul>
      </li>
      <li <?php if($this->uri->segment(2) == "kontak"){echo "class='active'";} ?>>
        <a href='#'><i class='fa fa-phone'></i><span> Kontak </span><i class='fa fa-angle-left pull-right'></i></a>
        <ul class='treeview-menu'>
          <li <?php if($this->uri->segment(2) == "kontak" && $this->uri->segment(3) == "create"){echo "class='active'";} ?>><a href='<?php echo base_url('admin/kontak/create') ?>'><i class='fa fa-circle-o'></i> Tambah Kontak </a></li>
          <li <?php if($this->uri->segment(2) == "kontak" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url('admin/kontak') ?>'><i class='fa fa-circle-o'></i> Data Kontak </a></li>
        </ul>
      </li>
      <li class="header"><font style="font-size: 16px;color: white; font-weight: bold">PENGATURAN</font></li>
      <li <?php if($this->uri->segment(2) == "company"){echo "class='active'";} ?>><a href='<?php echo base_url() ?>admin/company/update/1'> <i class="fa fa-building"></i> <span>Profil Company</span> </a> </li>
  
      <?php if ($this->ion_auth->is_superadmin()): ?>
        <li <?php if($this->uri->segment(2) == "auth" && $this->uri->segment(3) == ""){echo "class='active'";} ?>>
          <a href='#'><i class='fa fa-user'></i><span> User </span><i class='fa fa-angle-left pull-right'></i></a>
          <ul class='treeview-menu'>
            <li <?php if($this->uri->segment(2) == "auth" && $this->uri->segment(3) == "create_user"){echo "class='active'";} ?>><a href='<?php echo base_url() ?>admin/auth/create_user'><i class='fa fa-circle-o'></i> Tambah User</a></li>
            <li <?php if($this->uri->segment(2) == "auth" && $this->uri->segment(3) == ""){echo "class='active'";} ?>><a href='<?php echo base_url() ?>admin/auth/'><i class='fa fa-circle-o'></i> Data User</a></li>
          </ul>
        </li>
      <?php endif ?>
      <li> <a href='<?php echo base_url() ?>admin/auth/logout'> <i class="fa fa-sign-out"></i> <span>Logout</span> </a> </li>
    </ul>

  </section>
</aside>
