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
                            <span id="purchase_dynamic_title"><?= ucfirst($load_data['site_title']) ?> List</span>
                            <span class="d-block text-muted pt-2 font-size-sm" id="purchase_dynamic_subtitle_span">More purchases More business!</span>
                        </h3>
                    </div>

                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <button type="button" class="btn btn-primary font-weight-bolder " id="add_purchase_button"  data-toggle="modal" data-target="#purchase_Modal">
                            <i class="fas fa-user-plus"></i> Add <?= ucfirst($load_data['site_title']) ?>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="purchase_datatable">
                    </div>
                    <!--end: Datatable-->
                </div>
                <!--end::Body-->
                <!-- Modal-->
                <div class="modal fade " id="purchase_Modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="itemsModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add <?= ucfirst($load_data['site_title']) ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                 ...............
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary font-weight-bold" id="purchase_button" form="purchase_form" value="Save">
                                <!-- <input type="submit" class="btn btn-primary font-weight-bold" form="items_form" value="Save"/> -->
                            </div>
                        </div>
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