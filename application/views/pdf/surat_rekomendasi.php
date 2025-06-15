<style>
    body {
        font-family: Times, serif;
        font-size: 11pt;
        margin: 20px;
    }

    .kop-surat {
        width: 100%;
        border-bottom: 2px solid black;
        text-align: center;
    }

    .kop-surat td {
        vertical-align: middle;
        padding: 5px;
    }

    .logo {
        width: 80px;
    }

    .judul {
        text-align: center;
        font-size: 14pt;
        font-weight: bold;
        margin-bottom: 2px;
        line-height: 1.2;
    }

    .alamat {
        text-align: center;
        font-size: 11pt;
        margin-top: 0px;
    }

    .tujuan-surat{
        font-size: 11pt; 
        line-height: 1.2;
    }

    /* Tabel Info Surat */
    .info-surat {
        width: 100%;
        margin-top: 10px;
        font-family: Times, serif;
        font-size: 11pt; /* Ukuran font diperbesar */
    }

    .info-surat td {
        padding: 5px;
        vertical-align: top;
      
    }

    .label {
        width: 50px; /* Pastikan label sejajar */
        font-weight: bold;
        text-align: left;
       
    }

    .isi {
        text-align: left;
    }

    .tanggal-surat {
        text-align: right;
        width: 55%;
    }

.dengan-hormat{
    width: 100%;
    margin-top: 10px;
    font-size: 11pt;
}
    
.info-pengajuan {
        width: 100%;
        border-collapse: collapse;
        font-size: 11pt;
    }

    .info-pengajuan td {
        padding: 5px;
        vertical-align: top;
    }

    .info-pengajuan td:first-child {
        width: 200px;
        white-space: nowrap;
    }

    .info-pengajuan td:last-child {
        width: auto;
    }

    .paragraf-in {
        font-size: 11pt;
        text-align: justify;
        text-indent: 30px;
        line-height: 1.2;
    }
    .ttd-table {
        width: 100%;
        margin-top: 30px;
        text-align: right;
    }

    .ttd-table td {
    
    }
</style>

<!-- Kop Surat -->
<table class="kop-surat">
    <tr>
        <td width="15%">
            <img src="<?= base_url('assets/images/logo1.png'); ?>" class="logo">
        </td>
        <td width="85%">
            <p class="judul">
                PEMERINTAH KABUPATEN PURWAKARTA<br>
                UNIT PELAKSANA TEKNIS DAERAH PENELITIAN DAN PENGEMBANGAN<br>
                SENTRA KERAMIK PLERED
            </p>
            <p class="alamat">
                Alamat: Jl. Raya Plered No.12B, Purwakarta | Email: uptdkeramik@purwakarta.go.id
            </p>
        </td>
    </tr>
</table>

<!-- Nomor Surat, Lampiran, Perihal & Tanggal -->
<table class="info-surat">
    <tr>
        <td class="label">Nomor</td>
        <td class="isi">: <?=$nomor_surat; ?></td>
        <td class="tanggal-surat"><?= $tanggal_surat; ?></td>
    </tr>
    <tr>
        <td class="label">Lampiran</td>
        <td class="isi">: <?=$lampiran ?></td>
    </tr>
    <tr>
        <td class="label">Perihal</td>
        <td class="isi">: <?=$perihal ?></td>
    </tr>
</table>
<!-- Tujuan Surat -->
<br>
<table class="tujuan-surat">
    <tr>
        <td>Kepada Yth,</td>
    </tr>
    <tr>
        <td>Menteri Perdagangan Republik Indonesia</td>
    </tr>
    <tr>
        <td>Direktur Jenderal Perdagangan Luar Negeri</td>
    </tr>
    <tr>
        <td>Kementerian Perdagangan RI</td>
    </tr>
    <tr>
        <td>Di Tempat</td>
    </tr>
</table>

<table class="dengan-hormat">
    <tr>
        <td colspan="2"><strong>Dengan hormat, </strong> Sehubungan dengan permohonan rekomendasi ekspor yang diajukan oleh:</td>
    </tr>
