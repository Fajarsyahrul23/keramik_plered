<footer class="main-footer no-print">
    <div class="footer-container">
        <span>&copy; 2025 <b>UPTD Litbang Keramik Plered Purwakarta</b>. All Rights Reserved.</span>
        <span class="footer-right">Developed by <b>Fajar Syahrul Hidayat</b></span>
    </div>
</footer>

<style>
.main-footer {
    background:rgb(22, 122, 223);
    color: white;
    padding: 15px 20px; /* Tambahkan padding kiri dan kanan */
    text-align: center;
}

.footer-container {
    display: flex;
    justify-content: space-between; /* Membuat teks di kiri dan kanan */
    align-items: center;
    max-width: 1200px; /* Batasi lebar agar tidak terlalu ke pinggir */
    margin: 0 auto; /* Agar tetap di tengah */
}

.footer-right {
    text-align: right;
}

@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        text-align: center;
    }
    .footer-right {
        text-align: center;
        margin-top: 5px;
    }
}
</style>
