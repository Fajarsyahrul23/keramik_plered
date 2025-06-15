<body>

    <!-- Konten Utama -->
    <div class="container">
        <!-- Konten di sini -->
    </div>

    <!-- Footer -->
    <footer style="background-color:#073836; color: white;" class="mt-auto py-4">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="col-md-3 text-center text-md-start mb-5">
                    <img class="mb-1 img-fluid" src="<?php echo base_url('assets/images/company/logo1.png'); ?>" 
                        width="160" alt="Kesbangpol Purwakarta" />
                </div>

                <!-- Tautan Kab Purwakarta -->
                <div class="col-md-3 mb-4">
                    <h4 class="text-white">Tautan Kab Purwakarta</h4>
                    <ul class="list-unstyled">
                        <li><a href="https://www.purwakartakab.go.id/#" class="text-white"  >Portal Kab Purwakarta</a></li>
                        <li><a href="https://jdih.purwakartakab.go.id/" class="text-white">Regulasi</a></li>
                        <li><a href="https://ppid.purwakartakab.go.id/" class="text-white">PPID</a></li>
                        <li><a href="http://laporanwarga.oganlopian.purwakartakab.go.id/" class="text-white">Laporan Warga</a></li>
                    </ul>
                </div>

                <!-- Statistik Pengunjung -->
                <div class="col-md-2 mb-3">
                    <h4 class="text-white">Pengunjung</h4>
                    <ul class="list-unstyled">
                        <li>Hari Ini : <strong>135 Orang</strong></li>
                        <li>Bulan Ini : <strong>8408 Orang</strong></li>
                        <li>Total : <strong>76556 Orang</strong></li>
                    </ul>
                </div>

                <!-- Alamat -->
                <div class="col-md-3">
                    <h4 class="text-white">Alamat</h4>
                    <p class="mb-1">Jl. Raya Anjun-Plered-Purwakarta Jl. Raya Plered No.12B, Anjun, Kec. Plered, Kabupaten Purwakarta, Jawa Barat </p>
                    <p class="mb-1">Kode Pos 41162</p>
                    <p class="mb-1">
                        <a href="mailto:uptdkeramik@purwakartakab.go.id" class="text-white">
                            uptdkeramik@purwakartakab.go.id
                        </a>
                    </p>
                    <p>0877 3796 8218</p>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

<style>html, body {
    height: 100%;
    margin: 0;
    display: flex;
    flex-direction: column;
}

.container {
    flex: 1;
}


    .list-unstyled{
        color: white;
}

ul.list-unstyled li a {
    color: rgb(247, 239, 239); /* Warna default */
    text-decoration: none; /* Menghilangkan garis bawah */
    transition: color 0.3s ease-in-out; /* Animasi perubahan warna */
}

ul.list-unstyled li a:hover {
    color: blue; /* Warna saat di-hover */
    text-decoration: underline; /* Opsional: menambahkan garis bawah */
}

</style>
