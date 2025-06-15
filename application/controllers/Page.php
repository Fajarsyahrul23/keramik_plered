<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct()
  {
    parent::__construct();
    /* memanggil model untuk ditampilkan pada masing2 modul */
		$this->load->model('Company_model');
		$this->load->model('Berita_model');
		$this->load->model('Foto_model');
		$this->load->model('Kategori_model');
		$this->load->model('Kontak_model');

		$this->data['company_data'] 	= $this->Company_model->get_by_company();
		$this->data['berita_sidebar'] 			= $this->Berita_model->get_all_sidebar();
		$this->data['kategori_sidebar'] 	= $this->Kategori_model->get_all();
		$this->data['kontak_sidebar'] 		= $this->Kontak_model->get_all();
		$this->data['kontak'] 				= $this->Kontak_model->get_all();
  }

	public function about()
	{
		$this->data['title'] 							= 'Tentang Kami';

    /* melakukan pengecekan data, apabila ada maka akan ditampilkan */
  	$this->data['company']            = $this->Company_model->get_by_company();

    /* memanggil view yang telah disiapkan dan passing data dari model ke view*/
		$this->load->view('front/page/about', $this->data);
	}


	public function sejarah()
	{
		$this->data['title'] 							= 'Sejarah';
		$this->load->view('front/page/sejarah', $this->data);

}

}