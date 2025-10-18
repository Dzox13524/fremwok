<?php
class Pendaftar_model {
    private $table = 'pendaftar';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function tambahDataPendaftar($data) {
        $query = "INSERT INTO " . $this->table . " 
                    (nama, umur, jurusan, provinsi, kota, alamat, 
                     jenis_kelamin, foto, tanda_tangan, tanggal_daftar)
                  VALUES
                    (:nama, :umur, :jurusan, :provinsi, :kota, :alamat, 
                     :jenis_kelamin, :foto, :tanda_tangan, NOW())";
        
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('provinsi', $data['provinsi']);
        $this->db->bind('kota', $data['kota']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('tanda_tangan', $data['tanda_tangan']);

        $this->db->execute();
        return $this->db->rowCount();
    }
}