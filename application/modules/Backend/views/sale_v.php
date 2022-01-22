<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
            <!--begin::Sell DataTable-->
            <div class="card card-custom ">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span id="purchase_dynamic_title"><?= ucfirst($load_data['site_title']) ?> List</span>
                            <span class="d-block text-muted pt-2 font-size-sm" id="purchase_dynamic_subtitle_span">Sale More earn More..</span>
                        </h3>
                    </div>

                    <div class="card-toolbar">
                        <!--begin::Button-->
                        <a href="<?= base_url('backend/sale/addSale_Page'); ?>">
                            <button type="button" class="btn btn-primary font-weight-bolder">
                                <i class="menu-icon flaticon2-shopping-cart-1 icon-lg"></i> <?= $load_data['site_title']; ?>
                            </button>
                        </a>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="sale_datatable">
                    </div>
                    <!--end: Datatable-->
                </div>
                <!--end::Body-->

            </div>
            <!--end::Sell DataTable-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->