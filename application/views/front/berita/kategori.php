<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url() ?>">Home</a></li>
		<li><a href="#">Berita</a></li>
		<li class="active">Semua Berita</li>
	</ol>

	<div class="row">
		<div class="col-md-8">
			<h1>Kategori: <?php echo ucfirst($this->uri->segment(3)) ?></h1><hr>
			<?php foreach($kategori_data as $kategori){ ?>
				<h2><a href="<?php echo base_url('berita/').$kategori->slug_berita ?>"style="color:#5499c7;"><?php echo $kategori->nama_berita ?></a></h2>
				<a href="<?php echo base_url("berita/$kategori->slug_berita ") ?>">
					<?php
					if(empty($kategori->foto)) { 
						echo "<img class='img-responsive' src='".base_url()."assets/images/no_image_thumb.png' style='max-width: 600px; height: auto; display: block; margin: 0 auto;'>";
					} else { 
						echo "<img class='img-responsive' src='".base_url()."assets/images/berita/".$kategori->foto.'_thumb'.$kategori->foto_type."' style='max-width: 600px; height: auto; display: block; margin: 0 auto;'>";
					}
					?>
				</a>
				<p>
					<i class="fa fa-user"></i> <?php echo $kategori->created_by ?>
			
				</p>
				<p><?php echo character_limiter($kategori->deskripsi,350) ?></p>
				<a class="btn btn-sm btn-primary" href="<?php echo base_url("berita/$kategori->slug_berita ") ?>">Selengkapnya <i class="fa fa-angle-right"></i></a> <br>
			
				<?php } ?>
			<div align="center"><?php echo $this->pagination->create_links() ?></div><br>
			<p>
				<div class="sharethis-inline-share-buttons"></div>
				<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5ae2ee03de20620011e03337&product=inline-share-buttons"></script>
			</p>
		</div>
		<?php $this->load->view('front/sidebar'); ?>
	</div>
</div>
<br>
<br>
<?php $this->load->view('front/footer'); ?>
