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
        // return $this->db->count_all($common_table);
    }
    function insert_record($tbl_name, $data)
    {
        $this->db->insert($tbl_name, $data);
        // return $this->db->insert_id();
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function muliple_insert_batch($table_name, $data = array())
    {
        $insert = $this->db->insert_batch($table_name, $data);
        //echo $this->db->last_query();
        return $insert ? true : false;
    }
    function update_record($tbl_name, $data, $where)
    {
        $update = $this->db->update($tbl_name, $data, $where);
        // print_r($this->db->last_query());
        // exit;
        return $update ? true : false;
        // if ($this->db->affected_rows() > 0) {
        //     return true;
        // } else {
        //     return false;
        // }
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
        $this->db->delete($tbl);
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
    public function get_subrecord_id($tbl, $id)
    {
        $this->db->select('GROUP_CONCAT(category_id SEPARATOR ",") AS category_id');
        $this->db->from($tbl);
        $this->db->where('product_id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    // public function get_subrecord_id($tbl,$id)
    // {
    //      $this->db->select('GROUP_CONCAT(category_id SEPARATOR ",") AS category_id');
    //      $this->db->from($tbl);
    //      $this->db->where('event_id',$id);
    //      $query = $this->db->get();
    //      return $query->row();
    // }
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
    public function get_comments($id)
    {
        $this->db->select('tbl_event_comments.*,tbl_user.name');
        $this->db->from('tbl_event_comments');
        $this->db->join('tbl_user', 'tbl_event_comments.user_id = tbl_user.id');
        $this->db->where('tbl_event_comments.event_id', $id);
        $this->db->order_by("tbl_event_comments.id", "desc");
        $query = $this->db->get();
        return  $query_result = $query->result();
    }
}
?>