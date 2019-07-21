<?php
class M_user
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function gantiPassword($pass)
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = "UPDATE user
                    SET
                    password=:password
                    WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('password', $pass);
        $this->db->bind('id', $_SESSION['user']['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getUserByEmail($email)
    {
        $this->db->query('SELECT * FROM user WHERE email=:email');
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM user WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function m_editUserProfile($data)
    {
        $query = "UPDATE user
                    SET
                    username=:username,
                    foto=:foto
                    WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('username', $data['nama']);
        $this->db->bind('foto', $data['gambar']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tambahDataUser($data)
    {
        $query = "INSERT INTO user
                    VALUES
                    ('',2,:username,:email,:password,'default.jpg'," . time() . ",1)
        ";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', password_hash($data['password1'], PASSWORD_DEFAULT));

        $this->db->execute();

        return $this->db->rowCount();
    }
}