</table>
<!-- Informasi Permohonan Rekomendasi Ekspor -->
<table class="info-pengajuan">
    <tr>
        <td>Nama Perusahaan</td>
        <td style="display: inline-block; width: 70px; text-align: right;">:</td>

        <td><?= $pengajuan->nama_perusahaan; ?></td>
    </tr>
    <tr>
        <td>Alamat Perusahaan</td>
        <td style="display: inline-block; width: 30px; text-align: right;">:</td>

        <td><?= $pengajuan->alamat_perusahaan; ?></td>
    </tr>
    <tr>
        <td>NPWP Perusahaan</td>
        <td style="display: inline-block; width: 30px; text-align: right;">:</td>

        <td><?= $pengajuan->npwp_perusahaan; ?></td>
    </tr>
    <tr>
        <td>Penanggung Jawab</td>
        <td style="display: inline-block; width: 30px; text-align: right;">:</td>

        <td><?= $pengajuan->pj_perusahaan; ?></td>
    </tr>
    <tr>
        <td>Nomor Telepon / Email</td>
        <td style="display: inline-block; width: 30px; text-align: right;">:</td>

        <td><?= $pengajuan->kontak; ?></td>
    </tr>
</table>

<p class="paragraf-in">
    Bersama ini, Dinas Koperasi, UKM, Perdagangan & Perindustrian Purwakarta melalui 
    Unit Pelaksana Teknis Daerah Penelitian dan Pengembangan Sentra Keramik Plered memberikan rekomendasi ekspor 
    kepada perusahaan tersebut untuk mengekspor produk keramik dengan rincian sebagai berikut:
</p>

<table class="info-pengajuan">
    <tr>
        <td>Nama Produk</td>
        <td style="display: inline-block; width: 30px; text-align: right;">:</td>
        <td><?= $pengajuan->nama_produk; ?></td>
    </tr>
    <tr>
        <td>Jumlah Barang Perkontainer</td>
        <td style="display: inline-block; width: 30px; text-align: right;">:</td>
        <td><?= $pengajuan->jumlah_barang; ?></td>
    </tr>
    <tr>
        <td>Negara Tujuan</td>
        <td style="display: inline-block; width: 30px; text-align: right;">:</td>
        <td><?= $pengajuan->negara_tujuan; ?></td>
    </tr>
    <tr>
        <td>Metode Pengiriman</td>
        <td style="display: inline-block; width: 30px; text-align: right;">:</td>
        <td><?= $pengajuan->metode_pengiriman; ?></td>
    </tr>
</table>
<p class="paragraf-in">
Berdasarkan Undang-Undang Nomor 7 Tahun 2014 tentang Perdagangan dan Peraturan Menteri Perdagangan Republik Indonesia
 Nomor 19 Tahun 2021 tentang Kebijakan dan Pengaturan Ekspor, setelah dilakukan verifikasi 
 terhadap produk dan dokumen pendukung, perusahaan ini memenuhi syarat untuk melakukan ekspor 
 produk keramik sesuai dengan ketentuan yang berlaku. Dengan ini, kami merekomendasikan kepada 
 Kementerian Perdagangan Republik Indonesia untuk memberikan izin ekspor kepada perusahaan tersebut.<br><br>
 Demikian surat rekomendasi ini dibuat untuk dapat digunakan sebagaimana mestinya. 
        Atas perhatian dan kerja samanya, kami ucapkan terima kasih.
</p>


<table style="width: 100%; border-collapse: collapse; padding: 5px;">
    <tr>
        <!-- Kolom Kiri Kosong untuk Tembusan di Bawah -->
        <td style="width: 50%; vertical-align: bottom; padding-left: 20px; padding-top: 115px;">
            <strong>Tembusan:</strong>
            <ol>
                <li>Dinas Koperasi, UKM, Perdagangan & Perindustrian Purwakarta</li>
                <li>Arsip</li>
            </ol>
        </td>

        <!-- Kolom Kanan untuk Kepala UPTD di Atas -->
        <td style="width: 50%; text-align: right; vertical-align: top; padding-bottom: 20px; padding-right: 20px;">
            <table align="right">
                <tr>
                    <td style="text-align: center;">Kepala UPTD LITBANG Sentra Keramik</td>
                </tr>
                <tr>
                    <td style="text-align: center; padding-top: 75px; font-weight:bold;">[Nama Pejabat]</td>
                </tr>
            </table>
        </td>
    </tr>
</table>



