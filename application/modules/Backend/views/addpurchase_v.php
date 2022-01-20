<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Purchase-->
            <div class="card card-custom ">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span id="purchase_dynamic_title"> Add <?= ucfirst($load_data['site_title']) ?></span>
                            <span class="d-block text-muted pt-2 font-size-sm" id="purchase_dynamic_subtitle_span">More purchases More business!</span>
                        </h3>
                    </div>

                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="<?= base_url('backend/purchase/purchaseList') ?>" class="btn btn-primary font-weight-bolder " id="add_purchase_button">
                            <i class="far fa-user"></i> <?= ucfirst($load_data['site_title']) ?> List
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <form class="form" id="purchse_form">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Vendor Name</label><span class="text-danger">*</span>
                                    <select class="form-control" name="vendor_id" id="vendor_id">
                                        <option value="">Select vendor name</option>
                                        <?php
                                        foreach ($load_data['record']['vendor_list'] as $val) {
                                            echo "<option value='" . $val->id . "'>" . $val->contact_person_name . "  (". $val->company_name.")"."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Purchase date</label><span class="text-danger">*</span>
                                    <input type="date" class="form-control" name="purchse_date" id="purchse_date" placeholder="Enter invoice number" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Invoice number</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="vendor_invoice_no" id="vendor_invoice_no" placeholder="Enter invoice number" />
                                </div>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-8"></div>
                        <table id="app-purchse-table" class="table table-bordered table-responsive" style="width: 100%;">
                            <thead class="thead-dark">
                                <tr style="text-align:center;">
                                    <th style="width: 30%;">Items name</th>
                                    <th>Qty</th>
                                    <th>Rate</th>
                                    <th>CGST (%) </th>
                                    <th>SGST (%)</th>
                                    <th>IGST (%)</th>
                                    <th>Amount</th>
                                    <th style="width: 11%;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="row_position">
                                <tr>
                                    <td>
                                        <select class="form-control item_row" name="data[1][item_id]" id="item_id_1">
                                            <option value="">Select item</option>
                                            <?php
                                            foreach ($load_data['record']['item_list'] as $val) {
                                                echo "<option value='" . $val->id . "'>" . $val->item_name . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control quantity" name="data[1][quantity]" id="quantity_1" placeholder="Qty" />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control Rate" name="data[1][rate]" id="rate_1" placeholder="Rate" readonly />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control cgst_tax" name="data[1][cgst_tax]" id="cgst_tax_1" placeholder="CGST" readonly />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control sgst_tax" name="data[1][sgst_tax]" id="sgst_tax_1" placeholder="SGST" readonly />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control igst_tax" name="data[1][igst_tax]" id="igst_tax_1" placeholder="IGST" readonly />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control total_amount" name="data[1][total_amount]" id="total_amount_1" placeholder="Amount" readonly />
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="javascript:;" id="addItemfield" class="btn btn-sm font-weight-bolder btn-light-primary addItemfield">
                                                    <i class="la la-plus"></i>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="javascript:;" id="deleteItemfield" class="btn btn-sm font-weight-bolder btn-light-danger deleteItemfield">
                                                    <i class="la la-trash-o"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table id="purchse-total-table" style="width: 100%;">
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 29%; margin-top: 10px;"><b>Total Quantity: </b></td>
                                <td><input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 29%; margin-top: 10px;"><b>Total Amount before Tax: </b></td>
                                <td><input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Add CGST:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="cgst_taxs" id="cgst_taxs" placeholder="CGST" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Add SGST:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="sgst_taxs" id="sgst_taxs" placeholder="SGST" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Add IGST:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="igst_taxs" id="igst_taxs" placeholder="IGSt" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Round off:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="round_of" id="round_of" placeholder="Round" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Total Amount after Tax:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="total" id="total" placeholder="Total" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                        </table>
                    </form>
                    <div class="separator separator-dashed my-8"></div>

                    <div style="float:right;">
                        <input type="reset" id="reset_button" class="btn font-weight-bolder btn-light-primary" data-wizard-type="action-next" />
                        <button type="button" id="purchase_form_submit_button" class="btn font-weight-bolder btn-light-success" data-wizard-type="action-submit">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
            <!--end::Purchase-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
