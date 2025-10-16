<?php

class UserModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }
    public function findByUsername($username) {
        try {
            $query = "SELECT id, username, email, created_at FROM users WHERE username = ?";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$username]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function findAll() {
        try {
            $query = "SELECT id, username, email, created_at FROM users ORDER BY created_at DESC";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            
            return $stmt->fetchAll();

        } catch (PDOException $e) {
            return [];
        }
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
}
    