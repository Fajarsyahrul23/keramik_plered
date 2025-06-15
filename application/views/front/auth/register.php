<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo1.png') ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="register-container">
        <div class="register-image"></div>
        <div class="register-form">
            <h3 class="text-center">Register</h3>
            <p class="text-center">Sudah punya akun? <a href="<?php echo base_url('auth/login') ?>" class="text-warning">Login di sini</a></p>
            <hr>
            <?php echo $message;?>
            <?php echo form_open("auth/register");?>
  
                <div class="row">
                    <div class="col-md-6">
                        <label>Nama</label>
                        <?php echo form_input($name, '', 'class="form-control" placeholder="Nama Lengkap"') ?>
                    </div>
                    <div class="col-md-6">
                        <label>Username</label>
                        <?php echo form_input($username, '', 'class="form-control" placeholder="Username"') ?>
                    </div>
                </div>
                <div class="row mt-3">
                <div class="col-md-6">
    <label>Password</label>
    <div class="input-group">
        <?php echo form_password($password, '', 'class="form-control" id="password" placeholder="Password"') ?>
        <button class="btn border-0 bg-transparent text-white" type="button" onclick="togglePassword('password', this)">
             <i class="fa fa-eye-slash"></i>
        </button>
    </div>
</div>

<div class="col-md-6">
    <label>Konfirmasi Password</label>
    <div class="input-group">
        <?php echo form_password($password_confirm, '', 'class="form-control" id="password_confirm" placeholder="Konfirmasi Password"') ?>
        <button class="btn border-0 bg-transparent text-white" type="button" onclick="togglePassword('password_confirm', this)">
            <i class="fa fa-eye-slash"></i>
        </button>
    </div>
</div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label>No. Hp</label>
                        <?php echo form_input($phone, '', 'class="form-control" placeholder="Nomor HP"') ?>
                    </div>
                    <div class="col-md-6">
                        <label>Email</label>
                        <?php echo form_input($email, '', 'class="form-control" placeholder="Email"') ?>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Alamat</label>
                    <?php echo form_textarea($alamat, '', 'class="form-control" placeholder="Alamat Lengkap"') ?>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label>Provinsi</label>
                        <?php echo form_dropdown('', $ambil_provinsi, '', $provinsi_id); ?>
                    </div>
                    <div class="col-md-6">
                        <label>Kabupaten/Kota</label>
                        <?php echo form_dropdown('', array(''=>'- Pilih Kota -'), '', $kota_id); ?>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary ">Daftar</button>
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

    function togglePassword(fieldId, el) {
        var input = document.getElementById(fieldId);
        var icon = el.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye-slash"); 
            icon.classList.add("fa-eye"); 
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye"); 
            icon.classList.add("fa-eye-slash"); 
        }
    }
	</script>
    </body>
    </html>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: rgb(202, 195, 195);
    }
    .register-container {
        display: flex;
        transform: scale(0.9); /* Sesuaikan angka ini */
        transform-origin: center;
        width: 900px; /* Lebih lebar */
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .register-image {
        flex: 1.8; /* Lebih besar */
        background: url('<?php echo base_url("assets/images/2.jpg") ?>') no-repeat center center/cover;
    }
    .register-form {
        flex: 1.8; /* Lebih besar */
        padding: 40px;
        background: #2c2f48;
        color: white;
    }
    .form-control {
        background: transparent !important;
        color: white !important;
        border: none;
        border-bottom: 2px solid #ff4081;
        border-radius: 0;
    }
    .form-control:focus {
        background: transparent !important;
        color: white !important;
        outline: none;
        box-shadow: none;
    }
    select.form-control option {
    color: black !important;
    background-color: white !important;
}

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }
    .btn-primary {
        background: #ff4081;
        border: none;
        width: 100%;
        padding: 10px;
    }
    input:-webkit-autofill {
    background-color: transparent !important;
    color: white !important;
    -webkit-text-fill-color: white !important;
    font: size 10px;
    -webkit-box-shadow: 0 0 0px 1000px #2c2f48 inset !important;
    transition: background-color 5000s ease-in-out 0s;
}

input:-webkit-autofill::first-line {
    color: white !important;
}

</style>

