<section class="content">
  <!-- penampilan total record -->
  <div class="row">
    <div class='col-lg-4'>

    </div>
    <div class='col-lg-4'>
    
    </div>
    <div class='col-lg-4'>
     
    </div>
   
    <div class='col-lg-3'>
      <div class='small-box bg-blue'>
        <div class='inner'><h3> <?php echo $total_pengajuan ?> </h3><p><b>PENGAJUAN SURAT</b></p></div>
        <div class='icon'><i class='fa fa-archive'></i></div>
        <a href='<?php echo base_url('admin/pengajuan') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3'>
      <div class='small-box bg-blue'>
        <div class='inner'><h3> <?php echo $total_album ?> </h3><p><b>ALBUM</b></p></div>
        <div class='icon'><i class='fa fa-folder'></i></div>
        <a href='<?php echo base_url('admin/album') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3'>
      <div class='small-box bg-red'>
        <div class='inner'><h3> <?php echo $total_foto ?> </h3><p><b>FOTO</b></p></div>
        <div class='icon'><i class='fa fa-image'></i></div>
        <a href='<?php echo base_url('admin/foto') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3'>
      <div class='small-box bg-orange'>
        <div class='inner'><h3> <?php echo $total_berita ?> </h3><p><b>BERITA</b></p></div>
        <div class='icon'><i class='fa fa-newspaper-o'></i></div>
        <a href='<?php echo base_url('admin/berita') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3'>
      <div class='small-box bg-aqua'>
        <div class='inner'><h3> <?php echo $total_kategori ?> </h3><p><b>KATEGORI</b></p></div>
        <div class='icon'><i class='fa fa-tag'></i></div>
        <a href='<?php echo base_url('admin/kategori') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3'>
      <div class='small-box bg-purple'>
        <div class='inner'><h3> <?php echo $total_kontak ?> </h3><p><b>KONTAK</b></p></div>
        <div class='icon'><i class='fa fa-phone'></i></div>
        <a href='<?php echo base_url('admin/kontak') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3'>
      <div class='small-box bg-maroon'>
        <div class='inner'><h3> <?php echo $total_slider ?> </h3><p><b>SLIDER</b></p></div>
        <div class='icon'><i class='fa fa-credit-card'></i></div>
        <a href='<?php echo base_url('admin/slider') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
    <div class='col-lg-3'>
      <div class='small-box bg-teal'>
        <div class='inner'><h3> <?php echo $total_customer ?> </h3><p><b>AKUN PROFILE</b></p></div>
        <div class='icon'><i class='fa fa-user'></i></div>
        <a href='<?php echo base_url('admin/auth') ?>' class='small-box-footer'>Selengkapnya <i class='fa fa-arrow-circle-right'></i></a>
      </div>
    </div>
  </div>
</section><!-- /.content -->
