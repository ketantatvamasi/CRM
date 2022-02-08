<?php
class Sale_m extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    var $table = 'sale';
    var $select_column = array("sale.*", "cm.customer_name");
    var $column_search = array("customer_id", "total_quantity", "total_price", "total_gst_amount", "total_amount"); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order

    private function _get_datatables_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);
        $this->db->join('customers as cm', 'cm.id = sale.customer_id');

        // if ($this->session->userdata('role_id') == 2) {
        //     $this->db->join('customers as cm', 'cm.id = sale.customer_id');
        //     $this->db->where('sale.company_id', $this->session->userdata['user_id']);
        // } else if ($this->session->userdata('role_id') == 3) {
        //     $this->db->where('user_id', $this->session->userdata['user_id']);
        // }
        

        if ($this->session->userdata['user_id'] != 1) {
            if ($this->session->userdata['parent_id'] != 1) {
                $this->db->where('sale.user_id', $this->session->userdata['user_id']);
            } else {
                $this->db->where('sale.company_id', $this->session->userdata['company_id']);
            }
        }
        $i = 0;
        foreach ($this->column_search as $purchase) // loop column
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {
                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($purchase, $_POST['search']['value']);
                } else {
                    $this->db->or_like($purchase, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        // $this->db->where('status !=', 2);
        if (isset($_POST['sort'])) // here order processing
        {
            $this->db->order_by($_POST['sort']['field'], $_POST['sort']['sort']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
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

    public function getitem($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('items');
        return $query->row();
    }

    function getCustomers($postData)
    {

        $response = array();

        if (isset($postData['search'])) {
            // Select record
            // $key=$postData['search'];
            $company_id = $this->session->userdata['company_id'];
            $this->db->select('*');
            $this->db->where("status", 0);
            $this->db->where("customer_name like '" . $postData['search'] . "%' ");
            // $this->db->where("customer_name LIKE '$key%'");
            $this->db->where('company_id',$company_id);

            $records = $this->db->get('customers')->result();

            foreach ($records as $row) {
                $response[] = array("value" => $row->id, "label" => $row->customer_name);
            }
        }

        return $response;
    }
}
