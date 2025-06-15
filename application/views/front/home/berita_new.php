<hr>
<h3 align="center"><b>BERITA TERBARU</b></h3>
<hr>

<div class="container">
  <?php foreach($berita_new as $berita){ ?>
    <div class="row mb-4 p-3 border-bottom">
      <div class="col-md-4">
        <div class="thumbnail">
          <a href="<?php echo base_url("berita/$berita->slug_berita") ?>">
            <?php
            if(empty($berita->foto)) {
              echo "<img src='".base_url()."assets/images/no_image_thumb.png' class='img-fluid rounded'>";
            } else {
              echo "<img src='".base_url()."assets/images/berita/".$berita->foto.'_thumb'.$berita->foto_type."' class='img-fluid rounded'>";
            }
            ?>
          </a>
        </div>
      </div>

      <div class="col-md-8 d-flex flex-column">
        <div class="caption">
          <h4>
            <a href="<?php echo base_url("berita/$berita->slug_berita") ?>" class="text-success">
              <?php echo character_limiter($berita->nama_berita, 100) ?>
            </a>
          </h4>
          <i class="fa fa-calendar"></i> <?php echo date("j F Y", strtotime($berita->created_at)); ?>
          <p class="mt-2"><?php echo character_limiter($berita->deskripsi, 400) ?></p>
        </div>
        
        <div class="mt-auto text-end">
          <a href="<?php echo base_url("berita/$berita->slug_berita") ?>">
            <button type="button" class="btn btn-sm btn-success">Selengkapnya</button>
            <br>       <br>
          </a>
          
        </div>
      </div>
    </div>
  <?php } ?>
</div>
