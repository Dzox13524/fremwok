<?php

class PendaftaranModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }
    public function create($data) {
        try {
            $query = "INSERT INTO pendaftaran 
                        (nama_lengkap, umur, jurusan, provinsi, kota, alamat, jenis_kelamin, foto_path, signature_path) 
                      VALUES 
                        (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->db->prepare($query);
            
            return $stmt->execute([
                $data['nama'],
                $data['umur'],
                $data['jurusan'],
                $data['provinsi'],
                $data['kota'],
                $data['alamat'],
                $data['jenisKelamin'],
                $data['foto_path'],
                $data['signature_path']
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function findAll() {
        try {
            $query = "SELECT * FROM pendaftaran ORDER BY created_at DESC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

}