<?php
$userPermissionArr = $this->session->userdata('permission');
?>
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
                                    <span id="role_dynamic_title"><?= ucfirst($load_data['site_title']) ?> List</span>
                                    <span class="d-block text-muted pt-2 font-size-sm" id="role_dynamic_subtitle_span">Your User's Hope</span>
                                </h3>
                            </div>
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <?php if (in_array(26, $userPermissionArr)) { ?>
                                    <button type="button" class="btn btn-primary font-weight-bolder " id="addRole">
                                        <i class="fas fa-user-plus"></i> Add <?= $load_data['site_title']; ?>
                                    </button>
                                <?php } ?>
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
                            <form class="forms-sample d-none" id="role_form" method="POST" action="#">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <div class="col-lg-6">
                                            <div class="tab-content">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label for="role_name" class="form-label">Role Name</label>
                                                        <input type="text" id="role_name" name="role_name" class="form-control form-control-sm" placeholder="Role Name">
                                                        <input type="hidden" name="id" id="id">
                                                    </div>
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
                                <div class="row" style="margin-left: 5%;">
                                    <div class="col-lg-12">
                                        <div class="tab-content">
                                            <div class="row">
                                                <?php
                                                foreach ($load_data['record'] as $key => $value) {
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
                                <div class="row">
                                    <div class="col-lg-10"></div>
                                    <div class="col-lg-1 mt-7">
                                        <button type="submit" class="btn btn-primary" id="role_form_submit_button">Submit</button>
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