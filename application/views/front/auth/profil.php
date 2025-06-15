<?php $this->load->view('front/header'); ?>
<?php $this->load->view('front/navbar'); ?>

<!-- Tambahkan Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet"> <!--mengimpor font "Poppins" dari Google Fonts.
wght@300;400;600 berarti kita mengambil tiga variasi ketebalan font: 300 (light), 400 (normal), dan 600 (semi-bold).-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }
    .profile-container {
        max-width: 800px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }
    .profile-title {
        text-align: center;
        font-size: 28px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 25px;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
        display: inline-block;
    }
    .profile-item {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 5px;
        background: #f5f5f5;
    }
    .profile-icon {
        font-size: 18px;
        color: #3498db;
        margin-right: 12px;
    }
    .profile-label {
        font-weight: 600;
        color: #34495e;
        font-size: 14px;
        margin-right: 10px;
        min-width: 100px;
    }
    .profile-value {
        font-size: 16px;
        color: #2c3e50;
        font-weight: 400;
    }
</style>

<div class="container">
    <div class="profile-container">
        <h2 class="profile-title">PROFIL SAYA</h2>

        <div class="profile-item">
            <i class="fa fa-user profile-icon"></i>
            <span class="profile-label">Nama:</span>
            <?php echo $profil->name ?>
        </div>

        <div class="profile-item">
            <i class="fa fa-user-circle profile-icon"></i>
            <span class="profile-label">Username:</span>
        <?php echo $profil->username ?>
        </div>

        <div class="profile-item">
            <i class="fa fa-phone profile-icon"></i>
            <span class="profile-label">No. HP:</span>
          <?php echo $profil->phone ?>
        </div>

        <div class="profile-item">
            <i class="fa fa-envelope profile-icon"></i>
            <span class="profile-label">Email:</span>
         <?php echo $profil->email ?>
        </div>

        <div class="profile-item">
            <i class="fa fa-map-marker-alt profile-icon"></i>
            <span class="profile-label">Alamat:</span>
            <?php echo $profil->address . ', ' . $profil->nama_kota . ', ' . $profil->nama_provinsi ?>
        </div>
    </div>
</div>

<?php $this->load->view('front/footer'); ?>
