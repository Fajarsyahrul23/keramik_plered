<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php'; 
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;


class Pengajuan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengajuan_Model');
        $this->load->library(['ion_auth', 'session','Pdfgenerator']); // Tambahkan Ion Auth

        // Pastikan hanya admin yang bisa mengakses halaman ini
        if(!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
        elseif(!$this->ion_auth->is_superadmin() && !$this->ion_auth->is_admin()){redirect(base_url());}
    }

    public function index() {
        $data['title'] = 'Data Pengajuan';
        $data['pengajuan'] = $this->Pengajuan_Model->get_all();
        $this->load->view('back/pengajuan/list', $data);
    }

    public function setujui($id_pengajuan) {
        // Ambil data pengajuan berdasarkan ID
        $pengajuan = $this->Pengajuan_Model->get_by_id($id_pengajuan);
        
        // Jika tidak ditemukan, berikan notifikasi error
        if (!$pengajuan) {
            $this->session->set_flashdata('error', 'Pengajuan tidak ditemukan.');
            redirect('admin/pengajuan');
        }
    
        // **Cek apakah ID pengajuan tersedia**
        if (!isset($pengajuan->id_pengajuan)) {
            $this->session->set_flashdata('error', 'ID Pengajuan tidak valid.');
            redirect('admin/pengajuan');
        }
    
        // **Buat Nomor Surat**
        $bulan = date('m');
        $tahun = date('Y');
        $nomor_surat = str_pad((int) $pengajuan->id_pengajuan, 3, '0', STR_PAD_LEFT) . "/UPTD-KERAMIK/$bulan/$tahun";
    
        // ** Format Tanggal Surat**
        $tempat = "Purwakarta";
        $tanggal_surat = $tempat . ", " . date('d M Y');
    
        // Pastikan Folder `uploads/surat` Ada**
        $folder_path = FCPATH . 'uploads/surat';
        if (!is_dir($folder_path)) {
            mkdir($folder_path, 0777, true);
        }
    
        // Nama File PDF**
        $nama_surat = 'surat_rekomendasi_' . $id_pengajuan . '.pdf';
        $file_path = $folder_path . '/' . $nama_surat;
    
        //  Load Library HTML2PDF**
        $this->load->library('Pdfgenerator');
    
        //  Data untuk Template Surat**
        $data = [
            'pengajuan'    => $pengajuan,
            'nomor_surat'  => $nomor_surat,
            'tanggal_surat'=> $tanggal_surat,
            'lampiran'     => "1 Berkas",
            'perihal'      => "Permohonan Izin Ekspor Keramik"
        ];
    
        //  Load View sebagai HTML**
        $html = $this->load->view('pdf/surat_rekomendasi', $data, true);
    
        //  Konversi ke PDF**
        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'en');
            $html2pdf->writeHTML($html);
            $html2pdf->output($file_path, 'F');  // Simpan PDF di server
        } catch (Exception $e) {
            $this->session->set_flashdata('error', 'Gagal membuat surat: ' . $e->getMessage());
            redirect('admin/pengajuan');
        }
    
        //  Simpan Nama File & Status ke Database**
        $this->Pengajuan_Model->update_status($id_pengajuan, 'Disetujui', NULL, $nama_surat);
        $this->session->set_flashdata('success', 'Pengajuan disetujui dan surat rekomendasi dibuat.');
    
        redirect('admin/pengajuan');
    }
    
    

    public function tolak($id_pengajuan) {
        $pengajuan = $this->Pengajuan_Model->get_by_id($id_pengajuan);
        if (!$pengajuan) {
            $this->session->set_flashdata('error', 'Pengajuan tidak ditemukan.');
            redirect('admin/pengajuan');
        }

        $alasan = $this->input->post('alasan_penolakan');
        if (empty($alasan)) {
            $this->session->set_flashdata('error', 'Harap isi alasan penolakan.');
            redirect('admin/pengajuan');
        }

        // Ubah status menjadi Ditolak dan simpan alasan penolakan
        $this->Pengajuan_Model->update_status($id_pengajuan, 'Ditolak', $alasan);
        $this->session->set_flashdata('error', 'Pengajuan ditolak.');
        redirect('admin/pengajuan');
    }

    public function hapus($id_pengajuan)
    {
        $this->load->model('Pengajuan_Model');
    
        // Ambil data pengajuan berdasarkan ID
        $pengajuan = $this->Pengajuan_Model->get_by_id($id_pengajuan);
    
        if (!$pengajuan) {
            $this->session->set_flashdata('error', 'Data pengajuan tidak ditemukan.');
            redirect('admin/pengajuan');
        }
    
        // Jika ada surat rekomendasi, hapus file dari server
        if (!empty($pengajuan->surat_rekomendasi)) {
            $file_path = FCPATH . 'uploads/surat/' . $pengajuan->surat_rekomendasi;
            if (file_exists($file_path)) {
                unlink($file_path); // Hapus file surat
            }
        }
    
        // Hapus data pengajuan dari database
        $this->Pengajuan_Model->delete($id_pengajuan);
    
        $this->session->set_flashdata('success', 'Pengajuan berhasil dihapus.');
        redirect('admin/pengajuan');
    }
    

public function preview_surat($id_pengajuan) {
        $pengajuan = $this->Pengajuan_Model->get_by_id($id_pengajuan);
        if (!$pengajuan) {
            show_error("Data pengajuan tidak ditemukan.", 404);
            return;
        }
    
        // Format Nomor Surat: 001/UPTD-KERAMIK/{BULAN}/{TAHUN}
        $bulan = date('m');
        $tahun = date('Y');
        $nomor_surat = str_pad($pengajuan->id_pengajuan, 3, '0', STR_PAD_LEFT) . "/UPTD-KERAMIK/$bulan/$tahun";
    
        // Format Tanggal
        $tempat = "Purwakarta";
        $tanggal_surat = $tempat . ", " . date('d M Y');
    
        // Kirim ke View
        $data['pengajuan'] = $pengajuan;
        $data['nomor_surat'] = $nomor_surat;
        $data['tanggal_surat'] = $tanggal_surat;
        $data['lampiran'] = "1 Berkas";
        $data['perihal'] = "Permohonan Izin Ekspor Keramik";

    
        // Load view sebagai HTML
        $html = $this->load->view('back/pengajuan/preview_surat', $data, true);
    
        try {
            $html2pdf = new Html2Pdf('P', 'A4', 'en');
            $html2pdf->writeHTML($html);
            $html2pdf->output('preview_surat.pdf');
        } catch (Exception $e) {
            echo "Terjadi kesalahan dalam membuat PDF: " . $e->getMessage();
        }
    }
    
    
    


}
?>
