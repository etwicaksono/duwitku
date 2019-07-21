<?php
class M_admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function activateById($id)
    {
        $query = "UPDATE user
                SET is_active = 1
                WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deactivateById($id)
    {
        $query = "UPDATE user
                SET is_active = 0
                WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllUser()
    {
        $query = "SELECT * FROM user";
        $this->db->query($query);
        $this->db->execute();
        return $this->db->resultSet();
    }
}