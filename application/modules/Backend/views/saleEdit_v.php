<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">

            <!--begin::Sell-->
            <div class="card card-custom ">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span id="purchase_dynamic_title">Edit <?= ucfirst($load_data['site_title']) ?> </span>
                            <span class="d-block text-muted pt-2 font-size-sm" id="purchase_dynamic_subtitle_span">Sale More earn More..</span>
                        </h3>
                    </div>

                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="<?= base_url('backend/sale'); ?>">
                            <button type="button" class="btn btn-primary font-weight-bolder">
                                <i class="ki ki-long-arrow-back"></i> Back
                            </button>
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body">
                    <!--begin: Form-->
                    <div class="card card-custom ">

                        <form class="form" id="sale_form" action="#">

                            <input type="hidden" name="id" id="id" value="<?= $load_data['sale_data'][0]->id; ?>">
                            <input type="hidden" name="total_quantity" id="total_quantity" value="<?= $load_data['sale_data'][0]->total_quantity; ?>">
                            <input type="hidden" name="total_price" id="total_price" value="<?= $load_data['sale_data'][0]->total_price; ?>">
                            <input type="hidden" name="cgst_price" id="cgst_price" value="<?= $load_data['sale_data'][0]->cgst_price; ?>">
                            <input type="hidden" name="sgst_price" id="sgst_price" value="<?= $load_data['sale_data'][0]->sgst_price; ?>">
                            <input type="hidden" name="igst_price" id="igst_price" value="<?= $load_data['sale_data'][0]->igst_price; ?>">
                            <input type="hidden" name="total_gst_amount" id="total_gst_amount" value="<?= $load_data['sale_data'][0]->total_gst_amount; ?>">
                            <!-- <input type="hidden" name="round_of" id="round_of"> -->
                            <input type="hidden" name="total_amount" id="total_amount" value="<?= $load_data['sale_data'][0]->total_amount; ?>">

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="customer">Customer <span class="text-danger">*</span></label>
                                        <select class="form-control" name="customer_id" id="edit_customer_id" data-fv-not-empty="true" data-fv-not-empty___message="Customer is required">
                                            <option value="">Select Customer</option>

                                            <?php if (!($load_data['customers'] == '')) { ?>
                                                <?php foreach ($load_data['customers'] as $value) : $selected = ($value->id == $load_data['sale_data'][0]->customer_id) ? 'selected' : ''; ?>
                                                    <?php echo "<option value='" . $value->id . "' $selected>" . $value->customer_name . " </option>" ?>
                                            <?php endforeach;
                                            } ?>

                                        </select>

                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Bill no. <span class="text-danger">*</span></label>
                                        <input type="number" data-fv-not-empty="true" data-fv-not-empty___message="The Bill no is required" class="form-control" name="customer_invoice_id" id="customer_invoice_id" placeholder="Invoice Number" value="<?= $load_data['sale_data'][0]->customer_invoice_id; ?>" />
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Bill Date <span class="text-danger">*</span></label>
                                        <input type="date" data-fv-not-empty="true" data-fv-not-empty___message="Bill date is required" class="form-control" name="bill_date" id="bill_date" value="<?= $load_data['sale_data'][0]->bill_date; ?>" />
                                    </div>
                                </div>

                            </div>
                            <!-- <//?php print_r($load_data['sale_item_data']);?> -->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <table class="table table-separate table-head-custom table-checkable table-responsive" id="invoiceItem">
                                        <thead>
                                            <tr>
                                                <th width="2px"><input id="checkAll" class="formcontrol" type="checkbox"></th>
                                                <th width="300px">Item</th>
                                                <!-- <th width="38%">Item Name</th> -->
                                                <th width="100px">Qty.</th>
                                                <th width="120px">Price</th>
                                                <th width="150px">Total</th>
                                                <th width="100px">SGST%</th>
                                                <th width="100px">CGST%</th>
                                                <th width="100px">IGST%</th>

                                                <th width="180px">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 0;

                                            foreach ($load_data['sale_item_data'] as $invoiceItems) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><input class="itemRow" type="checkbox"></td>
                                                    <td>
                                                        <div class="form-group">
                                                            <select class="form-control" name="data[<?= $count; ?>][item_id]" id="productId_<?= $count; ?>" autocomplete="off" data-fv-not-empty="true" data-fv-not-empty___message="Select Item">
                                                                <option value="">Select Item</option>;

                                                                <?php $selectedItem;

                                                                if (!($load_data['item_list'] == '')) { ?>
                                                                    <?php foreach ($load_data['item_list'] as $key => $value) : $selected = ($value->id == $invoiceItems->item_id) ? 'selected' : ''; ?>
                                                                        <?php if ($value->id == $invoiceItems->item_id) {
                                                                            $selectedItem = $key;
                                                                        } ?>
                                                                        <?php echo "<option value='" . $value->id . "' $selected>" . $value->item_name . " </option>" ?>
                                                                <?php endforeach;
                                                                } ?>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group">
                                                            <input type="number" name="data[<?= $count; ?>][quantity]" id="quantity_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->quantity; ?>" autocomplete="off" data-fv-not-empty="true" data-fv-not-empty___message="Required" data-fv-integer="true" data-fv-integer___message="Enter valid Qty" data-fv-greater-than="true" data-fv-greater-than___min="1" data-fv-greater-than___message="Minimum 1" data-fv-less-than="true" data-fv-less-than___max="<?= $load_data['item_list'][$selectedItem]->total_quantity ?>" data-fv-less-than___message="Max <?= $load_data['item_list'][$selectedItem]->total_quantity ?>">
                                                        </div>
                                                    </td>
                                                    <td><input type="number" name="data[<?= $count; ?>][price]" id="price_<?= $count; ?>" class="form-control " autocomplete="off" value="<?= $invoiceItems->price; ?>" readonly></td>
                                                    <td><input type="number" name="data[<?= $count; ?>][total]" id="total_<?= $count; ?>" class="form-control " autocomplete="off" value="<?= $invoiceItems->total; ?>" readonly></td>
                                                    <td><input type="number" name="data[<?= $count; ?>][sgst]" id="sgst_<?= $count; ?>" class="form-control " autocomplete="off" value="<?= $invoiceItems->sgst; ?>" readonly></td>
                                                    <td><input type="number" name="data[<?= $count; ?>][cgst]" id="cgst_<?= $count; ?>" class="form-control " autocomplete="off" value="<?= $invoiceItems->cgst; ?>" readonly></td>
                                                    <td><input type="number" name="data[<?= $count; ?>][igst]" id="igst_<?= $count; ?>" class="form-control " autocomplete="off" value="<?= $invoiceItems->igst; ?>" readonly></td>
                                                    <td><input type="number" name="data[<?= $count; ?>][total_amount]" id="amount_<?= $count; ?>" class="form-control " autocomplete="off" value="<?= $invoiceItems->total_amount; ?>" readonly></td>
                                                </tr>

                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">

                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm" id="addRows" type="button">+ Add More</button>
                                        <button class="btn btn-danger btn-sm delete " id="removeRows" type="button">- Delete</button>
                                    </div>
                                </div>

                            </div>



                            <!-- begin: Invoice footer-->
                            <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                                <div class="col-md-10">
                                    <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">

                                        <div class="d-flex flex-column mb-10 mb-md-0">
                                            <!-- <div class="font-weight-bolder font-size-lg mb-3">Notes
                                            </div>
                                            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea> -->
                                        </div>

                                        <div class="d-flex flex-column text-md-right">
                                            <div class="d-flex justify-content-between mb-3">
                                                <span class="mr-15 font-weight-bold">Total Qty:</span>
                                                <span class="text-right" id="total_quantityShow"><?= $load_data['sale_data'][0]->total_quantity; ?></span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <span class="mr-15 font-weight-bold">Total:</span>
                                                <span class="text-right" id="total_amountShow">₹<?= $load_data['sale_data'][0]->total_price; ?></span>
                                            </div>



                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">SGST:</span>
                                                <span class="text-right" id="total_sgst">₹<?= $load_data['sale_data'][0]->sgst_price; ?></span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">CGST:</span>
                                                <span class="text-right" id="total_cgst">₹<?= $load_data['sale_data'][0]->cgst_price; ?></span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">IGST:</span>
                                                <span class="text-right" id="total_igst">₹<?= $load_data['sale_data'][0]->igst_price; ?></span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">Total Tax:</span>
                                                <span class="text-right" id="total_tax">₹<?= $load_data['sale_data'][0]->total_gst_amount; ?></span>
                                            </div>
                                            <span class="font-size-lg font-weight-bolder mt-10 mb-1">TOTAL
                                                AMOUNT</span>
                                            <span class="font-size-h2 font-weight-boldest text-danger mb-1" id="final_amount">₹<?= $load_data['sale_data'][0]->total_amount; ?></span>
                                            <span>Taxes Included</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end: Invoice footer-->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2" id="sale_form_submit_button">Submit</button>
                                <button type="reset" class="btn btn-secondary mr-2">Reset</button>
                                <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end: Form-->
                </div>
                <!--end::Body-->

            </div>
            <!--end::Sell-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->