<?php
class M_app
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getMenu()
    {
        $this->db->query('SELECT * FROM app_menu');
        return $this->db->resultSet();
    }

    public function getSubMenu($id)
    {
        $this->db->query('SELECT * FROM app_sub_menu WHERE id_menu=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
}