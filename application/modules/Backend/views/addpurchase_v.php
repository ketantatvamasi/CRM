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
                                            echo "<option value='" . $val->id . "'>" . $val->contact_person_name . "</option>";
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
                        <table id="app-purchse-table" class="table table-bordered" style="width: 100%;">
                            <thead class="thead-dark">
                                <tr style="text-align:center;">
                                    <th style="width: 30%;">Items name</th>
                                    <th>Qty</th>
                                    <th>Rate</th>
                                    <th>CGST (%) </th>
                                    <th> SGST (%)</th>
                                    <th> IGST (%)</th>
                                    <th>Amount</th>
                                    <th style="width: 11%;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="row_position">
                                <tr>
                                    <td>
                                        <select class="form-control" name="item_name[]" id="item_name1">
                                            <option value="">Select item name</option>
                                            <?php
                                            foreach ($load_data['record']['item_list'] as $val) {
                                                echo "<option value='" . $val->id . "'>" . $val->item_name . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="quantity[]" id="quantity1" placeholder="Qty" />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="rate[]" id="rate1" placeholder="Rate" />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="cgst_tax[]" id="cgst_tax1" placeholder="CGST" />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="sgst_tax[]" id="sgst_tax1" placeholder="SGST" />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="igst_tax[]" id="igst_tax1" placeholder="IGST" />
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="total_amount[]" id="total_amount1" placeholder="Amount" />
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
                            <table id="purchse-total-table" class="table table-bordered" style="width: 100%;">
                                <tr>
                                    <td style="width: 30%;"><b>Total</b></td>
                                    <td style="width: 9.5%;"><input type="number" class="form-control" name="quantity" id="quantity" placeholder="Qty" /></td>
                                    <td style="width: 9.5%;"></td>
                                    <td style="width: 29%;"><b>Total Amount before Tax: </b></td>
                                    <td><input type="number" class="form-control" name="amount" id="amount" /></td>
                                    <td style="width: 11%;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;"></td>
                                    <td style="width: 9.5%;"></td>
                                    <td style="width: 9.5%;"></td>
                                    <td colspan="3" style=" float:right;"><b>Add CGST:</b></td>
                                    <td><input type="number" class="form-control" name="cgst_taxs" id="cgst_taxs" placeholder="CGST" /></td>
                                    <td style="width: 11%;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;"></td>
                                    <td style="width: 9.5%;"></td>
                                    <td style="width: 9.5%;"></td>
                                    <td colspan="3" style=" float:right;"><b>Add SGST:</b></td>
                                    <td><input type="number" class="form-control" name="sgst_taxs" id="sgst_taxs" placeholder="SGST" /></td>
                                    <td style="width: 11%;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;"></td>
                                    <td style="width: 9.5%;"></td>
                                    <td style="width: 9.5%;"></td>
                                    <td colspan="3" style="float:right;"><b>Add IGST:</b></td>
                                    <td><input type="number" class="form-control" name="igst_taxs" id="igst_taxs" placeholder="IGSt" /></td>
                                    <td style="width: 11%;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;"></td>
                                    <td style="width: 9.5%;"></td>
                                    <td style="width: 9.5%;"></td>
                                    <td colspan="3" style="float:right;"><b>Round off</b></td>
                                    <td><input type="number" class="form-control" name="round_of" id="round_of" placeholder="Round" /></td>
                                    <td style="width: 11%;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 30%;"></td>
                                    <td style="width: 9.5%;"></td>
                                    <td style="width: 9.5%;"></td>
                                    <td colspan="3" style="float:right;"><b>Total Amount after Tax:</b></td>
                                    <td><input type="number" class="form-control" name="round_of" id="round_of" placeholder="Total" /></td>
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

<script src="<?= base_url() ?>assets/backend/plugins/global/plugins.bundle.js"></script>
<script>
    jQuery(document).ready(function() {

        $("#app-purchse-table").on("click", ".addItemfield", function() {
            addpurchse();
        });
        $("#app-purchse-table").on("click", "#deleteItemfield", function() {
            $(this).closest("tr").remove();
        });
        $('#reset_button').click(function() {
            document.getElementById("purchse_form").reset();
        });
        $('#purchase_form_submit_button').click(function() {
            alert("click");
        });
    });

    function addpurchse() {
        var i = 2;
        var data = "<tr>" +
            "<td><select class='form-control' name='item_name[]' id='item_name" + i + "'><option value=''>Select item name</option><?php foreach ($load_data['record']['item_list'] as $val) { ?><option value='<?php echo $val->id ?>'> <?php echo $val->item_name ?></option>;<?php } ?></select></td>" +
            "<td><input type='number' class='form-control' name='quantity[]' id='quantity" + i + "'  placeholder='Qty'/></td>" +
            "<td><input type='number' class='form-control' name='rate[]' id='rate" + i + "''  placeholder='Rate' /></td>" +
            "<td><input type='number' class='form-control' name='cgst_tax[]' id='cgst_tax" + i + "'  placeholder='CGST' /> </td>" +
            "<td> <input type='number' class='form-control' name='sgst_tax[]' id='sgst_tax" + i + "'  placeholder='SGST' /></td> " +
            "<td> <input type='number' class='form-control' name='igst_tax[]' id='igst_tax" + i + "'  placeholder='IGST' /> </td>" +
            "<td><input type='number' class='form-control' name='total_amount[]' id='total_amount" + i + "'  placeholder='Amount' /> </td>" +
            "<td><div class='row'><div class='col-4'><a href='javascript:;' id='addItemfield' class='btn btn-sm font-weight-bolder btn-light-primary addItemfield'><i class='la la-plus'></i></a></div>" +
            "<div class='col-4'><a href='javascript:;' id='deleteItemfield' class='btn btn-sm font-weight-bolder btn-light-danger'><i class='la la-trash-o'></i></a></div></div></td>" +
            "+</tr>";
        $('#app-purchse-table').append(data);
        i++;

    }
</script>