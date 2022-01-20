<?php
class Sale_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function insert_record($tbl_name, $data)
    {
        $this->db->insert($tbl_name, $data);
        return $this->db->insert_id();
    }

    
}
