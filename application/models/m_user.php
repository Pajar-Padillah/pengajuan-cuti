<?php

class M_user extends CI_Model
{

    public function get_all_pegawai()
    {
        $hasil = $this->db->query('SELECT * FROM user JOIN user_detail ON user.id_user = user_detail.id_user
        WHERE id_user_level = 1 ORDER BY user.username ASC');
        return $hasil;
    }

    public function get_all_kepalakantor()
    {
        $hasil = $this->db->query('SELECT * FROM user JOIN user_detail ON user.id_user = user_detail.id_user 
        WHERE id_user_level = 4 ORDER BY user.username ASC');
        return $hasil;
    }

    public function count_all_pegawai()
    {
        $hasil = $this->db->query('SELECT COUNT(user.id_user) as total_user FROM user JOIN user_detail ON user.id_user = user_detail.id_user 
        WHERE id_user_level = 1');
        return $hasil;
    }

    public function count_all_admin()
    {
        $hasil = $this->db->query('SELECT COUNT(id_user) as total_user FROM user
        WHERE id_user_level = 2');
        return $hasil;
    }

    public function count_all_kepalakantor()
    {
        $hasil = $this->db->query('SELECT COUNT(id_user) as total_user FROM user
        WHERE id_user_level = 4');
        return $hasil;
    }

    public function get_all_admin()
    {
        $hasil = $this->db->query('SELECT * FROM user
             WHERE id_user_level = 2 or id_user_level = 3 ');
        return $hasil;
    }

    public function get_level()
    {
        $hasil = $this->db->query('SELECT * FROM user_level');
        return $hasil;
    }

    public function get_pegawai_by_id($id_user)
    {
        $hasil = $this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user = user_detail.id_user 
        WHERE user.id_user='$id_user'");
        return $hasil;
    }

    public function cek_login($username)
    {

        $hasil = $this->db->query("SELECT * FROM user JOIN user_detail ON user.id_user= user_detail.id_user WHERE username='$username'");
        return $hasil;
    }

    function check_db($username)
    {
        $this->db->join('user_detail ud', 'u.id_user = ud.id_user');
        $this->db->where(array('username' => $username));
        return $this->db->get('user u');
    }

    public function pendaftaran_user($nip, $username, $email, $password, $id_user_level)
    {
        $this->db->trans_start();

        $this->db->query("INSERT INTO user(nip,username,password,email,id_user_level) VALUES ('$nip','$username','$password','$email','$id_user_level')");
        // $this->db->query("INSERT INTO user_detail(id_user) VALUES ('$id')");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function pendaftaran_admin($username, $email, $password, $id_user_level)
    {
        $this->db->trans_start();

        $this->db->query("INSERT INTO user(username,password,email,id_user_level) VALUES ('$username','$password','$email','$id_user_level')");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function update_user_detail($id, $nama_lengkap, $jenis_kelamin, $no_telp, $alamat, $pangkat, $jabatan)
    {
        $this->db->trans_start();


        $this->db->query("UPDATE user_detail SET nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin' ,no_telp='$no_telp', alamat='$alamat', pangkat='$pangkat', jabatan='$jabatan' WHERE id_user='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function insert_pegawai($username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat)
    {
        $this->db->trans_start();

        $this->db->query("INSERT INTO user(username,password,email,id_user_level) VALUES ('$username','$password','$email','$id_user_level')");
        // $this->db->query("INSERT INTO user_detail(id_user, nama_lengkap, jenis_kelamin, no_telp, alamat) VALUES ('$id','$nama_lengkap','$id_jenis_kelamin','$no_telp','$alamat')");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function update_pegawai($id, $nip, $username, $email, $password, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $alamat, $pangkat, $jabatan)
    {
        $this->db->trans_start();

        $this->db->query("UPDATE user SET nip='$nip', username='$username', password='$password', email='$email', id_user_level='$id_user_level' WHERE id_user='$id'");
        $this->db->query("UPDATE user_detail SET nama_lengkap='$nama_lengkap', jenis_kelamin='$id_jenis_kelamin', no_telp='$no_telp', alamat='$alamat', pangkat='$pangkat', jabatan='$jabatan' WHERE id_user='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function delete_pegawai($id)
    {
        $this->db->trans_start();

        $this->db->query("DELETE FROM user WHERE id_user='$id'");
        $this->db->query("DELETE FROM user_detail WHERE id_user='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function update_admin($id, $username, $email, $id_user_level)
    {
        $this->db->trans_start();

        $this->db->query("UPDATE user SET username='$username', email='$email', id_user_level='$id_user_level' WHERE id_user='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function update_user($id, $username, $password)
    {
        $this->db->trans_start();

        $this->db->query("UPDATE user SET username='$username', password='$password' WHERE id_user='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }


    public function delete_admin($id)
    {
        $this->db->trans_start();

        $this->db->query("DELETE FROM user WHERE id_user='$id'");
        $this->db->query("DELETE FROM user_detail WHERE id_user='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function insert_kepalakantor($nip, $username, $email, $password, $id_user_level, $nama_lengkap, $jenis_kelamin, $no_telp, $pangkat, $jabatan, $alamat)
    {
        $this->db->trans_start();

        $this->db->query("INSERT INTO user(nip,username,password,email,id_user_level) VALUES ('$nip','$username','$password','$email','$id_user_level')");

        $data = $this->db->query("select id_user from `user` where username='$username' order by id_user desc limit 1")->row();
        // $id = $data['id_user'];

        $this->db->query("UPDATE user_detail set nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', no_telp = '$no_telp', pangkat='$pangkat', jabatan='$jabatan', alamat='$alamat' where id_user='" . $data->id_user . "'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function update_kepalakantor($id, $username, $email, $id_user_level, $nama_lengkap, $id_jenis_kelamin, $no_telp, $nip, $pangkat, $jabatan, $alamat)
    {
        $this->db->trans_start();

        $this->db->query("UPDATE user SET username='$username', email='$email', nip='$nip', id_user_level='$id_user_level' WHERE id_user='$id'");
        $this->db->query("UPDATE user_detail SET nama_lengkap='$nama_lengkap', jenis_kelamin='$id_jenis_kelamin' ,no_telp='$no_telp', pangkat='$pangkat',jabatan='$jabatan', alamat='$alamat' WHERE id_user='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }

    public function delete_kepalakantor($id)
    {
        $this->db->trans_start();

        $this->db->query("DELETE FROM user WHERE id_user='$id'");
        $this->db->query("DELETE FROM user_detail WHERE id_user='$id'");

        $this->db->trans_complete();
        if ($this->db->trans_status() == true)
            return true;
        else
            return false;
    }
}
