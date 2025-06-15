<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<ol class="breadcrumb">
	  <li><a href="<?php echo base_url() ?>">Home</a></li>
	  <li><a href="#">Berita</a></li>
	  <li class="active"><?php echo $berita_detail->nama_berita ?></li>
	</ol>

	<div class="row">
		<div class="col-md-8">
			<h1><?php echo strtoupper($berita_detail->nama_berita) ?></h1>
			<a href="<?php echo base_url('assets/images/berita/').$berita_detail->foto.$berita_detail->foto_type ?>" title="<?php echo $berita_detail->nama_berita ?>">
				<img src="<?php echo base_url('assets/images/berita/').$berita_detail->foto.'_thumb'.$berita_detail->foto_type ?>" 
				     alt="<?php echo $berita_detail->nama_berita ?>" 
				     class="img-responsive" 
				     style="max-width: 600px; height: auto; display: block; margin: 0 auto;">
			</a>
			<br>
			<i class="fa fa-user"></i> <?php echo $berita_detail->created_by ?> | 
			<i class="fa fa-calendar"></i> <?php echo date("j F Y", strtotime($berita_detail->created_at)); ?>
			
			<p><?php echo $berita_detail->deskripsi ?></p>

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
