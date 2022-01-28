<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Purchase-->
            <div class="card card-custom ">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0 d-print-none">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span id="purchase_dynamic_title">Edit <?= ucfirst($load_data['site_title']) ?></span>
                            <span class="d-block text-muted pt-2 font-size-sm" id="purchase_dynamic_subtitle_span">More purchases More business!</span>
                        </h3>
                    </div>

                    <div class="card-toolbar ">
                        <!--begin::Button-->
                        <a href="<?= base_url('backend/purchase') ?>" class="btn btn-primary font-weight-bolder " id="add_purchase_button">
                            <i class="fas fa-file-invoice-dollar"></i> Purchase List
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <form class="form" id="purchase_form">
                        <input type="hidden" name="id" id="id" value="<?= $load_data['purchase_data'][0]->id ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Vendor Name</label><span class="text-danger">*</span>
                                    <?php if (!($load_data['vendors'] == '')) { ?>
                                        <?php foreach ($load_data['vendors'] as $value) : ?>
                                            <?php if ($value->id == $load_data['purchase_data'][0]->vendor_id) {
                                                $value_vendor = $value->contact_person_name;
                                            } ?>
                                    <?php endforeach;
                                    } ?>
                                    <input type="text" name="vendor_name" id="vendor_name" value="<?= $value_vendor ?>" class="form-control" placeholder="Vendors" data-fv-not-empty="true" data-fv-not-empty___message="Vendor is required">
                                    <input type="hidden" name="vendor_id" id="vendor_id" value="<?= $load_data['purchase_data'][0]->vendor_id ?>">

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Purchase date</label><span class="text-danger">*</span>
                                    <input type="date" class="form-control" name="purchse_date" id="purchse_date" placeholder="Enter invoice number" value="<?= $load_data['purchase_data'][0]->purchse_date; ?>" data-fv-not-empty="true" data-fv-not-empty___message="Bill date is required" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Invoice number</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" name="vendor_invoice_no" id="vendor_invoice_no" placeholder="Enter invoice number" value="<?= $load_data['purchase_data'][0]->vendor_invoice_no; ?>" data-fv-not-empty="true" data-fv-not-empty___message="The Bill no is required" />
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
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control item_row" name="data[<?= $count; ?>][item_id]" id="item_id_<?= $count; ?>" autocomplete="off">\
                                                    <option value="">Select Item</option>;
                                                    <?php
                                                    if (!($load_data['item_list'] == '')) { ?>
                                                        <?php foreach ($load_data['item_list'] as $value) : $selected = ($value->id == $invoiceItems->item_id) ? 'selected' : ''; ?>
                                                            <?php echo "<option value='" . $value->id . "' $selected>" . $value->item_name . " </option>" ?>
                                                    <?php endforeach;
                                                    } ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" name="data[<?= $count; ?>][quantity]" id="quantity_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->quantity; ?>" placeholder="Qty" autocomplete="off" data-fv-not-empty="true" data-fv-not-empty___message="Required" data-fv-integer="true" data-fv-integer___message="Enter valid Qty" data-fv-greater-than="true" data-fv-greater-than___min="1" data-fv-greater-than___message="Minimum 1">
                                            </div>
                                        </td>
                                        <td><input type="number" name="data[<?= $count; ?>][rate]" id="rate_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->rate; ?>" placeholder="Rate" autocomplete="off" readonly></td>
                                        <td><input type="number" name="data[<?= $count; ?>][cgst_tax]" id="cgst_tax_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->cgst_tax; ?>" placeholder="CGST" autocomplete="off" readonly></td>
                                        <td><input type="number" name="data[<?= $count; ?>][sgst_tax]" id="sgst_tax_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->sgst_tax; ?>" placeholder="SGST" autocomplete="off" readonly></td>
                                        <td><input type="number" name="data[<?= $count; ?>][igst_tax]" id="igst_tax_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->igst_tax; ?>" placeholder="IGST" autocomplete="off" readonly></td>
                                        <td><input type="number" name="data[<?= $count; ?>][total_amount]" id="total_amount_<?= $count; ?>" class="form-control " value="<?= $invoiceItems->total_amount; ?>" placeholder="Amount" autocomplete="off" readonly></td>
                                        <td>
                                            <div class="row">
                                                <div class="col-4">
                                                    <a href="javascript:;" id="addItemfield" class="btn btn-sm font-weight-bolder btn-light-primary addItemfield">
                                                        <i class="la la-plus"></i>
                                                    </a>
                                                </div>
                                                <!-- <div class="col-4">
                                                    <a href="javascript:;" id="deleteItemfield" class="btn btn-sm font-weight-bolder btn-light-danger deleteItemfield">
                                                        <i class="la la-trash-o"></i>
                                                    </a>
                                                </div> -->
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
                                <td><input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?= $load_data['purchase_data'][0]->total_quantity; ?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 29%; margin-top: 10px;"><b>Total Amount before Tax: </b></td>
                                <td><input type="number" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?= $load_data['purchase_data'][0]->total_price; ?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Add CGST:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="cgst_taxs" id="cgst_taxs" placeholder="CGST" value="<?= $load_data['purchase_data'][0]->cgst_price; ?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Add SGST:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="sgst_taxs" id="sgst_taxs" placeholder="SGST" value="<?= $load_data['purchase_data'][0]->sgst_price; ?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Add IGST:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="igst_taxs" id="igst_taxs" placeholder="IGSt" value="<?= $load_data['purchase_data'][0]->igst_price; ?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Round off:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="round_of" id="round_of" placeholder="Round" value="<?= $load_data['purchase_data'][0]->round_of; ?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                            <tr>
                                <td style="width: 30%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td style="width: 9.5%;"></td>
                                <td colspan="3" style="float:right; margin-top: 10px;"><b>Total Amount after Tax:&nbsp;&nbsp;</b></td>
                                <td><input type="number" class="form-control" name="total" id="total" placeholder="Total" value="<?= $load_data['purchase_data'][0]->total_amount; ?>" readonly /></td>
                                <td style="width: 11%;"></td>
                            </tr>
                        </table>
                    </form>
                    <div class="separator separator-dashed my-8"></div>

                    <div class="d-print-none" style="float:right;">
                        <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
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

