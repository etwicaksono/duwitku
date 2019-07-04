<?php
class M_user
{
    private $db;
    private $nama = 'Eko Teguh Wicaksono';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser()
    {
        return $this->nama;
    }

    public function getUserByEmail($email)
    {
        $this->db->query('SELECT * FROM user WHERE email=:email');
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function tambahDataUser($data)
    {
        $query = "INSERT INTO user
                    VALUES
                    ('',:username,:email,:password,'default.png'," . time() . ")
        ";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', password_hash($data['password1'], PASSWORD_DEFAULT));

        $this->db->execute();

        return $this->db->rowCount();
    }
}