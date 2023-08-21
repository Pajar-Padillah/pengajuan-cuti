<?php

class M_jenis_kelamin extends CI_Model
{

    public function get_all_jenis_kelamin()
    {
        $hasil = $this->db->query('SELECT * FROM jenis_kelamin');
        return $hasil;
    }

}