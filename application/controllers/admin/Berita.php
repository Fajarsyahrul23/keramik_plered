<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class berita extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('berita_model');
    $this->load->model('Kategori_model');

    $this->data['module'] = 'berita';

    if(!$this->ion_auth->logged_in()){redirect('admin/auth/login', 'refresh');}
    elseif(!$this->ion_auth->is_superadmin() && !$this->ion_auth->is_admin()){redirect(base_url());}
  }

  public function index()
  {
    $this->data['title']    = 'Data '.$this->data['module'];
    $this->data['get_all']  = $this->berita_model->get_all();

    $this->load->view('back/berita/berita_list', $this->data);
  }

  public function create()
  {
    $this->data['title']          = 'Tambah '.$this->data['module'].' Baru';
    $this->data['action']         = site_url('admin/berita/create_action');
    $this->data['button_submit']  = 'Simpan';
    $this->data['button_reset']   = 'Reset';

    $this->data['nama_berita'] = array(
      'name'  => 'nama_berita',
      'id'    => 'nama_berita',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('nama_berita'),
    );

    $this->data['deskripsi'] = array(
      'name'  => 'deskripsi',
      'id'    => 'deskripsi',
      'class' => 'form-control',
      'value' => $this->form_validation->set_value('deskripsi'),
    );

    $this->data['kat_id'] = array(
      'name'  => 'kat_id',
      'id'    => 'kat_id',
      'class' => 'form-control',
      'required'    => '',
    );

    $this->data['ambil_kategori'] = $this->Kategori_model->ambil_kategori();

    $this->load->view('back/berita/berita_add', $this->data);
  }

  public function create_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->create();
    }
    else
    {
      /* 4 adalah menyatakan tidak ada file yang diupload*/
      if ($_FILES['foto']['error'] <> 4)
      {
        $nmfile = strtolower(url_title($this->input->post('nama_berita'))).date('YmdHis');

        /* memanggil library upload ci */
        $config['upload_path']      = './assets/images/berita/';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';
        $config['max_size']         = '2048'; // 2 MB
        $config['file_name']        = $nmfile; //nama yang terupload nantinya

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto'))
        {
          //file gagal diupload -> kembali ke form tambah
          $error = array('error' => $this->upload->display_errors());
          $this->session->set_flashdata('message', '<div class="alert alert-danger alert">'.$error['error'].'</div>');

          $this->create();
        }
          //file berhasil diupload -> lanjutkan ke query INSERT
          else
          {
            $foto = $this->upload->data();
            $thumbnail                = $config['file_name'];
            // library yang disediakan codeigniter
            $config['image_library']  = 'gd2';
            // gambar yang akan disimpan thumbnail
            $config['source_image']   = './assets/images/berita/'.$foto['file_name'].'';
            // membuat thumbnail
            $config['create_thumb']   = TRUE;
            // rasio resolusi
            $config['maintain_ratio'] = FALSE;
            // lebar
            $config['width']          = 800;
            // tinggi
            $config['height']         = 400;

            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            $data = array(
              'nama_berita'    => $this->input->post('nama_berita'),
              'slug_berita'     => strtolower(url_title($this->input->post('nama_berita'))),
              'deskripsi'      => $this->input->post('deskripsi'),
              'kategori'      => $this->input->post('kat_id'),
              'foto'          => $nmfile,
              'foto_type'     => $foto['file_ext'],
              'created_by'    => $this->session->userdata('username')
            );

            // eksekusi query INSERT
            $this->berita_model->insert($data);
            // set pesan data berhasil disimpan
            $this->session->set_flashdata('message', '
            <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
              <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
            </div>');
            redirect(site_url('admin/berita'));
          }
      }
      else // Jika file upload kosong
      {
        $data = array(
          'nama_berita'  => $this->input->post('nama_berita'),
          'slug_berita'     => strtolower(url_title($this->input->post('nama_berita'))),
          'deskripsi'      => $this->input->post('deskripsi'),
          'kategori'      => $this->input->post('kat_id'),
          'created_by'      => $this->session->userdata('username')
        );

        // eksekusi query INSERT
        $this->berita_model->insert($data);
        // set pesan data berhasil disimpan
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
        </div>');
        redirect(site_url('admin/berita'));
      }
    }
  }

  public function update($id)
  {
    $row = $this->berita_model->get_by_id($id);
    $this->data['berita'] = $this->berita_model->get_by_id($id);

    if ($row)
    {
      $this->data['title']          = 'Ubah Data '.$this->data['module'];
      $this->data['action']         = site_url('admin/berita/update_action');
      $this->data['button_submit']  = 'Simpan';
      $this->data['button_reset']   = 'Reset';

      $this->data['id_berita'] = array(
        'name'  => 'id_berita',
        'id'    => 'id_berita',
        'type'  => 'hidden',
      );
      $this->data['nama_berita'] = array(
        'name'  => 'nama_berita',
        'id'    => 'nama_berita',
        'class' => 'form-control',
      );
      $this->data['deskripsi'] = array(
        'name'  => 'deskripsi',
        'id'    => 'deskripsi',
        'class' => 'form-control',
      );
      $this->data['kat_id'] = array(
        'name'  => 'kat_id',
        'id'    => 'kat_id',
        'class' => 'form-control',
        'required'    => '',
      );

      $this->data['ambil_kategori'] = $this->Kategori_model->ambil_kategori();

      $this->load->view('back/berita/berita_edit', $this->data);
    }
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-warning"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
          <i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/berita'));
      }
  }

  public function update_action()
  {
    $this->_rules();

    if ($this->form_validation->run() == FALSE)
    {
      $this->update($this->input->post('id_berita'));
    }
      else
      {
        $nmfile = strtolower(url_title($this->input->post('nama_berita'))).date('YmdHis');
        $id['id_berita'] = $this->input->post('id_berita');

        /* Jika file upload diisi */
        if ($_FILES['foto']['error'] <> 4)
        {
          $nmfile = strtolower(url_title($this->input->post('nama_berita'))).date('YmdHis');

          //load uploading file library
          $config['upload_path']      = './assets/images/berita/';
          $config['allowed_types']    = 'jpg|jpeg|png|gif';
          $config['max_size']         = '2048'; // 2 MB
          $config['file_name']        = $nmfile; //nama yang terupload nantinya

          $this->load->library('upload', $config);

          // Jika file gagal diupload -> kembali ke form update
          if (!$this->upload->do_upload('foto'))
          {
            //file gagal diupload -> kembali ke form update
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert">'.$error['error'].'</div>');

            $this->update($this->input->post('id_berita'));
          }
            // Jika file berhasil diupload -> lanjutkan ke query INSERT
            else
            {
              $delete = $this->berita_model->del_by_id($this->input->post('id_berita'));

              $dir        = "assets/images/berita/".$delete->foto.$delete->foto_type;
              $dir_thumb  = "assets/images/berita/".$delete->foto.'_thumb'.$delete->foto_type;

              if(file_exists($dir))
              {
                // Hapus foto dan thumbnail
                unlink($dir);
                unlink($dir_thumb);
              }

              $foto = $this->upload->data();
              // library yang disediakan codeigniter
              $thumbnail                = $config['file_name'];
              //nama yang terupload nantinya
              $config['image_library']  = 'gd2';
              // gambar yang akan disimpan thumbnail
              $config['source_image']   = './assets/images/berita/'.$foto['file_name'].'';
              // membuat thumbnail
              $config['create_thumb']   = TRUE;
              // rasio resolusi
              $config['maintain_ratio'] = FALSE;
              // lebar
              $config['width']          = 800;
              // tinggi
              $config['height']         = 400;

              $this->load->library('image_lib', $config);
              $this->image_lib->resize();

              $data = array(
                'nama_berita'  => $this->input->post('nama_berita'),
                'slug_berita'   => strtolower(url_title($this->input->post('nama_berita'))),
                'deskripsi'    => $this->input->post('deskripsi'),
                'kategori'    => $this->input->post('kat_id'),
                'foto'        => $nmfile,
                'foto_type'   => $foto['file_ext'],
                'modified_by' => $this->session->userdata('username')
              );

              $this->berita_model->update($this->input->post('id_berita'), $data);
              $this->session->set_flashdata('message', '
              <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
                <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
              </div>');
              redirect(site_url('admin/berita'));
            }
        }
          // Jika file upload kosong
          else
          {
            $data = array(
              'nama_berita'  => $this->input->post('nama_berita'),
              'slug_berita'   => strtolower(url_title($this->input->post('nama_berita'))),
              'deskripsi'    => $this->input->post('deskripsi'),
              'kategori'    => $this->input->post('kat_id'),
              'modified_by' => $this->session->userdata('username')
            );

            $this->berita_model->update($this->input->post('id_berita'), $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
              <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil disimpan
            </div>');
            redirect(site_url('admin/berita'));
          }
      }
  }

  public function delete($id)
  {
    $delete = $this->berita_model->del_by_id($id);

    // menyimpan lokasi gambar dalam variable
    $dir = "assets/images/berita/".$delete->foto.$delete->foto_type;
    $dir_thumb = "assets/images/berita/".$delete->foto.'_thumb'.$delete->foto_type;

    // Hapus foto
    unlink($dir);
    unlink($dir_thumb);

    // Jika data ditemukan, maka hapus foto dan record nya
    if($delete)
    {
      $this->berita_model->delete($id);

      $this->session->set_flashdata('message', '
      <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
        <i class="ace-icon fa fa-bullhorn green"></i> Data berhasil dihapus
      </div>');
      redirect(site_url('admin/berita'));
    }
      // Jika data tidak ada
      else
      {
        $this->session->set_flashdata('message', '
        <div class="alert alert-block alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
					<i class="ace-icon fa fa-bullhorn green"></i> Data tidak ditemukan
        </div>');
        redirect(site_url('admin/berita'));
      }
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nama_berita', 'nama berita', 'trim|required');

    // set pesan form validasi error
    $this->form_validation->set_message('required', '{field} wajib diisi');

    $this->form_validation->set_rules('id_berita', 'id_berita', 'trim');
    $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert">', '</div>');
  }

}