<!-- Modal-->
<div class="modal fade" id="AddvendorModal" id="AddvendorModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="AddvendorModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Vendor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="wizard wizard-3" id="vendor_form_model" data-wizard-state="step-first" data-wizard-clickable="true">
                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav">
                        <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3" id="vendor_menu_button">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>1.</span> Company Information
                                    </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 1 Nav-->

                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>2.</span> Address Details
                                    </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 2 Nav-->

                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>3.</span> Bank & Documents Details
                                    </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 3 Nav-->

                            <!--begin::Wizard Step 4 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        <span>4.</span> Review and Submit
                                    </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step 4 Nav-->
                        </div>
                    </div>
                    <!--end: Wizard Nav-->

                    <!--begin: Wizard Body-->
                    <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                        <div class="col-xl-12">
                            <!--begin: Wizard Form-->
                            <form class="form" id="vendor_form">

                                <input type="hidden" name="id" id="id">

                                <!--begin: Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">Company Details</h4>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Company Name</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter vendor's company name" />
                                            </div>
                                            <!--end::Input-->
                                        </div>

                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Code</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="code" id="code" placeholder="Enter company code" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Contact Person Name</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="contact_person_name" id="contact_person_name" placeholder="Enter your contact person name" />
                                            </div>
                                            <!--end::Input-->
                                        </div>

                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Email</label><span class="text-danger">*</span>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter vendor's email id" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-xl-4">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Main Phone</label><span class="text-danger">*</span>
                                                <input type="number" class="form-control" name="mobile_main" id="mobile_main" placeholder="Enter vendor's main mobile" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-xl-4">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Mobile 1</label>
                                                <input type="number" class="form-control" name="mobile1" id="mobile1" placeholder="Enter other mobile 1" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-xl-4">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Mobile 2</label>
                                                <input type="number" class="form-control" name="mobile2" id="mobile2" placeholder="Enter other mobile 2" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Company Website</label>
                                                <input type="text" class="form-control" name="website" id="website" placeholder="Enter vendor's website" />
                                            </div>
                                            <!--end::Input-->
                                        </div>

                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Referee Name</label>
                                                <input type="text" class="form-control" name="referee_name" id="referee_name" placeholder="Enter referee name" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                </div>
                                <!--end: Wizard Step 1-->

                                <!--begin: Wizard Step 2-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">Company Address Detail</h4>
                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Address</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address" />
                                    </div>
                                    <!--end::Input-->
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>City</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>State</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="state" id="state" placeholder="Enter state" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Pincode</label><span class="text-danger">*</span>
                                                <input type="number" class="form-control" name="pincode" id="pincode" placeholder="Enter postcode" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                        <div class="col-xl-6">
                                            <!--begin::Select-->
                                            <div class="form-group">
                                                <label>Country</label><span class="text-danger">*</span>
                                                <select name="country" id="country" class="form-control">
                                                    <option value="">Select country</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Åland Islands</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia, Plurinational State
                                                        of</option>
                                                    <option value="BQ">Bonaire, Sint Eustatius and
                                                        Saba</option>
                                                    <option value="BA">Bosnia and Herzegovina
                                                    </option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean
                                                        Territory</option>
                                                    <option value="BN">Brunei Darussalam</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic
                                                    </option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands
                                                    </option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo</option>
                                                    <option value="CD">Congo, the Democratic
                                                        Republic of the</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Côte d'Ivoire</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CW">Curaçao</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Malvinas)
                                                    </option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories
                                                    </option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald
                                                        Islands</option>
                                                    <option value="VA">Holy See (Vatican City State)
                                                    </option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran, Islamic Republic of
                                                    </option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KP">Korea, Democratic People's
                                                        Republic of</option>
                                                    <option value="KR">Korea, Republic of</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Lao People's Democratic
                                                        Republic</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao</option>
                                                    <option value="MK">Macedonia, the former
                                                        Yugoslav Republic of</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia, Federated States
                                                        of</option>
                                                    <option value="MD">Moldova, Republic of</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands
                                                    </option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territory,
                                                        Occupied</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Réunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russian Federation</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="BL">Saint Barthélemy</option>
                                                    <option value="SH">Saint Helena, Ascension and
                                                        Tristan da Cunha</option>
                                                    <option value="KN">Saint Kitts and Nevis
                                                    </option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="MF">Saint Martin (French part)
                                                    </option>
                                                    <option value="PM">Saint Pierre and Miquelon
                                                    </option>
                                                    <option value="VC">Saint Vincent and the
                                                        Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe
                                                    </option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SX">Sint Maarten (Dutch part)
                                                    </option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia and the South
                                                        Sandwich Islands</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen
                                                    </option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syrian Arab Republic</option>
                                                    <option value="TW">Taiwan, Province of China
                                                    </option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania, United Republic of
                                                    </option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands
                                                    </option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB">United Kingdom</option>
                                                    <option value="US">United States</option>
                                                    <option value="UM">United States Minor Outlying
                                                        Islands</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VE">Venezuela, Bolivarian
                                                        Republic of</option>
                                                    <option value="VN">Viet Nam</option>
                                                    <option value="VG">Virgin Islands, British
                                                    </option>
                                                    <option value="VI">Virgin Islands, U.S.</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </div>
                                            <!--end::Select-->
                                        </div>
                                    </div>

                                </div>
                                <!--end: Wizard Step 2-->

                                <!--begin: Wizard Step 3-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">Bank Details</h4>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Bank Name</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Enter vendor's Bank name" />
                                            </div>
                                            <!--end::Input-->
                                        </div>

                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Bank Branch</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="bank_branch" id="bank_branch" placeholder="Enter vendor's bank branch" />
                                            </div>
                                            <!--end::Input-->
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>Acccount no.</label><span class="text-danger">*</span>
                                                <input type="number" class="form-control" name="acccount_no" id="acccount_no" placeholder="Enter Acccount no" />
                                            </div>
                                            <!--end::Input-->
                                        </div>

                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>IFSC Code</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" placeholder="Enter bank IFSC code" />
                                            </div>
                                            <!--end::Input-->
                                        </div>

                                    </div>

                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>Account Name</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="account_name" id="account_name" placeholder="Enter account name" />
                                    </div>
                                    <!--end::Input-->

                                    <div class="d-flex justify-content-between border-top mt-10 pt-10"></div>

                                    <h4 class="mb-10 font-weight-bold text-dark">Documents Details</h4>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>GST no.</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="Enter GST number" />
                                            </div>
                                            <!--end::Input-->
                                        </div>

                                        <div class="col-xl-6">
                                            <!--begin::Input-->
                                            <div class="form-group">
                                                <label>CST no.</label>
                                                <input type="text" class="form-control" name="cst_no" id="cst_no" placeholder="Enter CST number" />
                                            </div>
                                            <!--end::Input-->
                                        </div>
                                    </div>

                                    <!--begin::Input-->
                                    <div class="form-group">
                                        <label>PAN no.</label>
                                        <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="Enter GST number" />
                                    </div>
                                    <!--end::Input-->


                                </div>
                                <!--end: Wizard Step 3-->

                                <!--begin: Wizard Step 4-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <!--begin::Section-->
                                    <h4 class="mb-10 font-weight-bold text-dark">Review your Details
                                        and Submit</h4>
                                    <h6 class="font-weight-bolder mb-3">
                                        Company Information:
                                    </h6>
                                    <div class="text-dark-50 line-height-lg">
                                        <div id="company_information"></div>
                                    </div>
                                    <div class="separator separator-dashed my-5"></div>
                                    <!--end::Section-->

                                    <!--begin::Section-->
                                    <h6 class="font-weight-bolder mb-3">
                                        Address Details:
                                    </h6>
                                    <div class="text-dark-50 line-height-lg">
                                        <div id="address_details"></div>
                                    </div>
                                    <div class="separator separator-dashed my-5"></div>
                                    <!--end::Section-->

                                    <!--begin::Section-->
                                    <h6 class="font-weight-bolder mb-3">
                                        Bank Details
                                    </h6>
                                    <div class="text-dark-50 line-height-lg">
                                        <div id="bank_details"></div>
                                    </div>
                                    <div class="separator separator-dashed my-5"></div>
                                    <!--end::Section-->

                                    <!--begin::Section-->
                                    <h6 class="font-weight-bolder mb-3">
                                        Documents Details
                                    </h6>
                                    <div class="text-dark-50 line-height-lg">
                                        <div id="document_details"></div>
                                    </div>

                                    <!--end::Section-->

                                </div>
                                <!--end: Wizard Step 4-->

                                <!--begin: Wizard Actions-->
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">
                                            Previous
                                        </button>
                                    </div>
                                    <div>
                                        <button type="button" id="vendor_form_submit_button" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">
                                            Submit
                                        </button>
                                        <button type="button" id="next_button" class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">
                                            Next
                                        </button>
                                    </div>
                                </div>
                                <!--end: Wizard Actions-->
                            </form>
                            <!--end: Wizard Form-->
                        </div>
                    </div>
                    <!--end: Wizard Body-->
                </div>
            </div>
        </div>
    </div>
</div>