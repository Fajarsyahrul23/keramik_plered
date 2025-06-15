<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengajuan Surat</title>
     <?php $this->load->view('front/header'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            width: 100%;
            background: green;
            color: white !important;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background:rgb(56, 110, 50);
        }
       
        
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php $this->load->view('front/navbar'); ?>



<h2 style="text-align:center; color:#3b8352">FORM PENGAJUAN SURAT</h2>

<?php if ($this->session->flashdata('error')): ?>
    <div class="error"><?= $this->session->flashdata('error') ?></div>
<?php endif; ?>

<form action="<?= base_url('pengajuan/ajukan') ?>" method="post" enctype="multipart/form-data">
    <label>Nama Perusahaan:</label>
    <input type="text" name="nama_perusahaan" value="<?= set_value('nama_perusahaan') ?>"placeholder="Silahkan Masukkan Nama Perusahaan" required>
    <?= form_error('nama_perusahaan', '<div class="error">', '</div>') ?>

  <label>NPWP Perusahaan:</label>
<small style="color: gray;">Silakan masukkan NPWP (Contoh: 12.345.678.9-012.345)</small>
<input type="text" name="npwp_perusahaan" id="npwp" value="<?= set_value('npwp_perusahaan') ?>"placeholder="Silahkan Masukkan NPWP" maxlength="20" required>
<?= form_error('npwp_perusahaan', '<div class="error">', '</div>') ?>


    <label>Alamat Perusahaan:</label>
    <input type="text" name="alamat_perusahaan" value="<?= set_value('alamat_perusahaan') ?>"placeholder="Silahkan Masukkan Alamat Perusahaan" required>
    <?= form_error('alamat_perusahaan', '<div class="error">', '</div>') ?>

    <label>Penanggung Jawab:</label>
    <input type="text" name="pj_perusahaan" value="<?= set_value('pj_perusahaan') ?>"placeholder="Silahkan Masukkan Penanggung Jawab" required>
    <?= form_error('pj_perusahaan', '<div class="error">', '</div>') ?>

    <label>Kontak:</label>
    <input type="text" name="kontak" value="<?= set_value('kontak') ?>"placeholder="Silahkan Masukkan Kontak" required>
    <?= form_error('kontak', '<div class="error">', '</div>') ?>

    <label>Nama Produk:</label>
    <input type="text" name="nama_produk" value="<?= set_value('nama_produk') ?>"placeholder="Silahkan Masukkan Nama Produk" required>
    <?= form_error('nama_produk', '<div class="error">', '</div>') ?>

    <label>Jumlah Barang Perkontainer:</label>
    <input type="number" name="jumlah_barang" value="<?= set_value('jumlah_barang') ?>"placeholder="Silahkan Masukkan Jumlah Barang" required>
    <?= form_error('jumlah_barang', '<div class="error">', '</div>') ?>

    <label>Negara Tujuan:</label>
    <input type="text" name="negara_tujuan" value="<?= set_value('negara_tujuan') ?>"placeholder="Silahkan Masukkan Negara Tujuan" required>
    <?= form_error('negara_tujuan', '<div class="error">', '</div>') ?>

    <label>Metode Pengiriman:</label>
    <select name="metode_pengiriman" required>
        <option value="" disabled <?= set_select('metode_pengiriman', '', TRUE) ?>>--- Pilih ---</option>
        <option value="Air Freight Export (Udara)" <?= set_select('metode_pengiriman', 'Air Freight Export (Udara)') ?>>Air Freight Export (Udara) </option>
        <option value="Sea Freight Export (Laut)" <?= set_select('metode_pengiriman', 'Sea Freight Export (Laut)') ?>>Sea Freight Export (Laut)</option>
        <option value="Land Freight Export (Darat)" <?= set_select('metode_pengiriman', 'Land Freight Export (Darat)') ?>>Land Freight Export (Darat)</option>
    </select>
    <?= form_error('metode_pengiriman', '<div class="error">', '</div>') ?>

    <label>Unggah Dokumen Pendukung (PDF):</label>
    <input type="file" name="dokumen_pendukung" accept=".pdf" required>
    <?php if ($this->session->flashdata('upload_error')): ?>
        <div class="error"><?= $this->session->flashdata('upload_error') ?></div>
    <?php endif; ?>

    <br>
    <button type="submit">Ajukan</button>
</form>


<?php $this->load->view('front/footer'); ?>

</body>
</html>