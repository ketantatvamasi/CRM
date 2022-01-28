<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends BackendController
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Sale_m', 'sale_m');
  }

  public function index()
  {
    user_is_logged_in();
    $this->data['site_title'] = ucfirst('sale');
    $this->data['template_css'] = $this->load_grid_css('sale_purchase');   //wizard3
    $this->data['template_js'] = $this->load_grid_js('sale');
    $this->render_page($this->data['sitename_folder'] . 'sale_v', $this->data);
  }

  public function saleList()
  {
    $records = $this->sale_m->get_datatables();
    $data = array();
    $no = 0;
    foreach ($records as $record) {
      $no++;
      $data[] = array(
        "number" =>  $no,
        "id" => $record->id,
        "customer_name" => $record->customer_name,
        "total_quantity" => $record->total_quantity,
        "total_price" => $record->total_price,
        "total_gst_amount" => $record->total_gst_amount,
        "total_amount" => $record->total_amount
      );
    }
    $output = array(
      // "draw" => $_POST['draw'],
      "recordsTotal" => $this->sale_m->count_all(),
      "recordsFiltered" => $this->sale_m->count_filtered(),
      "data" => $data,
    );

    //output to json format
    echo json_encode($output);
  }

  public function addSale_Page()
  {
    user_is_logged_in();
    $this->data['site_title'] = ucfirst('Sale');
    $this->data['template_css'] = $this->load_grid_css('sale_purchase');   //wizard3
    $this->data['template_js'] = $this->load_grid_js('sale');
    $company_id = $this->session->userdata['company_id'];

    $this->data['customers'] = $this->common_m->get_common_master('customers', array('id', 'user_id', 'company_id', 'customer_name'), array("company_id" => $company_id), 'customer_name asc');
    $this->data['items'] = $this->common_m->get_common_master('items', array('id', 'user_id', 'company_id', 'item_code', 'item_name', 'total_quantity'), array("company_id" => $company_id, "status" => 0), 'item_name asc');

    $this->render_page($this->data['sitename_folder'] . 'saleForm_v', $this->data);
  }

  public function setItem()
  {
    if (!$this->input->is_ajax_request()) {
      $this->error();
      return false;
    }
    $id = $this->input->post('id');
    $record = $this->sale_m->getitem($id);
    echo json_encode($record);
  }

  public function addSale()
  {
    if (!$this->input->is_ajax_request()) {
      $this->error();
      return false;
    }
    $input = $this->input->post();

    $customer_detail = $this->common_m->getEmail(array('*'), 'customers', array('id' => $input['customer_id']));
    $to_email = $customer_detail->email;
    $customer_name = $customer_detail->customer_name;
    $Emaildata = '<!DOCTYPE html>
        <html>
        <head>
          <title></title>
          <style type="text/css" rel="stylesheet" media="all">
            body {
              width: 100% !important;
              height: 100%;
              margin: 0;
              -webkit-text-size-adjust: none;
            }
            td { word-break: break-word;}
            .preheader {
              display: none !important;
              visibility: hidden;
              mso-hide: all;
              font-size: 1px;
              line-height: 1px;
              max-height: 0;
              max-width: 0;
              opacity: 0;
              overflow: hidden;
            }
            h1 {
              margin-top: 0;
              color: #333333;
              font-size: 22px;
              font-weight: bold;
              text-align: left;
            }
            h2 {
              margin-top: 0;
              color: #333333;
              font-size: 16px;
              font-weight: bold;
              text-align: left;
            }
            h3 {
              margin-top: 0;
              color: #333333;
              font-size: 14px;
              font-weight: bold;
              text-align: left;
            }
            td, th { font-size: 16px;}
            /* Utilities ------------------------------ */
            .align-right { text-align: right;}
            .align-left { text-align: left;}
            .align-center { text-align: center;}
            /* Data table ------------------------------ */
            .purchase {
              width: 100%;
              margin: 0;
              padding: 35px 0;
              -premailer-width: 100%;
              -premailer-cellpadding: 0;
              -premailer-cellspacing: 0;
            }
            .purchase_content {
              width: 100%;
              margin: 0;
              padding: 25px 0 0 0;
              -premailer-width: 100%;
              -premailer-cellpadding: 0;
              -premailer-cellspacing: 0;
            }
            .purchase_item {
              padding: 10px 0;
              color: #51545E;
              font-size: 15px;
              line-height: 18px;
            }
            .purchase_heading {
              padding-bottom: 8px;
              border-bottom: 1px solid #EAEAEC;
            }
            .purchase_heading p {
              margin: 0;
              color: #85878E;
              font-size: 12px;
            }
            .purchase_footer {
              padding-top: 15px;
              border-top: 1px solid #EAEAEC;
            }
            .purchase_total {
              margin: 0;
              text-align: right;
              font-weight: bold;
              color: #333333;
            }
            .purchase_total--label {
              padding: 0 15px 0 0;
            }
            body {
              background-color: #F4F4F7;
              color: #51545E;
            }
            p {
              color: #51545E;
            }
            .email-wrapper {
              width: 100%;
              margin: 0;
              padding: 0;
              -premailer-width: 100%;
              -premailer-cellpadding: 0;
              -premailer-cellspacing: 0;
              background-color: #F4F4F7;
            }
            .email-content {
              width: 100%;
              margin: 0;
              padding: 0;
              -premailer-width: 100%;
              -premailer-cellpadding: 0;
              -premailer-cellspacing: 0;
            }
            /* Body ------------------------------ */
            .email-body {
              width: 100%;
              margin: 0;
              padding: 0;
              -premailer-width: 100%;
              -premailer-cellpadding: 0;
              -premailer-cellspacing: 0;
              background-color: #FFFFFF;
            }
            .email-body_inner {
              width: 570px;
              margin: 0 auto;
              padding: 0;
              -premailer-width: 570px;
              -premailer-cellpadding: 0;
              -premailer-cellspacing: 0;
              background-color: #FFFFFF;
            }
            .content-cell {
              padding: 35px;
            }
            /*Media Queries ------------------------------ */
            @media only screen and (max-width: 600px) {
              .email-body_inner {
                width: 100% !important;
              }
            }
            @media (prefers-color-scheme: dark) {
              body,.email-body,.email-body_inner,.email-content,.email-wrapper {
                background-color: #333333 !important;
                color: #FFF !important;
              }
              .purchase_item {
                color: #FFF !important;
              }
            }
          </style>
        </head>
        <body>
          <span class="preheader">This is bill for your purchase on ' . $input['bill_date'] . '.</span>
          <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
            <tr>
              <td align="center">
                <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                  <!-- Email Body -->
                  <tr>
                    <td class="email-body" width="100%" cellpadding="0" cellspacing="0">
                      <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0"
                        role="presentation">
                        <!-- Body content -->
                        <tr>
                          <td class="content-cell">
                            <div class="f-fallback">
                              <h1>Hi ' . ucfirst($customer_name) . ',</h1>
                              <p>Thanks for choosing us. This is an invoice for your recent purchase.</p>
                              <table class="purchase" width="100%" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td>
                                    <h3>Bill no :' . $input['customer_invoice_id'] . '</h3>
                                  </td>
                                  <td>
                                    <h3 class="align-right">' . $input['bill_date'] . '</h3>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">
                                    <table class="purchase_content" width="100%" cellpadding="0" cellspacing="0">
                                      <tr>
                                        <th class="purchase_heading" align="left">
                                          <p class="f-fallback">Description</p>
                                        </th>
                                        <th class="purchase_heading" align="right">
                                          <p class="f-fallback"></p>
                                        </th>
                                      </tr>
                                      <tr>
                                        <td width="80%" class="purchase_item"><span class="f-fallback">Total Qty : ' .
      $input['total_quantity'] . '</span>
                                        </td>
                                        <td class="align-right" width="20%" class="purchase_item"><span class="f-fallback">' .
      $input['total_price'] . '</span></td>
                                      </tr>
                                      <tr>
                                        <td width="80%" class="purchase_item"><span class="f-fallback">Total GST </span>
                                        </td>
                                        <td class="align-right" width="20%" class="purchase_item"><span class="f-fallback">' .
      $input['total_gst_amount'] . '</span></td>
                                      </tr>
                                      <tr>
                                        <td width="80%" class="purchase_footer" valign="middle">
                                          <p class="f-fallback purchase_total purchase_total--label">Total</p>
                                        </td>
                                        <td width="20%" class="purchase_footer" valign="middle">
                                          <p class="f-fallback purchase_total">' . $input['total_amount'] . '</p>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </table>
                              <p>If you have any questions about this invoice, simply reply to this email or reach out to our
                                for help.</p>
                              <p>Yours,
                                <br> The CRM
                              </p>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </body>
        </html>';

    $input1 = array(
      'id' => $input['id'],
      'total_quantity' => $input['total_quantity'],
      'total_price' => $input['total_price'],
      'cgst_price' => $input['total_price'],
      'sgst_price' => $input['cgst_price'],
      'igst_price' => $input['igst_price'],
      'total_gst_amount' => $input['total_gst_amount'],
      'total_amount' => $input['total_amount'],
      'customer_id' => $input['customer_id'],
      'customer_invoice_id' => $input['customer_invoice_id'],
      'bill_date' => $input['bill_date'],
      'company_id' => $this->session->userdata['company_id'],
      'user_id' => $this->session->userdata['user_id']
    );
    $input2 = $input['data'];
    if ($input['id'] == "") {
      $emailStatus =  $this->SendEmail($to_email, 'Your Order Details', $Emaildata);
      if ($emailStatus == false) {
        return $this->output
          ->set_content_type('application/json')
          ->set_status_header(410)
          ->set_output(json_encode("Network Error"));
      }
      $this->db->trans_begin();
      $sale_id = $this->common_m->last_insert_id('sale', $input1);
      foreach ($input2 as  $key => $value) {
        $input2[$key]['sale_id'] = $sale_id;
        $this->common_m->updateQty('items', array("id" => $input2[$key]['item_id']), 'total_quantity', 0 - $input2[$key]['quantity']);
      }

      $result = $this->common_m->multiple_insert_batch('sale_item', $input2);

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
      } else {
        $this->db->trans_commit();
      }
    } else {
      $this->db->trans_begin();
      $sale_item_list = $this->common_m->edit_multiple_id(array('*'), 'sale_item', array('sale_id' => $input1['id']));

      foreach ($sale_item_list as  $key => $value) {
        $this->common_m->updateQty('items', array("id" => $value->item_id), 'total_quantity', $value->quantity);
      }
      $this->common_m->delete_record('sale_item', array('sale_id' => $input1['id']));
      $this->common_m->update_record('sale', $input1, array('id' => $input1['id']));

      foreach ($input2 as  $key => $value) {
        $input2[$key]['sale_id'] = $input1['id'];
        $this->common_m->updateQty('items', array("id" => $input2[$key]['item_id']), 'total_quantity', 0 - $input2[$key]['quantity']);
      }
      $result = $this->common_m->multiple_insert_batch('sale_item', $input2);

      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
      } else {
        $this->db->trans_commit();
      }
    }
    $rsp['response'] = $result;
    echo json_encode($rsp);
  }

  public function editSale_Page()
  {
    user_is_logged_in();
    $this->data['site_title'] = ucfirst('Sale');
    $this->data['template_css'] = $this->load_grid_css('sale_purchase');
    $this->data['template_js'] = $this->load_grid_js('sale');
    $company_id = $this->session->userdata['company_id'];

    $this->data['customers'] = $this->common_m->get_common_master('customers', array('id', 'customer_name'), array("company_id" => $company_id), 'customer_name asc');
    $id = $this->uri->segment(4);
    $this->data['item_list'] = $this->common_m->get_common_master('items', array('*'), array("company_id" => $company_id), 'item_name asc');
    $this->data['sale_data'] = $this->common_m->get_common_master('sale', array('*'), array("id" => $id), null);
    $this->data['sale_item_data'] = $this->common_m->get_common_master('sale_item', array('*'), array("sale_id" => $id), null);

    $this->render_page($this->data['sitename_folder'] . 'saleEdit_v', $this->data);
  }

  public function deleteSale()
  {
    if (!$this->input->is_ajax_request()) {
      $this->error();
      return false;
    }
    $data = $this->input->post();
    $this->db->trans_begin();
    $sale_item_list = $this->common_m->edit_multiple_id(array('*'), 'sale_item', array('sale_id' => $data['id']));

    foreach ($sale_item_list as $value) {
      $this->common_m->updateQty('items', array("id" => $value->item_id), 'total_quantity', $value->quantity);
    }
    $result = $this->common_m->delete_record('sale', array('id' => $data['id']));
    $result = $this->common_m->delete_record('sale_item', array('sale_id' => $data['id']));

    if ($this->db->trans_status() === FALSE) {
      $this->db->trans_rollback();
    } else {
      $this->db->trans_commit();
    }
    $rsp['response'] = $result;
    echo json_encode($rsp);
  }

  // public function customerDetails(){
  //   $company_id = $this->session->userdata['company_id'];
  //   $data =$this->common_m->get_common_master('customers', array('id', 'user_id', 'company_id', 'customer_name'), array("company_id" => $company_id), 'customer_name asc');
  //   echo json_encode($data);
  // }
  public function customerList()
  {
    // POST data
    $postData = $this->input->post();
    // print_r($postData);
    // exit;
    // Get data
    $data = $this->sale_m->getCustomers($postData);

    echo json_encode($data);
  }
}
