<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class berita_model extends CI_Model
{
  public $table = 'berita';
  public $id    = 'id_berita';
  public $order = 'DESC';

  function get_all()
  {
    $this->db->join('kategori', 'berita.kategori = kategori.id_kategori', 'LEFT');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_new_home()
  {
    $this->db->limit(3);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_sidebar()
  {
    $this->db->limit(3);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_random()
  {
    $this->db->limit(3);
    $this->db->order_by($this->id, 'random');
    return $this->db->get($this->table)->result();
  }

  function get_all_arsip($per_page,$dari)
  {
    $this->db->order_by($this->id, 'DESC');
    $query = $this->db->get($this->table,$per_page,$dari);
    return $query->result();
  }

  function get_data_sidebar()
  {
    $this->db->limit(5);
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }

  function get_all_berita_sidebar()
  {
    $this->db->limit(5);
    $this->db->where('publish','ya');
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
  }


  // get data by id
  function get_by_id($id)
  {
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
  }

  function get_by_id_front($id)
  {
    $this->db->where('slug_berita', $id);
    return $this->db->get($this->table)->row();
  }

  function cek_kategori($id)
  {
    $this->db->join('kategori', 'berita.kategori = kategori.id_kategori');
    $this->db->where('slug_kat', $id);
    return $this->db->get($this->table);
  }

  function get_by_kategori($id,$per_page,$dari)
  {
    $this->db->join('kategori', 'berita.kategori = kategori.id_kategori');
    $this->db->order_by($this->id, 'DESC');
    $this->db->where('slug_kat', $id);
    $query = $this->db->get($this->table,$per_page,$dari);
    return $query;
  }

  // get total rows
  function total_rows() {
    return $this->db->get($this->table)->num_rows();
  }

  // get total rows
  function total_rows_kategori($id) {
    $this->db->join('kategori', 'berita.kategori = kategori.id_kategori');
    $this->db->where('slug_kat', $id);
    return $this->db->get($this->table)->num_rows();
  }

  // insert data
  function insert($data)
  {
    $this->db->insert($this->table, $data);
  }

  // insert data
  function insert_komentar($data)
  {
    $this->db->insert('komentar', $data);
  }

  // update data
  function update($id, $data)
  {
    $this->db->where($this->id,$id);
    $this->db->update($this->table, $data);
  }

  // delete data
  function delete($id)
  {
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
  }

  function del_by_id($id)
  {
    $this->db->select("foto, foto_type");
    $this->db->where($this->id,$id);
    return $this->db->get($this->table)->row();
  }

  // get all
  function get_cari_berita()
  {
    $cari_berita = $this->input->post('cari_berita');

    $this->db->like('nama_berita', $cari_berita);
    return $this->db->get($this->table)->result();
  }

}
