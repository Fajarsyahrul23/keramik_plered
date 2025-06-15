<?php $album_new = array_slice($album_new, 0, 6); ?>

<hr>
<h3 align="center"><b>ALBUM KERAMIK</b></h3>
<hr>

<div class="row">
  <?php foreach($album_new as $index => $album) { ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm">
        <div class="text-center p-3">
          <?php if(empty($album->foto)) { ?>
            <img class="card-img-top img-thumbnail" src="<?= base_url('assets/images/no_image_thumb.png') ?>" alt="No Image">
          <?php } else { ?>
            <img class="card-img-top img-thumbnail" src="<?= base_url('assets/images/album/'.$album->foto) ?>" alt="<?= $album->nama_album ?>">
          <?php } ?>
        </div>
        <div class="card-body text-center" >
        <h6 class="card-title" style="font-size:18px;"><b><?= $album->nama_album ?></b></h6>
          <a href="<?= base_url('gallery/album') ?>" class="btn btn-primary btn-sm">
    <i class="fa fa-camera"></i> Lihat album
</a>
        </div>
      </div>
    </div>
    
    <!-- Baris baru setiap 3 produk -->
    <?php if(($index + 1) % 3 == 0) { ?>
      </div><div class="row">
    <?php } ?>
  <?php } ?>
</div>

<style>
.card-img-top {
  max-height: 200px; /* Batasi tinggi gambar agar seragam */
  object-fit: cover;  /* Memastikan gambar terpotong dengan baik */
}

.card {
  border-radius: 10px; /* Membuat sudut lebih halus */
  overflow: hidden;     /* Hindari elemen keluar batas */
}

.card-body {
  padding: 10px;
}

.btn {
  border-radius: 20px; /* Membuat tombol lebih estetik */
}
</style>


