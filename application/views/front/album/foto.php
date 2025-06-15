<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>



<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>">Home</a></li>
        <li><a href="<?php echo base_url('gallery/album') ?>">Album</a></li>
        <li class="active"><?php echo ucfirst($this->uri->segment(3)) ?></li>
    </ol>

    <div class="row">
        <div class="col-md-8">
            <h1>ALBUM: <?php echo strtoupper(clean2(ucfirst($this->uri->segment(3)))) ?></h1>
            <hr>
            <div class="row">
                <?php foreach($album_detail as $foto){ ?>
                <div class="col-md-3 col-sm-4 col-xs-12 text-center" style="margin-bottom: 30px; margin-left: 20px; 
				background-color: #f9e79f; padding: 10px; border-radius: 10px;">
				<h4><a href="#" class="open-modal" 
                            data-title="<?php echo $foto->nama_foto; ?> "   style="color: #2F4F4F;" 
                            data-image="<?php echo base_url().'assets/images/foto/'.$foto->foto; ?>"
                            data-deskripsi="<?php echo htmlspecialchars($foto->deskripsi); ?>">
                            <?php echo $foto->nama_foto; ?>
                        </a>
                    </h4>
                    <div class="img-container" style="position: relative; width: 100%; padding-top: 100%; background: #f3f3f3;">
                        <?php if(empty($foto->foto)) { ?>
                            <img class="img-responsive lazyload open-modal" src="<?php echo base_url(); ?>assets/images/no_image_thumb.png" 
                                data-title="<?php echo $foto->nama_foto; ?>"
                                data-image="<?php echo base_url().'assets/images/no_image_thumb.png'; ?>"
                                data-deskripsi="<?php echo htmlspecialchars($foto->deskripsi); ?>"
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; cursor: pointer;">
                        <?php } else { ?>
                            <img class="img-responsive lazyload open-modal" data-src="<?php echo base_url(); ?>assets/images/foto/<?php echo $foto->foto; ?>" 
                                src="<?php echo base_url(); ?> "
                                data-title="<?php echo $foto->nama_foto; ?>"
                                data-image="<?php echo base_url().'assets/images/foto/'.$foto->foto; ?>"
                                data-deskripsi="<?php echo htmlspecialchars($foto->deskripsi); ?>"
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; cursor: pointer;">
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

<!-- Sidebar -->
<div >
        <?php $this->load->view('front/sidebar'); ?>
    </div>
</div>



<!-- Modal untuk Menampilkan Detail Gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #f39c12; color: white; text-align: center;">
                <h5 class="modal-title" id="imageModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" class="img-responsive" style="max-width: 100%; height: auto; margin-bottom: 15px;">
                <div class="card">
                    <div class="card-body">
                        <p id="modalDeskripsi" style="text-align: justify; color:rgb(61, 61, 61) " ></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                        </div>
<?php $this->load->view('front/footer'); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.11/jquery.lazy.min.js"></script>
<script type="text/javascript">
$(function() {
    $('img.lazyload').lazy();

    $('.open-modal').on('click', function(event) {
        event.preventDefault();
        let title = $(this).data('title');
        let image = $(this).data('image');
        let deskripsi = $(this).data('deskripsi');

        $('#imageModalLabel').text(title);
        $('#modalImage').attr('src', image);
        $('#modalDeskripsi').text(deskripsi);

        $('#imageModal').modal('show');
    });
});
</script>
