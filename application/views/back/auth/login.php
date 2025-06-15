<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?php echo base_url()?>assets/template/backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()?>assets/template/backend/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url()?>assets/plugins/jquery/jquery-3.3.1.js"></script>
    <script src="<?php echo base_url()?>assets/template/backend/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/logo1.png') ?>" />
    <?php echo $script_captcha; ?>
    
    <style>
        body {
            background: #1E293B;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: rgba(30, 41, 59, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            width: 360px;
        }
        .login-logo b {
            color: #fff;
            font-size: 22px;
        }
        .login-box-body {
            background: transparent;
            padding: 20px;
        }
        .form-group {
            position: relative;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
            border-radius: 8px;
            padding-left: 40px;
            padding-right: 40px; /* Tambahan padding untuk ruang ikon */
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        .form-group .glyphicon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.6);
        }
        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: rgba(255, 255, 255, 0.7);
        }
        .text-muted {
        color: rgba(255, 255, 255, 0.7);
      }
      .text-muted a {
        color: #22d3ee;
        text-decoration: none;
      }
      .text-muted a:hover {
        text-decoration: underline;
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
</head>
<body>
    <div class="login-box">
        <div class="login-logo">
            <b>Log In</b>
        </div>
        <div class="login-box-body">
            <?php echo $message;?>
            <?php echo form_open("admin/auth/login");?>
            
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-user"></span>
                <?php echo form_input($identity, '', 'class="form-control" placeholder="Isikan Email Anda"'); ?>
            </div>
            
            <div class="form-group has-feedback">
                <span class="glyphicon glyphicon-lock"></span>
                <?php echo form_password($password, '', 'class="form-control" id="password" placeholder="Isikan Password Anda"'); ?>
                <span class="toggle-password" onclick="togglePassword('password', this)">
                    <i class="fa fa-eye-slash"></i>
                </span>
            </div>
<br>
            <div class="recaptcha-container" style="display: flex; justify-content: center; width: 100%; max-width: 300px; margin: 0 auto;">
    <?php echo $captcha ?>
</div>

            <div class="remember-captcha;">
                <label style="color:rgb(220, 223, 221)">
                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember Me
                </label>
            </div>

            <button type="submit" class="btn btn-primary btn-block" style="margin-top: 15px;">Sign In</button>
            <?php echo form_close();?>
        </div>
    </div>

    <script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
</body>
</html>
