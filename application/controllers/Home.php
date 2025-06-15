<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->data['title'] = 'Home';

		$this->load->model('Company_model');
	
		$this->load->model('berita_model');
		$this->load->model('album_model');
		$this->load->model('Kontak_model');
		$this->load->model('Slider_model');
		$this->load->model('Pengajuan_model');

		$this->data['company_data'] 	= $this->Company_model->get_by_company();
		$this->data['berita_new'] 			= $this->berita_model->get_all_new_home();
		$this->data['album_new'] 			= $this->album_model->get_all_new_home();
		$this->data['slider_data'] 		= $this->Slider_model->get_all_home();
		$this->data['kontak'] 				= $this->Kontak_model->get_all();
	
	

		$this->load->view('front/home/body', $this->data);
	}

}
