<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
	
		$this->load->model('Pengajuan_model');
		$this->load->model('berita_model');
		$this->load->model('album_model');
		$this->load->model('foto_model');
		$this->load->model('Ion_auth_model');
		$this->load->model('Kategori_model');
		$this->load->model('Kontak_model');

		$this->load->model('Slider_model');

		if(!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
		elseif(!$this->ion_auth->is_superadmin() && !$this->ion_auth->is_admin()){redirect(base_url());}
		else
		{
			$this->data = array(
	      'title' 						=> 'Dashboard',
		  
		  		'total_pengajuan' 			=> $this->Pengajuan_model->total_rows(),
				'total_berita' 			=> $this->berita_model->total_rows(),
				'total_album' 			=> $this->album_model->total_rows(),
				'total_foto' 			=> $this->foto_model->total_rows(),
				'total_kategori' 		=> $this->Kategori_model->total_rows(),
				'total_kontak' 			=> $this->Kontak_model->total_rows(),
				
				'total_slider' 			=> $this->Slider_model->total_rows(),
				'total_customer' 		=> $this->Ion_auth_model->total_rows_customer(),

			);

			$this->load->view('back/dashboard',$this->data);
		}
	}

}
