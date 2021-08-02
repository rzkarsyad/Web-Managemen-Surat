<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KodeUrut_model extends CI_Model
{

    function addKode()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(kode,4)) AS kd_max FROM kode_urut WHERE YEAR(created)=YEAR(NOW())");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        $kode = $kd;
        $data = array(
            'kode' => $kode
        );
        $this->db->insert('kode_urut', $data);
        return date('y') . $kd;
    }

    function getKode()
    {
        return $this->db->query("SELECT * FROM kode_urut ORDER BY id desc limit 1")->row_array();
    }

    public function deleteKode()
    {
        return $this->db->query("DELETE FROM kode_urut ORDER BY id desc limit 1");
    }
}

// public function addKode1()
// {
//     date_default_timezone_set("ASIA/JAKARTA");

//     $tahun = date('Y');

//     $sql =  "SELECT MAX(MID(kode,1,4)) AS maxKodeUrut
//             FROM kode_urut
//             WHERE year(year)= '$tahun'";

//     $query = $this->db->query($sql);

//     if ($query->num_rows() > 0) {
//         $row = $query->row();
//         $n = ((int)$row->maxKodeUrut) + 1;
//         $no = sprintf("%'.04d", $n);
//     } else {
//         $no = "0001";
//     }
//     $kode = $no;

//     $data = array(
//         'kode' => $kode
//     );
//     $this->db->insert('kode_urut', $data);
// }

// public function deleteKode()
// {
//     return $this->db->query("DELETE FROM kode_urut ORDER BY id desc limit 1");
//     // $data = $this->db->query($query)->row_array();
//     // $kode = $data['maxKodeUrut'];

//     // $this->db->delete('kode_urut', array('kode' => $kode));
// }
