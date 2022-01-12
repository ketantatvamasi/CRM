<style>
  .parsley-errors-list {
    color: #B94A48 !important;
    margin-bottom: 0px;
    padding-left: 0px !important;
    list-style: none;
  }
</style>
<!--begin::Content-->
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">

            <!--begin::ItemList-->
            <div class="card card-custom ">
                <!--begin::Header-->
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            <span id="item_dynamic_title"><?= ucfirst($load_data['site_title']) ?> List</span>
                            <span class="d-block text-muted pt-2 font-size-sm" id="item_dynamic_subtitle_span">More items, more business!</span>
                        </h3>
                    </div>

                    <div class="card-toolbar">
                        <!--begin::Button-->

                        <button type="button" class="btn btn-primary font-weight-bolder " id="add_item_button" data-toggle="modal" data-target="#itemsModal">
                            <i class="fas fa-user-plus"></i> Add <?= ucfirst($load_data['site_title']) ?>
                        </button>
                        <!--end::Button-->
                    </div>
                </div>
                <!--end::Header-->


                <!-- Modal-->
                <div class="modal fade " id="itemsModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="itemsModal" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add <?= ucfirst($load_data['site_title']) ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form items_form" id="items_form" method="post">
                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="total_quantity" id="total_quantity">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Item Name</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Enter item name"/>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Item Code</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="item_code" id="item_code" placeholder="Enter item code" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Purchase Price</label><span class="text-danger">*</span>
                                                <input type="number" class="form-control" name="purchase_price" id="purchase_price" placeholder="Enter item purchse price" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Sale price</label><span class="text-danger">*</span>
                                                <input type="number" class="form-control" name="sale_price" id="sale_price" placeholder="Enter item sale price" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Opening quantity</label><span class="text-danger">*</span>
                                                <input type="number" class="form-control" name="opening_quantity" id="opening_quantity" placeholder="Enter opening quantity" />
                                            </div>
                                        </div>
                                        <!-- <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Total quantity</label>
                                                <input type="number" class="form-control" name="total_quantity" id="total_quantity" placeholder="Enter total quantity" />
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="form-group">
                                                <label>CGST</label>
                                                <input type="text" class="form-control" name="cgst" id="cgst" placeholder="Enter cgst" />
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group">
                                                <label>SGST</label>
                                                <input type="text" class="form-control" name="sgst" id="sgst" placeholder="Enter sgst" />
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group">
                                                <label>IGST</label>
                                                <input type="text" class="form-control" name="igst" id="igst" placeholder="Enter igst" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea rows="5" name="note" id="note" placeholder="Enter the note" class="form-control"></textarea>
                                        <!-- <input type="text" class="form-control" name="igst" id="igst" placeholder="Enter igst" /> -->
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary font-weight-bold" id="items_button" form="items_form" value="Save">
                                <!-- <input type="submit" class="btn btn-primary font-weight-bold" form="items_form" value="Save"/> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-bordered datatable-head-custom" id="item_datatable">
                    </div>
                    <!--end: Datatable-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::ItemList-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script> -->