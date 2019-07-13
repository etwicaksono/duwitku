<?php
class M_app
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getMenuByRoleId($id)
    {
        $query = "SELECT user_access.menu_id AS id,
                (SELECT app_menu.menu FROM app_menu WHERE app_menu.id = user_access.menu_id) AS menu,
                (SELECT app_menu.icon FROM app_menu WHERE app_menu.id = user_access.menu_id) AS icon                
                FROM user_access
                WHERE ROLE_ID = :role_id";
        $this->db->query($query);
        $this->db->bind('role_id', $id);
        return $this->db->resultSet();
    }

    public function getSubMenu($id)
    {
        $this->db->query('SELECT * FROM app_sub_menu WHERE id_menu=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
}