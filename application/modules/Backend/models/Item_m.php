<?php
class Item_m extends CI_Model {
    function __construct(){
        parent::__construct();
    }
    var $table = 'items';
    var $select_column = array("id","item_name","item_code","sale_price","purchase_price","opening_quantity","total_quantity");
    var $column_search = array( "item_name","item_code","sale_price","opening_quantity","total_quantity"); //set column field database for datatable searchable
    var $order = array('item_name' => 'asc'); // default order
    private function _get_datatables_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        
        if ($this->session->userdata('role_id') == 2) {
            $this->db->where('company_id', $this->session->userdata['user_id']);
        } else if ($this->session->userdata('role_id') == 3) {
            $this->db->where('user_id', $this->session->userdata['user_id']);
        }
        $i = 0;
        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        // $this->db->where('status !=', 2);
        if(isset($_POST['sort'])) // here order processing
        {
            $this->db->order_by($_POST['sort']['field'], $_POST['sort']['sort']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}