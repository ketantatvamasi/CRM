<?php
$userPermissionArr = $this->session->userdata('permission');
?>
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Dashboard-->
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
                <!--begin::Container-->
                <div class=" container ">
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <!--begin::Header-->
                        <div class="card-header flex-wrap border-0 pt-6 pb-0">
                            <div class="card-title">
                                <h3 class="card-label">
                                    <span id="user_dynamic_title"><?= ucfirst($load_data['site_title']) ?> List</span>
                                    <span class="d-block text-muted pt-2 font-size-sm" id="user_dynamic_subtitle_span">Your precious user</span>
                                </h3>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <?php if (in_array(2, $userPermissionArr)) { ?>
                                    <button type="button" class="btn btn-primary font-weight-bolder " id="adduser">
                                        <i class="fas fa-user-plus"></i> Add <?= $load_data['site_title']; ?>
                                    </button>
                                <?php } ?>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary font-weight-bolder d-none" id="listuser">
                                    <i class="far fa-user"></i> <?= $load_data['site_title']; ?> List
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <div class="datatable datatable-bordered datatable-head-custom" id="userlist">
                            </div>
                            <!--end: Datatable-->


                            <!--begin: Wizard-->
                            <div class="wizard wizard-3 d-none" id="kt_wizard_v3" data-wizard-state="step-first" data-wizard-clickable="true">
                                <!--begin: Wizard Nav-->
                                <div class="wizard-nav">
                                    <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                                        <!--begin::Wizard Step 1 Nav-->
                                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                            <div class="wizard-label">
                                                <h3 class="wizard-title">
                                                    <span>1.</span> User Information
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

                                        <!--begin::Wizard Step 5 Nav-->
                                        <div class="wizard-step" data-wizard-type="step">
                                            <div class="wizard-label">
                                                <h3 class="wizard-title">
                                                    <span>3.</span> Review and Submit
                                                </h3>
                                                <div class="wizard-bar"></div>
                                            </div>
                                        </div>
                                        <!--end::Wizard Step 5 Nav-->
                                    </div>
                                </div>
                                <!--end: Wizard Nav-->

                                <!--begin: Wizard Body-->
                                <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                                    <div class="col-xl-12 col-xxl-7">
                                        <!--begin: Wizard Form-->
                                        <form class="form" id="user_add_form" enctype="multipart/form-data">
                                            <input type="hidden" name="user_id" id="user_id">
                                            <!--begin: Wizard Step 1-->
                                            <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                <h4 class="mb-10 font-weight-bold text-dark">User Information</h4>
                                                <div class="form-group">
                                                    <input style="visibility:hidden;" type="file" name="user_image" id="user_image" onchange="readURL(this);" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Profile Picture</label>
                                                    <div class="input-group mb-3">
                                                        <label for="user_image" class="input-group-text"><i class="fas fa-upload"></i></label>
                                                        <input type="text" id="show_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div align=center class="d-none" id="onImageSelect" style="margin-top: 3%;">
                                                    <img id="imageShow" src="#" alt="Upload File" width="150" height="150">
                                                </div>


                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>First name</label><span class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter your first name" />
                                                </div>
                                                <!--end::Input-->

                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Last name</label><span class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter your last name" />
                                                </div>
                                                <!--end::Input-->

                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Organization name</label><span class="text-danger">*</span>
                                                    <input type="text" class="form-control" name="organization_name" id="organization_name" placeholder="Enter Organization name" />
                                                </div>
                                                <!--end::Input-->
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Email</label><span class="text-danger">*</span>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" />
                                                </div>
                                                <!--end::Input-->
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Phone number</label><span class="text-danger">*</span>
                                                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter your number" />
                                                </div>
                                                <!--end::Input-->
                                                <!--begin::Input-->
                                                <div class="form-group">
                                                    <label>Password</label><span class="text-danger">*</span>
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" />
                                                </div>
                                                <!--end::Input-->
                                                <!--begin::Input-->
                                                <label>Role</label><span class="text-danger">*</span>
                                                <div class="form-group">

                                                    <select class="form-control" name="role_id" id="role_id" onchange="roleSelection()">
                                                        <option value=""></option>
                                                        <?php foreach ($load_data['record']['role_list'] as $val) {
                                                            echo "<option value='" . $val->id . "'>" . $val->role_name . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-check mt-13">
                                                    <input type="checkbox" class="form-check-input" id="SelectAll">
                                                    <label class="form-check-label" for="SelectAll">Select All</label>
                                                </div>
                                                <!--end::Input-->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="tab-content">
                                                            <div class="row">
                                                                <?php
                                                                foreach ($load_data['record']['permission'] as $key => $value) {
                                                                    echo '<div class="col-lg-3">
                                                                            <div class="mt-3">
                                                                                <div class="form-check">
                                                                                    <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheck' . $value['permission_name'] . '" value="' . $value['id'] . '">
                                                                                    <label class="form-check-label" for="customCheck' . $value['permission_name'] . '">' . $value['permission_name'] . '</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>';
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end: Wizard Step 1-->

                                            <!--begin: Wizard Step 2-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <h4 class="mb-10 font-weight-bold text-dark">Setup Your Address detail</h4>
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
                                                            <label>Pincode</label><span class="text-danger">*</span>
                                                            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter your postcode" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>City</label><span class="text-danger">*</span>
                                                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <!--begin::Input-->
                                                        <div class="form-group">
                                                            <label>State</label><span class="text-danger">*</span>
                                                            <input type="text" class="form-control" name="state" id="state" placeholder="Enter your state" />
                                                        </div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <!--begin::Select-->
                                                        <div class="form-group">
                                                            <label>Country</label><span class="text-danger">*</span>
                                                            <select name="country" class="form-control" id="country">
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

                                            <!--begin: Wizard Step 5-->
                                            <div class="pb-5" data-wizard-type="step-content">
                                                <!--begin::Section-->
                                                <h4 class="mb-10 font-weight-bold text-dark">Review your Details
                                                    and Submit</h4>
                                                <h6 class="font-weight-bolder mb-3">
                                                    User Information:
                                                </h6>
                                                <div class="text-dark-50 line-height-lg">
                                                    <div id="information"></div>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--end::Section-->

                                                <!--begin::Section-->
                                                <h6 class="font-weight-bolder mb-3">
                                                    Address Details:
                                                </h6>
                                                <div class="text-dark-50 line-height-lg">
                                                    <div id="addressdetails"></div>
                                                </div>
                                                <div class="separator separator-dashed my-5"></div>
                                                <!--end::Section-->

                                            </div>
                                            <!--end: Wizard Step 5-->

                                            <!--begin: Wizard Actions-->
                                            <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                <div class="mr-2">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">
                                                        Previous
                                                    </button>
                                                </div>
                                                <div>
                                                    <button type="submit" id="users_form_submit_button" class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">
                                                        Submit
                                                    </button>
                                                    <button type="button" id="nextbutton" class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">
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
                            <!--end: Wizard-->

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->

                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->