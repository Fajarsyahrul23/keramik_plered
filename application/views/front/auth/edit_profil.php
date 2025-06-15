
<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<!-- Tambahkan Google Font & Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    body {
        font-family: 'Poppins', sans-serif;
		
    }
	
    .profile-container {
        max-width: 800px;
        margin: 40px auto; 
		margin-top: -20px; /* Gunakan nilai negatif untuk mengangkat form lebih ke atas */
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .profile-title {
        text-align: center;
        font-size: 26px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .form-group label {
        font-weight: 600;
        color: #34495e;
    }
    .form-control {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #ccc;
    }
    .btn-primary, .btn-danger {
        border-radius: 5px;
        padding: 10px 20px;
    }
	
</style>

<div class="container">
    <div class="profile-container">
        <h2 class="profile-title">EDIT PROFIL</h2>
        <hr>
        <?php echo validation_errors(); ?>
        <?php echo form_open(uri_string()); ?>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label><i class="fa fa-user"></i> Nama</label>
                    <?php echo form_input($name, '', 'class="form-control"'); ?>
                </div>
                <div class="col-md-6 form-group">
                    <label><i class="fa fa-at"></i> Username</label>
                    <?php echo form_input($username, '', 'class="form-control"'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <?php echo form_password($password, '', 'class="form-control"'); ?>
                </div>
                <div class="col-md-6 form-group">
                    <label><i class="fa fa-lock"></i> Konfirmasi Password</label>
                    <?php echo form_password($password_confirm, '', 'class="form-control"'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label><i class="fa fa-phone"></i> No. HP</label>
                    <?php echo form_input($phone, '', 'class="form-control"'); ?>
                </div>
                <div class="col-md-6 form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <?php echo form_input($email, '', 'class="form-control"'); ?>
                </div>
            </div>
            <div class="form-group">
                <label><i class="fa fa-map-marker"></i> Alamat</label>
                <?php echo form_textarea($address, '', 'class="form-control"'); ?>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label><i class="fa fa-globe"></i> Provinsi</label>
                    <?php echo form_dropdown('',$ambil_provinsi,$user->provinsi,$provinsi_id);?><br>
                </div>
                <div class="col-md-6 form-group">
                    <label><i class="fa fa-city"></i> Kabupaten/Kota</label>
                    <?php echo form_dropdown('',$ambil_kota,$user->kota,$kota_id);?><br>
                </div>
            </div>
            <?php echo form_hidden('id', $user->id); ?>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update</button>
                <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-undo"></i> Reset</button>
            </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script type="text/javascript">
function tampilKota()
{
	provinsi_id = document.getElementById("provinsi_id").value;
	$.ajax({
		url:"<?php echo base_url();?>auth/pilih_kota/"+provinsi_id+"",
		success: function(response){
			$("#kota_id").html(response);
		},
		dataType:"html"
	});
	return false;
}
</script>

<?php $this->load->view('front/footer'); ?>
