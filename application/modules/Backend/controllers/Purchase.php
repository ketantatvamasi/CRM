<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends BackendController
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Purchase_m', 'purchase_m');
  }

  public function index()
  {
    user_is_logged_in();
    $this->data['site_title'] = ucfirst('Purchase');
    $this->data['template_css'] = $this->load_grid_css('sale_purchase');   //wizard3
    $this->data['template_js'] = $this->load_grid_js('purchase');
    $this->render_page($this->data['sitename_folder'] . 'purchase_v', $this->data);
  }

  public function purchaseList()
  {

    $records = $this->purchase_m->get_datatables();
    $data = array();
    $no = 0;
    foreach ($records as $record) {
      $no++;
      $data[] = array(
        "number" =>  $no,
        "id" => $record->id,
        // "item_name" => $record->item_name,
        // "item_code" => $record->item_code,
        "vendor_name" => $record->vendor_name,
        "total_quantity" => $record->total_quantity,
        "total_price" => $record->total_price,
        "total_gst_amount" => $record->total_gst_amount,
        "total_amount" => $record->total_amount
      );
    }
    $output = array(
      // "draw" => $_POST['draw'],
      "recordsTotal" => $this->purchase_m->count_all(),
      "recordsFiltered" => $this->purchase_m->count_filtered(),
      "data" => $data,
    );

    //output to json format
    echo json_encode($output);
  }
  public function addpurchase_page()
  {
    $session = $this->session->userdata['company_id'];
    user_is_logged_in();
    $this->data['site_title'] = ucfirst('Purchase');
    $this->data['template_css'] = $this->load_grid_css('sale_purchase');   //wizard3
    $this->data['template_js'] = $this->load_grid_js('purchase');
    $this->data['record']['vendor_list'] = $this->common_m->get_common_master('vendors', array("id", "contact_person_name", "company_name"), array("company_id" => $session), "contact_person_name ASC");
    $this->data['record']['item_list'] = $this->common_m->get_common_master('items', array("id", "item_name"), array("company_id" => $session), "item_name ASC");
    $this->render_page($this->data['sitename_folder'] . 'addpurchase_v', $this->data);
  }

  public function editpurchase()
  {
    user_is_logged_in();
    $this->data['site_title'] = ucfirst('purchase');
    $this->data['template_css'] = $this->load_grid_css('sale_purchase');
    $this->data['template_js'] = $this->load_grid_js('purchase');
    $company_id = $this->session->userdata['company_id'];
    $this->data['vendors'] = $this->common_m->get_common_master('vendors', array('id', 'user_id', 'company_id', 'company_name', 'contact_person_name'), array("company_id" => $company_id), 'contact_person_name asc');
    $id = $this->uri->segment(4);
    $this->data['item_list'] = $this->common_m->get_common_master('items', array('*'), array("company_id" => $company_id), 'item_name asc');
    $this->data['purchase_data'] = $this->common_m->get_common_master('purchase', array('*'), array("id" => $id), null);
    $this->data['purchase_item_data'] = $this->common_m->get_common_master('purchase_item', array('*'), array("purchase_id" => $id), null);
    $this->render_page($this->data['sitename_folder'] . 'purchaseEdit_v', $this->data);
  }
  public function setitem()
  {
    if (!$this->input->is_ajax_request()) {
      $this->error();
      return false;
    }
    $id = $this->input->post('id');
    $record = $this->purchase_m->getitem($id);
    echo json_encode($record);
  }
  public function addpurchse()
  {
    if (!$this->input->is_ajax_request()) {
      $this->error();
      return false;
    }

    $input = $this->input->post();
    $total_gst = $input['cgst_taxs'] + $input['sgst_taxs'] + $input['igst_taxs'];

    $vendor_detail = $this->common_m->getEmail(array('*'), 'vendors', array('id' => $input['vendor_id']));
    $to_email = $vendor_detail->email;
    $vendor_name = $vendor_detail->contact_person_name;
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
              <span class="preheader">This is an invoice for your purchase on ' . $input['purchse_date'] . '.</span>
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
                                  <h1>Hi ' . ucfirst($vendor_name) . ',</h1>
                                  <p>This order is generated...</p>
                                  <table class="purchase" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td>
                                        <h3>Bill no :' . $input['vendor_invoice_no'] . '</h3>
                                      </td>
                                      <td>
                                        <h3 class="align-right">' . $input['purchse_date'] . '</h3>
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
                                            <td width="80%" class="purchase_item"><span class="f-fallback">Total Qty : ' . $input['qty'] . '</span>
                                            </td>
                                            <td class="align-right" width="20%" class="purchase_item"><span
                                                class="f-fallback">' . $input['amount'] . '</span></td>
                                          </tr>
                                          <tr>
                                            <td width="80%" class="purchase_item"><span class="f-fallback">Total GST </span>
                                            </td>
                                            <td class="align-right" width="20%" class="purchase_item"><span
                                                class="f-fallback">' . $total_gst . '</span></td>
                                          </tr>
                                          <tr>
                                            <td width="80%" class="purchase_footer" valign="middle">
                                              <p class="f-fallback purchase_total purchase_total--label">Total</p>
                                            </td>
                                            <td width="20%" class="purchase_footer" valign="middle">
                                              <p class="f-fallback purchase_total">' . $input['total'] . '</p>
                                            </td>
                                          </tr>
                                        </table>
                                      </td>
                                    </tr>
                                  </table>
                                  <p>If you have any questions about this invoice, simply reply to this email or reach out to our for help.</p>
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

    $data = array(
      "id" => $input['id'],
      "vendor_id" => $input['vendor_id'],
      "company_id" => $this->session->userdata['company_id'],
      "user_id" => $this->session->userdata['user_id'],
      "purchse_date" => $input['purchse_date'],
      "vendor_invoice_no" => $input['vendor_invoice_no'],
      "total_quantity" => $input['qty'],
      "total_price" => $input['amount'],
      "cgst_price" => $input['cgst_taxs'],
      "sgst_price" => $input['sgst_taxs'],
      "igst_price" => $input['igst_taxs'],
      "total_amount" => $input['total'],
      "total_gst_amount" => $total_gst
    );

    $data2 = $input['data'];
    if ($data['id'] == "") {
      $emailStatus = $this->SendEmail($to_email, 'Purchase order request', $Emaildata);
      if ($emailStatus == false) {
        return $this->output
          ->set_content_type('application/json')
          ->set_status_header(410)
          ->set_output(json_encode("Network Error"));
      }
      $this->db->trans_begin();
      $purchase_id = $this->common_m->last_insert_id('purchase', $data);
      foreach ($data2 as  $key => $value) {
        $data2[$key]['purchase_id'] = $purchase_id;
        $this->common_m->updateQty('items', array("id" => $data2[$key]['item_id']), 'total_quantity', $data2[$key]['quantity']);
      }

      $result = $this->common_m->multiple_insert_batch('purchase_item', $data2);
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
      } else {
        $this->db->trans_commit();
      }
    } else {
      $this->db->trans_begin();
      $result = $this->common_m->edit_multiple_id(array('*'), 'purchase_item', array('purchase_id' => $data['id']));
      foreach ($result as  $key => $value) {
        $this->common_m->updateQty('items', array("id" => $value->item_id), 'total_quantity', 0 - $value->quantity);
      }
      $this->common_m->delete_record('purchase_item', array('purchase_id' => $data['id']));
      $this->common_m->update_record('purchase', $data, array('id' => $data['id']));
      foreach ($data2 as  $key => $value) {
        $data2[$key]['purchase_id'] = $data['id'];
        $this->common_m->updateQty('items', array("id" => $data2[$key]['item_id']), 'total_quantity',  $data2[$key]['quantity']);
      }
      $result = $this->common_m->multiple_insert_batch('purchase_item', $data2);
      if ($this->db->trans_status() === FALSE) {
        $this->db->trans_rollback();
      } else {
        $this->db->trans_commit();
      }
    }

    $rsp['response'] = $result;
    echo json_encode($rsp);
  }
  public function deletePurchase()
  {
    if (!$this->input->is_ajax_request()) {
      $this->error();
      return false;
    }
    $data = $this->input->post();
    $result = $this->common_m->edit_multiple_id(array('*'), 'purchase_item', array('purchase_id' => $data['id']));
    foreach ($result as $value) {
      $this->common_m->updateQty('items', array("id" => $value->item_id), 'total_quantity', 0 - $value->quantity);
    }
    $result = $this->common_m->delete_record('purchase', array('id' => $data['id']));
    $result = $this->common_m->delete_record('purchase_item', array('purchase_id' => $data['id']));
    $rsp['response'] = $result;
    echo json_encode($rsp);
  }

  public function vendorList()
  {
    // POST data
    $postData = $this->input->post();
    // print_r($postData);
    // exit;
    // Get data
    $data = $this->purchase_m->getVendors($postData);

    echo json_encode($data);
  }
 
}
