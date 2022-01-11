<?php
class Login_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function login($where)
    {
        $this->db->select("*");
        $this->db->where($where);
        $this->db->from('users');
        $query = $this->db->get();
        return $query;
    }
}
