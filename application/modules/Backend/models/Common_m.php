<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Common_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function get_common_count_record($common_table, $where)
    {
        if (!empty($where))
            $this->db->where($where);
        $this->db->from($common_table);
        return $this->db->count_all_results();
    }
    function insert_record($tbl_name, $data)
    {
        $this->db->insert($tbl_name, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function multiple_insert_batch($table_name, $data = array())
    {
        $insert = $this->db->insert_batch($table_name, $data);
        return $insert ? true : false;
    }
    function updateQty($table, $where, $column_name, $qty)
    {
        $this->db->set($column_name, $column_name . ' +' . $qty, FALSE);
        $this->db->where($where);
        $this->db->update($table);
    }
    function update_record($tbl_name, $data, $where)
    {
        $update = $this->db->update($tbl_name, $data, $where);
        return $update ? true : false;
    }

    function multiple_update_batch($table_name,$data,$where)
    {
        $update = $this->db->update_batch($table_name, $data, $where);
        return $update ? true : false;
    }

    //delete single record
    function delete_record_bulk($tbl, $where)
    {
        $this->db->where($where);
        $this->db->delete($tbl);
    }
    function delete_record($tbl, $where)
    {
        $this->db->where($where);
        $result = $this->db->delete($tbl);
        return $result ? true : false;
    }
    function exist_record($select, $tbl_name, $where = null, $data)
    {
        $this->db->select($select);
        $this->db->where($data);
        if (!empty($where))
            $this->db->where($where);
        $this->db->from($tbl_name);
        $query = $this->db->get();
        return $query;
    }
    public function get_common_master($common_table, $column_name, $where = Null, $order_by = Null)
    {
        $this->db->select($column_name);
        if (!empty($where))
            $this->db->where($where);
        if (!empty($order_by))
            $this->db->order_by($order_by);
        $query = $this->db->get($common_table);
        $query_result = $query->result();
        return $query_result;
    }

    function delete_subrecord($tbl_name, $id)
    {
        $this->db->where($id);
        $this->db->delete($tbl_name);
        // echo $this->db->last_query();
    }
    //single record
    public function edit_id($column_name, $tbl_name, $where)
    {
        $this->db->select($column_name);
        $this->db->from($tbl_name);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row();
    }
    
    function last_insert_id($tbl_name, $data)
    {
        $this->db->insert($tbl_name, $data);
        return $this->db->insert_id();
    }

    public function edit_multiple_id($column_name, $tbl_name, $where)
    {
        $this->db->select($column_name);
        $this->db->from($tbl_name);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
}
