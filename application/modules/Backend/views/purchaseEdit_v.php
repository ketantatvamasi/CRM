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
                            <span id="purchase_dynamic_title">Edit <?= ucfirst($load_data['site_title']) ?></span>
                            <span class="d-block text-muted pt-2 font-size-sm" id="purchase_dynamic_subtitle_span">More purchases More business!</span>
                        </h3>
                    </div>

                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="<?= base_url('backend/purchase/purchaseList') ?>" class="btn btn-primary font-weight-bolder " id="add_purchase_button">
                            <i class="far fa-user"></i> Purchase List
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <form class="form" id="purchase_form">
                        <input type="hidden" name="id" id="id" value="<?= $load_data['purchase_data'][0]->id?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Vendor Name</label><span class="text-danger">*</span>
                                    <select class="form-control" name="vendor_id" id="edit_vendor_id">
                                        <option value="">Select vendor name</option>

                                        <?php if (!($load_data['vendors'] == '')) { ?>
                                            <?php foreach ($load_data['vendors'] as $value) : $selected = ($value->id == $load_data['purchase_data'][0]->vendor_id) ? 'selected' : ''; ?>
                                                <?php echo "<option value='" . $value->id . "' $selected>" . $value->contact_person_name . "  (" . $value->company_name . ")" . "</option>"; ?>
                                        <?php endforeach;
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Purchase date</label><span class="text-danger">*</span>
                                    <input type="date" class="form-control" name="purchse_date" id="purchse_date" placeholder="Enter invoice number" value="<?= $load_data['purchase_data'][0]->purchse_date; ?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Invoice number</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="vendor_invoice_no" id="vendor_invoice_no" placeholder="Enter invoice number" value="<?= $load_data['purchase_data'][0]->vendor_invoice_no;?>"/>
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

                                <?php
                                $count = 0;
                                foreach ($load_data['purchase_item_data'] as $invoiceItems) {
                                //    print_r($invoiceItems->item_id);
                                    $count++;
                                ?>
                                    <tr>
                                        <td><select class="form-control item_row" name="data[<?= $count; ?>][item_id]" id="item_id_<?= $count; ?>" autocomplete="off">\
                                                <option value="">Select Item</option>;
                                                <?php if (!($load_data['item_list'] == '')) { ?>
                                                    <?php foreach ($load_data['item_list'] as $value) : $selected = ($value->id == $invoiceItems->item_id) ? 'selected' : ''; ?>
                                                        <?php echo "<option value='" . $value->id . "' $selected>" . $value->item_name . " </option>" ?>
                                                <?php endforeach;
                                                } ?>
                                            </select></td> 
                                        <td><input type="number" name="data[<?= $count; ?>][quantity]" id="quantity_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->quantity; ?>" placeholder="Qty" autocomplete="off"></td>
                                        <td><input type="number" name="data[<?= $count; ?>][rate]" id="rate_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->rate; ?>" placeholder="Rate" autocomplete="off" readonly></td>
                                        <td><input type="number" name="data[<?= $count; ?>][cgst_tax]" id="cgst_tax_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->cgst_tax;?>" placeholder="CGST" autocomplete="off" readonly></td>
                                        <td><input type="number" name="data[<?= $count; ?>][sgst_tax]" id="sgst_tax_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->sgst_tax;?>" placeholder="SGST" autocomplete="off" readonly></td>
                                        <td><input type="number" name="data[<?= $count; ?>][igst_tax]" id="igst_tax_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->igst_tax; ?>" placeholder="IGST" autocomplete="off" readonly></td>
                                        <td><input type="number" name="data[<?= $count; ?>][total_amount]" id="total_amount_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->total_amount; ?>" placeholder="Amount" autocomplete="off" readonly></td>
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
                                <?php
                                } ?>
                            </tbody>
                        </table>
                        <table id="purchse-total-table" style="width: 100%;">
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 29%; margin-top: 10px;"><b>Total Quantity: </b></td>
                                <td><input type="number" class="form-control" name="qty" id="qty" placeholder="Qty"value="<?= $load_data['purchase_data'][0]->total_quantity;?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 29%; margin-top: 10px;"><b>Total Amount before Tax: </b></td>
                                <td><input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?= $load_data['purchase_data'][0]->total_price;?>" readonly/></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Add CGST:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="cgst_taxs" id="cgst_taxs" placeholder="CGST" value="<?= $load_data['purchase_data'][0]->cgst_price;?>" readonly/></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Add SGST:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="sgst_taxs" id="sgst_taxs" placeholder="SGST" value="<?= $load_data['purchase_data'][0]->sgst_price;?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Add IGST:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="igst_taxs" id="igst_taxs" placeholder="IGSt" value="<?= $load_data['purchase_data'][0]->igst_price;?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Round off:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="round_of" id="round_of" placeholder="Round" value="<?= $load_data['purchase_data'][0]->round_of;?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Total Amount after Tax:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="total" id="total" placeholder="Total" value="<?= $load_data['purchase_data'][0]->total_amount;?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                        </table>
                    </form>
                    <div class="separator separator-dashed my-8"></div>

                    <div style="float:right;">
                        <input type="reset" id="reset_button" class="btn font-weight-bolder btn-light-primary" data-wizard-type="action-next" />
                        <button type="submit" id="purchase_form_submit_button" class="btn font-weight-bolder btn-light-success" form="purchase_form">
                        Submit</button>
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





