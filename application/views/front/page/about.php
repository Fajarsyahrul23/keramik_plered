<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<div class="container mt-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2 rounded shadow-sm">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('profil') ?>">Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
        </ol>
    </nav>

    <!-- Judul Halaman -->
    <div class="text-center mb-4">
        <h1 class="text-primary font-weight-bold">
            <i class="fa fa-building"></i> <?php echo strtoupper($company->company_name) ?>
        </h1>
        <hr class="w-50 border-primary">
    </div>

    <div class="row">
        <!-- Bagian Gambar Perusahaan -->
        <div class="col-lg-4 d-flex align-items-center justify-content-center">
            <div class="text-center">
                <?php if(empty($company->foto)) { ?>
                    <img src="<?php echo base_url() ?>assets/images/no_image_thumb.png" class="img-fluid rounded-circle shadow-lg" width="250">
                <?php } else { ?>
                    <img src="<?php echo base_url('assets/images/company/').$company->foto.$company->foto_type ?>" class="img-fluid rounded-circle shadow-lg" title="<?php echo $company->company_name ?>" alt="<?php echo $company->company_name ?>" width="250">
                <?php } ?>
            </div>
        </div>

        <!-- Bagian Informasi Perusahaan -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4">
                <h5 class="text-dark font-weight-bold">Tentang Kami</h5>
                <p><?php echo $company->company_desc ?></p>
                <hr>
                
                <!-- Informasi Detail -->
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <i class="fa fa-map-marker text-danger"></i> <strong>Alamat:</strong> 
                        <span class="text-dark"><?php echo $company->company_address ?></span>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-envelope text-warning"></i> <strong>Email:</strong> 
                        <a href="mailto:<?php echo $company->company_email ?>" class="text-dark"><?php echo $company->company_email ?></a>
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-phone text-success"></i> <strong>Telepon:</strong> 
                        <span class="text-dark"><?php echo $company->company_phone ?>
                        <?php if($company->company_phone2 > 0){echo " / ". $company->company_phone2;} ?></span>
                    </li>
                    <?php if($company->company_fax > 0){ ?>
                    <li class="list-group-item">
                        <i class="fa fa-fax text-info"></i> <strong>Fax:</strong> 
                        <span class="text-muted"><?php echo $company->company_fax ?></span>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Google Maps Section -->
    <div class="row mt-3">
        <div class="col-md-13">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title"><i class="fa fa-map text-primary"></i> Lokasi Kami</h5>
					<iframe class="rounded shadow-sm" height="400" style="width: 150%; max-width:800px; border:0;"
					src=https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63409.020861596!2d107.3832182!3d-6.6389991!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6905dae59ff027%3A0x83d7ba0ddaecce08!2sUPTD%20PENGEMBANGAN%20SENTRA%20KERAMIK%20(LITBANG)!5e0!3m2!1sid!2sid!4v1740574294511!5m2!1sid!2sid" 
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
				</div>
            </div>
        </div>
    </div>
</div>
<br>
<?php $this->load->view('front/footer'); ?>
