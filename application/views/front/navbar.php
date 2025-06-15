<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<nav class="navbar navbar-default navbar-fixed-top" >
  <div class="container" style="background-color: #073836;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="background-color: #073836;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" >
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" style="margin-bottom:35px;" href="<?php echo base_url() ?>">
      <img src="<?php echo base_url('assets/images/company/logo1.png') ?>" alt="<?php echo $company_data->company_name ?>"height="50px" width="50px">
</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?php if($this->uri->segment(1) == ""){echo "active";} ?>">
          <a href="<?php echo base_url() ?>">Home </a>
        </li>

        <li class="<?php if($this->uri->segment(1) == "berita"){echo "active";} ?>">
          <a href="<?php echo base_url('berita') ?>"> Berita</a>
        </li>

        <li class="<?php if($this->uri->segment(1) == "gallery"){echo "active";} ?>">
          <a href="<?php echo base_url('gallery/album') ?>"> Galeri</a>
        </li>

        <li class="<?php if($this->uri->segment(1) == "pengajuan" && $this->uri->segment(2) == ""){echo "active";} ?>">
          <a href="<?php echo base_url('pengajuan') ?>"> Pengajuan Ekspor Keramik</a>
        </li>

        <li class="dropdown <?php if($this->uri->segment(1) == "about" or $this->uri->segment(1) == "sejarah"){echo "active";} ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Company Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li class="<?php if($this->uri->segment(1) == "about"){echo "active";} ?>">
              <a href="<?php echo base_url('about') ?>"> Tentang Kami</a>
            </li>
            <li class="<?php if($this->uri->segment(2) == "sejarah"){echo "active";} ?>">
              <a href="<?php echo base_url('sejarah') ?>"> Sejarah Keramik</a>
            </li>
          </ul>
        </li>
      </ul>

      <?php if($this->session->userdata('usertype') != NULL){ ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hi, <?php echo $this->session->userdata('username') ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url('auth/edit_profil/').$this->session->userdata('user_id') ?>">Edit Profil</a></li>
              <li><a href="<?php echo base_url('auth/profil') ?>">Profil Saya</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
            </ul>
          </li>
        </ul>
      <?php }else{ ?>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url('auth/register') ?>">Register</a></li>
          <li><a href="<?php echo base_url('auth/login') ?>">Login</a></li>
        </ul>
      <?php } ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<style>
  /* Terapkan font Poppins ke seluruh navbar */
.navbar, .navbar-default, .navbar-nav, .navbar-brand, .dropdown-menu {
    font-family: 'Poppins', sans-serif !important;
}

/* Perbaikan active menu */
.navbar-nav .active > a {
    background-color:transparent !important; ; /* Menghapus warna background */
    color: CornflowerBlue !important; /* Warna teks menu aktif */
    font-size: 16px;
}

</style>
