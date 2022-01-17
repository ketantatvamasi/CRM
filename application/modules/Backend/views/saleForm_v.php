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
                            <span id="purchase_dynamic_title"><?= ucfirst($load_data['site_title']) ?> Book </span>
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

                        <form id="sale_form">

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="exampleSelect1">Customer <span class="text-danger">*</span></label>
                                        <select class="form-control" name="studentid" id="exampleSelect1">
                                            <option value="">Select Customer</option>

                                            <?php if (!($load_data['customers'] == '')) { ?>
                                                <?php foreach ($load_data['customers'] as $value) : ?>
                                                    <?php echo "<option value='" . $value->customer_id . "'>" . $value->customer_name . " </option>" ?>
                                            <?php endforeach;
                                            } ?>

                                        </select>

                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Bill no. <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" placeholder="Invoice Number" />
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Bill Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" />
                                    </div>
                                </div>

                            </div>

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
                                            <tr>
                                                <td><input class="itemRow" type="checkbox"></td>
                                                <td>
                                                    <select class="form-control" name="productName" id="productName_1" autocomplete="off">
                                                        <option value="">Select Item</option>

                                                        <?php if (!($load_data['items'] == '')) { ?>
                                                            <?php foreach ($load_data['items'] as $value) : ?>
                                                                <?php echo "<option value='" . $value->id . "'>" . $value->item_name . " </option>" ?>
                                                        <?php endforeach;
                                                        } ?>

                                                    </select>
                                                </td>
                                                <td><input type="number" name="quantity" id="quantity_1" class="form-control quantity" autocomplete="off"></td>


                                                <td><input type="number" name="price" id="price_1" class="form-control price" autocomplete="off" readonly></td>
                                                <td><input type="number" name="total" id="total_1" class="form-control total" autocomplete="off" readonly></td>
                                                <td><input type="number" name="sgst" id="sgst_1" class="form-control total" autocomplete="off" readonly></td>
                                                <td><input type="number" name="cgst" id="cgst_1" class="form-control total" autocomplete="off" readonly></td>
                                                <td><input type="number" name="igst" id="igst_1" class="form-control total" autocomplete="off" readonly></td>
                                                <td><input type="number" name="amount" id="amount_1" class="form-control total" autocomplete="off" readonly></td>
                                            </tr>
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
                                                <span class="mr-15 font-weight-bold">Total:</span>
                                                <span class="text-right" id="total_amount">₹0</span></span>
                                            </div>


                                            <!-- <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">SGST:</span>
                                                <span class="text-right" id="total_sgst">₹0</span></span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">CGST:</span>
                                                <span class="text-right" id="total_cgst">₹0</span></span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">IGST:</span>
                                                <span class="text-right" id="total_igst">₹0</span></span>
                                            </div> -->
                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">Total Tax:</span>
                                                <span class="text-right" id="total_tax">₹0</span></span>
                                            </div>
                                            <span class="font-size-lg font-weight-bolder mt-10 mb-1">TOTAL
                                                AMOUNT</span>
                                            <span class="font-size-h2 font-weight-boldest text-danger mb-1" id="final_amount">₹0</span>
                                            <span>Taxes Included</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end: Invoice footer-->

                            <div class="card-footer">
                                <button type="reset" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset" class="btn btn-secondary mr-2">Cancel</button>
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