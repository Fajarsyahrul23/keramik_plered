<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('clean');
    /* memanggil model untuk ditampilkan pada masing2 modul */
		$this->load->model('Album_model');
		$this->load->model('Company_model');
	
		$this->load->model('Foto_model');
		$this->load->model('Kategori_model');
		$this->load->model('Kontak_model');
        $this->load->model('Pengajuan_Model');
        $this->load->library(['ion_auth', 'session']);
		/* memanggil function dari masing2 model yang akan digunakan */
		$this->data['company_data'] 			= $this->Company_model->get_by_company();
	
		$this->data['kategori_sidebar'] 	= $this->Kategori_model->get_all();
		$this->data['kontak_sidebar'] 		= $this->Kontak_model->get_all();
       

        // Pastikan hanya user yang login bisa mengakses
        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Silakan login terlebih dahulu.</div>');
            redirect('auth/login'); // Redirect ke halaman login
        }
    }

    // Menampilkan daftar pengajuan user
        public function index() {
            $id_user = $this->ion_auth->user()->row()->id; // Menggunakan 'id' sesuai tabel user
            $this->data['pengajuan'] = $this->Pengajuan_Model->get_by_user($id_user); 
            $this->data['title'] = "Daftar Pengajuan"; // Tambahkan variabel title
            // Tambahkan pengajuan ke this->data
        
            $this->load->view('front/pengajuan/index', $this->data);
        }
        

    public function form() {
        $this->data['company_data'] = $this->Company_model->get_by_company(); 
        $this->load->view('front/pengajuan/form', $this->data);
    }
    

 public function ajukan() {
    $this->load->library('form_validation');

    // Aturan validasi
    $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
    $this->form_validation->set_rules('npwp_perusahaan', 'NPWP Perusahaan',
        'required|regex_match[/^\d{2}\.\d{3}\.\d{3}\.\d{1}-\d{3}\.\d{3}$/]',
        array('regex_match' => 'Format NPWP tidak valid. Silahkan Gunakan Format Seperti Contoh')
    );
    $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required');
    $this->form_validation->set_rules('pj_perusahaan', 'Penanggung Jawab', 'required');
    $this->form_validation->set_rules('kontak', 'Kontak', 'required');
    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
    $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required|numeric');
    $this->form_validation->set_rules('negara_tujuan', 'Negara Tujuan', 'required');
    $this->form_validation->set_rules('metode_pengiriman', 'Metode Pengiriman', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, tampilkan kembali form + data sidebar
        $this->data['company_data'] = $this->Company_model->get_by_company();
        $this->data['title'] = "Form Pengajuan";
        $this->load->view('front/pengajuan/form', $this->data);
    } else {
        // Validasi lolos, lanjut upload dokumen
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf|docx';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('dokumen_pendukung')) {
            $this->session->set_flashdata('error', 'Upload gagal! Periksa format file.');
            redirect('pengajuan/form');
        } else {
            $file = $this->upload->data();
            $data = [
                'id_user' => $this->ion_auth->user()->row()->id,
                'nama_perusahaan' => $this->input->post('nama_perusahaan'),
                'npwp_perusahaan' => $this->input->post('npwp_perusahaan'),
                'alamat_perusahaan' => $this->input->post('alamat_perusahaan'),
                'pj_perusahaan' => $this->input->post('pj_perusahaan'),
                'kontak' => $this->input->post('kontak'),
                'nama_produk' => $this->input->post('nama_produk'),
                'jumlah_barang' => $this->input->post('jumlah_barang'),
                'negara_tujuan' => $this->input->post('negara_tujuan'),
                'metode_pengiriman' => $this->input->post('metode_pengiriman'),
                'dokumen_pendukung' => $file['file_name'],
                'status_pengajuan' => 'Pending',
                'alasan_penolakan' => NULL,
                'surat_rekomendasi' => NULL,
                'tanggal_pengajuan' => date('Y-m-d H:i:s')
            ];
            $this->Pengajuan_Model->create($data);
            $this->session->set_flashdata('success', 'Pengajuan berhasil dikirim. Menunggu validasi admin.');
            redirect('pengajuan');
        }
    }
}



    //  User mengunduh surat yang sudah disetujui
    public function download_surat($id_pengajuan) {
        $pengajuan = $this->Pengajuan_Model->get_by_id($id_pengajuan);
    
        // Cek apakah user memiliki pengajuan ini
        if (!$pengajuan || $pengajuan->id_user != $this->ion_auth->user()->row()->id) { 
            $this->session->set_flashdata('error', 'Akses ditolak.');
            redirect('pengajuan');
        }
    
        // Cek apakah pengajuan sudah disetujui dan ada file surat
        if ($pengajuan->status_pengajuan !== 'Disetujui' || empty($pengajuan->surat_rekomendasi)) {
            $this->session->set_flashdata('error', 'Surat belum tersedia.');
            redirect('pengajuan');
        }
    
        // Arahkan langsung ke file PDF di browser
        $file_path = base_url('uploads/surat/' . $pengajuan->surat_rekomendasi);
        redirect($file_path);
    }
    
}
?>
