<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Role-->
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
                                    <span class="d-block text-muted pt-2 font-size-sm" id="user_dynamic_subtitle_span">Your User's Hope</span>
                                </h3>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary font-weight-bolder " id="addRole">
                                    <i class="fas fa-user-plus"></i> Add <?= $load_data['site_title']; ?>
                                </button>
                                <!--end::Button-->
                            </div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin: Datatable-->
                            <div class="datatable datatable-bordered datatable-head-custom" id="role_datatable">
                            </div>
                            <!--end: Datatable-->
                            <form class="forms-sample d-none" id="role_form" method="POST" action="<?= base_url('backend/role/addRole') ?>">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="col-lg-6">
                                            <div class="tab-content">
                                                <div class="mb-3">
                                                    <label for="role_name" class="form-label">Role Name</label>
                                                    <input type="text" id="role_name" name="role_name" class="form-control form-control-sm" placeholder="Role Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-check mt-13">
                                            <input type="checkbox" class="form-check-input" id="SelectAll">
                                            <label class="form-check-label" for="SelectAll">Select All</label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="tab-content">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckUser View" value="1">
                                                            <label class="form-check-label" for="customCheckUser View">User View</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckUser Add" value="2">
                                                            <label class="form-check-label" for="customCheckUser Add">User Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckUser Edit" value="3">
                                                            <label class="form-check-label" for="customCheckUser Edit">User Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckUser Delete" value="4">
                                                            <label class="form-check-label" for="customCheckUser Delete">User Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckVendor View" value="5">
                                                            <label class="form-check-label" for="customCheckVendor View">Vendor View</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckVendor Add" value="6">
                                                            <label class="form-check-label" for="customCheckVendor Add">Vendor Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckVendor Edit" value="7">
                                                            <label class="form-check-label" for="customCheckVendor Edit">Vendor Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckVendor Delete" value="8">
                                                            <label class="form-check-label" for="customCheckVendor Delete">Vendor Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckCustomer View" value=" 9">
                                                            <label class="form-check-label" for="customCheckCustomer View">Customer View</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckCustomer Add" value="10">
                                                            <label class="form-check-label" for="customCheckCustomer Add">Customer Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckCustomer Edit" value="11">
                                                            <label class="form-check-label" for="customCheckCustomer Edit">Customer Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckCustomer Delete" value="12">
                                                            <label class="form-check-label" for="customCheckCustomer Delete">Customer Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckItem View" value="13">
                                                            <label class="form-check-label" for="customCheckItem View">Item View</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckItem Add" value="14">
                                                            <label class="form-check-label" for="customCheckItem Add">Item Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckItem Edit" value="15">
                                                            <label class="form-check-label" for="customCheckItem Edit">Item Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckItem Delete" value="16">
                                                            <label class="form-check-label" for="customCheckItem Delete">Item Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckPurchase View" value="17">
                                                            <label class="form-check-label" for="customCheckPurchase View">Purchase View</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckPurchase Add" value="18">
                                                            <label class="form-check-label" for="customCheckPurchase Add">Purchase Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckPurchase Edit" value="19">
                                                            <label class="form-check-label" for="customCheckPurchase Edit">Purchase Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckPurchase Delete" value="20">
                                                            <label class="form-check-label" for="customCheckPurchase Delete">Purchase Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckSale View" value="21">
                                                            <label class="form-check-label" for="customCheckSale View">Sale View</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckSale Add" value="22">
                                                            <label class="form-check-label" for="customCheckSale Add">Sale Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckSale Edit" value="23">
                                                            <label class="form-check-label" for="customCheckSale Edit">Sale Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckSale Delete" value="24">
                                                            <label class="form-check-label" for="customCheckSale Delete">Sale Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckRole View" value="25">
                                                            <label class="form-check-label" for="customCheckRole View">Role View</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckRole Add" value="26">
                                                            <label class="form-check-label" for="customCheckRole Add">Role Add</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckRole Edit" value="27">
                                                            <label class="form-check-label" for="customCheckRole Edit">Role Edit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mt-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="permissions[]" class="form-check-input" id="customCheckRole Delete" value="28">
                                                            <label class="form-check-label" for="customCheckRole Delete">Role Delete</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-1 mt-7">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Entry-->
            <!--end::Role-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->