<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo1.png') ?>" />
    <?php echo $script_captcha; ?> <!-- Captcha Script -->

</head>
<body>
    <div class="login-container">
        <div class="login-image"></div>
        <div class="login-form">
            <h3 class="text-center">Login</h3>
            <p class="text-center">Belum punya akun? <a href="<?php echo base_url('auth/register') ?>" class="text-warning">Daftar di sini</a></p>
            <hr>
            <?php echo $message;?>
            <?php echo form_open("auth/login");?>
                <div class="mb-3">
                    <label>Email</label>
                    <?php echo form_input($identity, '', 'class="form-control" placeholder="Masukkan Email"') ?>
                </div>
                
                <div class="mb-3">
    <label>Password</label>
    <div class="position-relative">
    <?php echo form_password(array('name' => 'password', 'id' => 'password', 'class' => 'form-control', 'placeholder' => 'Masukkan Password')); ?>
        <i id="eye-icon" class="fa fa-eye-slash position-absolute end-0 top-50 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword()"></i>
    </div>

                </div>
                <div class="form-group text-center">
                <p><?php echo $captcha; ?></p>
            </div>
                <div class="d-flex justify-content-between">
                    <div>
                        <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                        <label for="remember">Ingat Saya</label>
                    </div>
                   <!-- <button type="button" class="btn btn-link text-light p-0" data-bs-toggle="modal" data-bs-target="#pswreset">Lupa Password?</button>
               !-->  </div>
                <div class="mt-3">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </div>
            <?php echo form_close();?>
        </div>
    </div>

    <!-- Modal Reset Password 
    <div class="modal fade" id="pswreset" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <?php echo form_open("auth/forgot_password");?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Masukkan Email Anda</label>
                        <input class="form-control" name="identity" type="text" placeholder="Email Anda" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color:rgb(202, 195, 195);
        }
        .login-container {
            display: flex;
            width: 700px;
            
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .login-image {
            flex: 1;
            background: url('<?php echo base_url("assets/images/2.jpg") ?>') no-repeat center center/cover;
          
        }
        .login-form {
            flex: 1;
            padding: 40px;
            background: #2c2f48;
            color: white;
        }
        .form-control {
            background: transparent;
            border: none;
            border-bottom: 2px solid #ff4081;
            border-radius: 0;
            color: white;
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
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgb(202, 195, 195);
        }
        .register-container {
            display: flex;
            width: 800px;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .register-image {
            flex: 1;
            background: url('<?php echo base_url("assets/images/2.jpg") ?>') no-repeat center center/cover;
        }
        .register-form {
            flex: 1;
            padding: 40px;
            background: #2c2f48;
            color: white;
        }
        .form-control {
            background: transparent;
            border: none;
            border-bottom: 2px solid #ff4081;
            border-radius: 0;
            color: white;
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
		.form-control {
    background: transparent !important; /* Hapus warna putih */
    color: white !important; /* Ubah teks menjadi putih */
    border: none;
    border-bottom: 2px solid #ff4081; /* Garis bawah pink */
    border-radius: 0;
}

.form-control:focus {
    background: transparent !important;
    color: white !important;
    outline: none;
    box-shadow: none; /* Hilangkan efek glow saat focus */
}

.form-control::placeholder {
    color: rgba(255, 255, 255, 0.7);
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


<script>
function togglePassword() {
    var passwordField = document.getElementById("password");
    var eyeIcon = document.getElementById("eye-icon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
    } else {
        passwordField.type = "password";
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
    }
}
</script>
