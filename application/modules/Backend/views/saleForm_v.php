<style>
    .form-group {
        margin-bottom: 0;
    }
</style>
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
                            <span id="purchase_dynamic_title">Add <?= ucfirst($load_data['site_title']) ?> </span>
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

                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="total_quantity" id="total_quantity">
                            <input type="hidden" name="total_price" id="total_price">
                            <input type="hidden" name="cgst_price" id="cgst_price">
                            <input type="hidden" name="sgst_price" id="sgst_price">
                            <input type="hidden" name="igst_price" id="igst_price">
                            <input type="hidden" name="total_gst_amount" id="total_gst_amount">
                            <!-- <input type="hidden" name="round_of" id="round_of"> -->
                            <input type="hidden" name="total_amount" id="total_amount">

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="customer">Customer <span class="text-danger">*</span></label>
                                        <select class="form-control" name="customer_id" id="customer_id" data-fv-not-empty="true" data-fv-not-empty___message="Customer is required">
                                            <option value="">Select Customer</option>

                                            <?php if (!($load_data['customers'] == '')) { ?>
                                                <?php foreach ($load_data['customers'] as $value) : ?>
                                                    <?php echo "<option value='" . $value->id . "'>" . $value->customer_name . " </option>" ?>
                                            <?php endforeach;
                                            } ?>

                                        </select>

                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Bill no. <span class="text-danger">*</span></label>
                                        <input type="number" data-fv-not-empty="true" data-fv-not-empty___message="The Bill no is required" class="form-control" name="customer_invoice_id" id="customer_invoice_id" placeholder="Invoice Number" />
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>Bill Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="bill_date" id="bill_date" data-fv-not-empty="true" data-fv-not-empty___message="Bill date is required" />
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
                                                    <div class="form-group">
                                                        <select class="form-control" name="data[1][item_id]" id="productId_1" autocomplete="off" data-fv-not-empty="true" data-fv-not-empty___message="Select Item">
                                                            <option value="">Select Item</option>

                                                            <?php if (!($load_data['items'] == '')) { ?>
                                                                <?php foreach ($load_data['items'] as $value) : ?>
                                                                    <?php echo "<option value='" . $value->id . "'>" . $value->item_name . " </option>" ?>
                                                            <?php endforeach;
                                                            } ?>

                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" name="data[1][quantity]" id="quantity_1" class="form-control " placeholder="Qty" autocomplete="off" 
                                                        data-fv-not-empty="true" data-fv-not-empty___message="Required" 
                                                        data-fv-integer="true" data-fv-integer___message="Enter valid Qty" 
                                                        data-fv-greater-than="true" data-fv-greater-than___min="1"  data-fv-greater-than___message="Minimum 1">
                                                    </div>
                                                </td>


                                                <td><input type="number" name="data[1][price]" id="price_1" class="form-control " autocomplete="off" placeholder="Price" readonly></td>
                                                <td><input type="number" name="data[1][total]" id="total_1" class="form-control " autocomplete="off" placeholder="Total" readonly></td>
                                                <td><input type="number" name="data[1][sgst]" id="sgst_1" class="form-control " autocomplete="off" placeholder="SGST" readonly></td>
                                                <td><input type="number" name="data[1][cgst]" id="cgst_1" class="form-control " autocomplete="off" placeholder="CGST" readonly></td>
                                                <td><input type="number" name="data[1][igst]" id="igst_1" class="form-control " autocomplete="off" placeholder="IGST" readonly></td>
                                                <td><input type="number" name="data[1][total_amount]" id="amount_1" class="form-control " autocomplete="off" placeholder="Amount" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">

                                    <div class="form-group mb-5">
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
                                                <span class="text-right" id="total_quantityShow">0</span>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <span class="mr-15 font-weight-bold">Total:</span>
                                                <span class="text-right" id="total_amountShow">₹0</span>
                                            </div>



                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">SGST:</span>
                                                <span class="text-right" id="total_sgst">₹0</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">CGST:</span>
                                                <span class="text-right" id="total_cgst">₹0</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">IGST:</span>
                                                <span class="text-right" id="total_igst">₹0</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mr-15 font-weight-bold">Total Tax:</span>
                                                <span class="text-right" id="total_tax">₹0</span>
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
                                <button type="submit" class="btn btn-primary mr-2" id="sale_form_submit_button">Submit</button>
                                <button type="button" class="btn btn-secondary mr-2" id="sale_form_reset_button">Reset</button>
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


<<!-- Modal-->
    <div class="modal fade" id="AddcustomerModal" id="AddcustomerModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="AddcustomerModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- begin: Wizard-->
                    <div class="wizard wizard-3" id="customer_form_model" data-wizard-state="step-first" data-wizard-clickable="true">
                        <!--begin: Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3" id="customer_menu_button">
                                <!--begin::Wizard Step 1 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            <span>1.</span> Customer Information
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
                                <!--begin::Wizard Step 4 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            <span>3.</span> Review and Submit
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
                                <form class="form" id="customer_form">

                                    <input type="hidden" name="id" id="id">

                                    <!--begin: Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h4 class="mb-10 font-weight-bold text-dark">Customer Details</h4>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Customer Name</label><span class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Enter customer name" />
                                                </div>
                                                <!--end::Input-->
                                            </div>

                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Customer category</label><span class="text-danger">*</span>
                                                    <!-- <input type="text" class="form-control" name="customer_category" id="customer_category" placeholder="Enter customer category" /> -->
                                                    <select class="form-control" name="customer_category" id="customer_category" placeholder="Enter customer category">
                                                        <option value="">Select category</option>
                                                        <option value="Business">Business</option>
                                                        <option value="Individual">Individual</option>
                                                    </select>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Email</label><span class="text-danger">*</span>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter customer email id" />
                                        </div>
                                        <!--end::Input-->

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Main Phone</label><span class="text-danger">*</span>
                                                    <input type="number" class="form-control" name="mobile_main" id="mobile_main" placeholder="Enter vendor's main mobile" />
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Mobile 1</label>
                                                    <input type="number" class="form-control" name="mobile1" id="mobile1" placeholder="Enter other mobile 1" />
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>GST no.</label>
                                                    <input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="Enter GST number" />
                                                </div>
                                                <!--end::Input-->
                                            </div>

                                            <div class="col-xl-6">
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>PAN no.</label>
                                                    <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="Enter GST number" />
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                        </div>
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Referee Name</label>
                                            <input type="text" class="form-control" name="referee_name" id="referee_name" placeholder="Enter referee name" />
                                        </div>
                                        <!--end::Input-->
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
                                        <!--begin::Section-->
                                        <h4 class="mb-10 font-weight-bold text-dark">Review your Details
                                            and Submit</h4>
                                        <h6 class="font-weight-bolder mb-3">
                                            Customer Information:
                                        </h6>
                                        <div class="text-dark-50 line-height-lg">
                                            <div id="customer_information"></div>
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
                                    </div>
                                    <!--end: Wizard Step 3-->

                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">
                                                Previous
                                            </button>
                                        </div>
                                        <div>
                                            <button type="button" id="customer_form_submit_button" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">
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
                    <!--end: Wizard -->
                </div>
            </div>
        </div>
    </div>