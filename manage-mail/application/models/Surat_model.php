<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_Model
{
    public function getAllSuratKeluar()
    {
        return $this->db->get('surat_keluar')->result_array();
    }

    public function getSuratKeluar($limit, $start)
    {
        return $this->db->get('surat_keluar', $limit, $start)->result_array();
    }

    public function getDateSK($startdate, $enddate)
    {
        return $this->db->query("SELECT * FROM surat_keluar WHERE tgl_surat BETWEEN '$startdate' AND '$enddate' ORDER BY tgl_surat ASC")->result_array();
    }

    public function countAllSuratKeluar()
    {
        return $this->db->get('surat_keluar')->num_rows();
    }

    public function delsk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('surat_keluar');
    }

    public function esk($id)
    {
        return $this->db->get_where('surat_keluar', ['id' => $id])->result_array();
    }
}
