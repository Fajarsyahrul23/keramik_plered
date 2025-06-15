<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_Model extends CI_Model {
    
    public function create($data) {
        $this->db->insert('pengajuan', $data);
        return $this->db->insert_id(); // Mengembalikan ID pengajuan yang baru dibuat
    }

    public function get_by_user($id_user) {
        return $this->db->where('id_user', $id_user)
                        ->order_by('tanggal_pengajuan', 'DESC')
                        ->get('pengajuan')
                        ->result();
    }

    public function get_all() {
        
        return $this->db->order_by('tanggal_pengajuan', 'DESC')->get('pengajuan')->result();
    }

    public function get_by_id($id_pengajuan) {
        return $this->db->where('id_pengajuan', $id_pengajuan)->get('pengajuan')->row();
    }

    public function update_status($id_pengajuan, $status, $alasan = NULL, $surat = NULL) {
        $data = ['status_pengajuan' => $status];

        if (!is_null($alasan)) {
            $data['alasan_penolakan'] = $alasan;
        }
        if (!is_null($surat)) {
            $data['surat_rekomendasi'] = $surat;
        }

        return $this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan', $data);
    }

    public function delete($id_pengajuan) {
        return $this->db->where('id_pengajuan', $id_pengajuan)->delete('pengajuan');
    }
    public function total_rows()
{
    return $this->db->count_all('pengajuan');
}

}
?>
