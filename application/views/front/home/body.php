<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container">
	<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
	<?php $this->load->view('front/home/slider'); ?>
	<?php $this->load->view('front/home/album_new'); ?>
	<?php $this->load->view('front/home/berita_new'); ?>
</div>
<br><br>
<?php $this->load->view('front/footer'); ?>
