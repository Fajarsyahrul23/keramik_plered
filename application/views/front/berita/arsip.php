<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url() ?>">Home</a></li>
		<li><a href="#">Berita</a></li>
		<li class="active">Semua Berita</li>
	</ol>

	<div class="row">
		<div class="col-md-8"><h1>Semua Berita</h1><hr>
			<?php foreach($berita_all as $berita){ ?>
				<h2><a href="<?php echo base_url('berita/').$berita->slug_berita ?>" style="color:#5499c7;">
    <?php echo $berita->nama_berita ?>
</a></h2>

				<a href="<?php echo base_url("berita/$berita->slug_berita ") ?>">
					<?php
					if(empty($berita->foto)) { 
						echo "<img class='img-responsive' src='".base_url()."assets/images/no_image_thumb.png' style='max-width: 600px; height: auto; display: block; margin: 0 auto;'>";
					} else { 
						echo "<img class='img-responsive' src='".base_url()."assets/images/berita/".$berita->foto.'_thumb'.$berita->foto_type."' style='max-width: 600px; height: auto; display: block; margin: 0 auto;'>";
					}
					?>
				</a>
				<br>
				<p>

					<i class="fa fa-user"></i> <?php echo $berita->created_by ?>
					<i class="fa fa-calendar"></i> <?php echo date("j F Y", strtotime($berita->created_at)); ?>
				</p>
				<p><?php echo character_limiter($berita->deskripsi,350) ?></p>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url("berita/$berita->slug_berita ") ?>">Selengkapnya <i class="fa fa-angle-right"></i></a><br>
			<?php } ?><br>
			<div align="center"><?php echo $this->pagination->create_links() ?></div>

			<p>
				<div class="sharethis-inline-share-buttons"></div>
				<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5ae2ee03de20620011e03337&product=inline-share-buttons"></script>
			</p>
		</div>
		<?php $this->load->view('front/sidebar'); ?>
	</div>
</div>
<br>

<?php $this->load->view('front/footer'); ?>

