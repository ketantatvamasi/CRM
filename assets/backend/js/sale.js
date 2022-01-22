"use strict";
// Class definition

var dropDown = function () {
    // basic
    $('#customer_id').select2({
        placeholder: "Select vendor",
        width: '100%'
    });
    $("[id^='productId_']").select2({
        placeholder: "Select item",
        width: '100%'
    });
}

jQuery(document).ready(function () {
    dropDown();
    var datatable = $('#sale_datatable').KTDatatable({
        // datasource definition
        data: {
            type: 'remote',
            source: {
                read: {
                    url: baseFolder + 'sale/saleList',
                },
            },
            pageSize: 10, // display 20 records per page
            serverPaging: true,
            serverFiltering: true,
            serverSorting: true,
        },
        // layout definition
        layout: {
            scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
            footer: false, // display/hide footer
        },

        // column sorting
        sortable: true,

        pagination: true,

        search: {
            input: $('#kt_subheader_search_form'),
            delay: 400,
            key: 'generalSearch'
        },

        // columns definition
        columns: [
            {
                field: 'id',
                title: 'id',
                sortable: false,
                width: 20,
                type: 'number',
                selector: false,
                textAlign: 'left',
                template: function (data) {
                    return '<span class="font-weight-bolder">' + data.number + '</span>';
                }
            },
            {
                field: 'customer_name',
                title: 'customer Name',
                sortable: 'asc',
                width: 100,
                template: function (data) {
                    var output = '';
                    output += '<span class="font-weight-bolder">' + data.customer_name + '</span>';

                    return output;
                }
            },
            {
                field: 'total_quantity',
                title: 'Total Qty.',
                width: 70,
                textAlign: 'center',
                template: function (row) {
                    var output = '';

                    output += '<div class="font-weight font-size-lg mb-0">' + row.total_quantity + '</div>';
                    return output;
                }
            },
            {
                field: 'total_price',
                title: 'Total price',
                width: 70,
                textAlign: 'center',
                template: function (row) {
                    var output = '';

                    output += '<div class="font-weight font-size-lg mb-0">' + row.total_price + '</div>';
                    return output;
                }
            },
            {
                field: 'total_gst_amount',
                title: 'GST amount',
                width: 70,
                textAlign: 'center',
                template: function (row) {
                    var output = '';

                    output += '<div class="font-weight font-size-lg mb-0">' + row.total_gst_amount + '</div>';
                    return output;
                }
            },
            {
                field: 'total_amount',
                title: 'Total amount',
                width: 70,
                textAlign: 'center',
                template: function (row) {
                    var output = '';

                    output += '<div class="font-weight font-size-lg mb-0">' + row.total_amount + '</div>';
                    return output;
                }
            },
            {
                field: 'Action',
                title: 'Action',
                sortable: false,
                width: 60,
                overflow: 'visible',
                autoHide: false,
                template: function (data) {
                    return '\
	                        <div class="dropdown dropdown-inline">\
	                        <a href="'+ baseFolder + 'sale/editSale_Page/' + data.id + '" title="Edit" >\
							<i class="far fa-edit text-success mr-3"></i>\
	                        </a>\
	                        <a href="javascript:;" title="Delete" onclick="delete_sale('+ data.id + ')">\
							<i class="fas fa-trash text-danger"></i>\
	                        </a>\
	                    ';
                },
            }],
    });

});

function delete_sale(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then(function (result) {

        if (result.value) {
            $.ajax({
                type: "POST",
                url: baseFolder + 'sale/deleteSale',
                data: { id: id },
                dataType: "json",
                success: function (data) {
                    if (data.response == true) {
                        toastr.success('Successfully Deleted');
                        $('#sale_datatable').KTDatatable('reload');
                    }
                }

            });
        }
    });
}

function saleForm() {
    var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
    var form = KTUtil.getById('sale_form');
    var formSubmitButton = KTUtil.getById('sale_form_submit_button');

    if (!form) {
        return;
    }


    const fv = FormValidation.formValidation(
        form,
        {
            fields: {


            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                declarative: new FormValidation.plugins.Declarative(),
                bootstrap: new FormValidation.plugins.Bootstrap({
                    eleInvalidClass: '',
                    eleValidClass: '',
                })
            }
        }

    ).on('core.form.valid', function () {
        // Show loading state on button
        KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait");

        // Simulate Ajax request
        setTimeout(function () {
            KTUtil.btnRelease(formSubmitButton);
        }, 1000);


        var data = $('#sale_form').serialize();

        $.ajax({
            method: 'post',
            url: baseFolder + 'sale/addSale',
            data: data,
            dataType: "json",
            beforeSend: function () {
                $("#sale_form_submit_button").prop('disabled', true);
            },
            success: function (data) {
                if (data.response == true) {
                    toastr.success('Successfully saved');
                    window.location.href = baseFolder + 'sale';
                }
                $("#sale_form_submit_button").prop('disabled', false);
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                switch (xhr.status) {
                    case 401:
                        toastr.error('Authontication fail...');
                        break;
                    case 422:
                        toastr.info('The user is invalid.');
                        break;
                    default:
                        toastr.error('Error - ' + errorMessage);
                }
                $("#sale_form_submit_button").prop('disabled', false);
            }
        });


    });

    const item = {
        validators: {
            notEmpty: {
                message: 'Select Item',
            },

        },
    };

    var count = $(".itemRow").length;
    $(document).on('click', '#addRows', function () {

        $.ajax({
            type: 'ajax',
            url: baseFolder + 'item/itemList',
            dataType: 'json',
            success: function (data) {

                // console.log(data["data"]);
                count++;
                var htmlRows = '';
                htmlRows += '<tr>';
                htmlRows += '<td><input class="itemRow" type="checkbox"></td>';
                htmlRows += '<td><div class="form-group"><select class="form-control" name="data[' + count + '][item_id]" id="productId_' + count + '" autocomplete="off">\
                                        <option value="">Select Item</option>';

                for (let i = 0; i < data["data"].length; i++) {

                    htmlRows += '<option value="' + data["data"][i].id + '">' + data["data"][i].item_name + '</option>';

                }
                htmlRows += '</select></div></td>';
                htmlRows += '<td><div class="form-group"><input type="number" name="data[' + count + '][quantity]" id="quantity_' + count + '" class="form-control " placeholder="Qty" autocomplete="off"></div></td>';
                htmlRows += '<td><input type="number" name="data[' + count + '][price]" id="price_' + count + '"  class="form-control " placeholder="Price" autocomplete="off" readonly></td>';
                htmlRows += '<td><input type="number" name="data[' + count + '][total]" id="total_' + count + '"  class="form-control " placeholder="Total" autocomplete="off" readonly></td>';
                htmlRows += '<td><input type="number" name="data[' + count + '][sgst]" id="sgst_' + count + '"  class="form-control " placeholder="SGST" autocomplete="off" readonly></td>';
                htmlRows += '<td><input type="number" name="data[' + count + '][cgst]" id="cgst_' + count + '"  class="form-control " placeholder="CGST" autocomplete="off" readonly></td>';
                htmlRows += '<td><input type="number" name="data[' + count + '][igst]" id="igst_' + count + '"  class="form-control " placeholder="IGST" autocomplete="off" readonly></td>';
                htmlRows += '<td><input type="number" name="data[' + count + '][total_amount]" id="amount_' + count + '"  class="form-control " placeholder="Amount" autocomplete="off" readonly></td>';
                htmlRows += '</tr>';
                // console.log(data);

                $('#invoiceItem').append(htmlRows);
                fv.addField('data[' + count + '][item_id]', item).addField('data[' + count + '][quantity]', {
                    validators: {
                        notEmpty: {
                            message: 'Required',
                        },
                        greaterThan: {
                            message: 'Minimum 1',
                            min: 1,
                        },
                        integer: {
                            message: 'Enter valid Qty',
                            thousandsSeparator: '',
                            decimalSeparator: '.',
                        },
                    },
                });
                $("#productId_" + count).select2({
                    placeholder: "Select item",
                    width: '100%'
                });


            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                switch (xhr.status) {
                    case 401:
                        toastr.error('Authontication fail...');
                        break;
                    case 422:
                        toastr.info('The user is invalid.');
                        break;
                    default:
                        toastr.error('Error - ' + errorMessage);
                }
            }
        });


    });

    $(document).on('change', "[id^=productId_]", function () {
        var id = this.value;
        let tr_id = $(this).attr('id');
        let idArr = tr_id.split("_")[1];

        $.ajax({
            type: "POST",
            url: baseFolder + 'sale/setItem',
            data: { id: id },
            dataType: "json",
            success: function (res) {

                if (res == null) {
                    $('#quantity_' + idArr).val('');
                    $('#stock_' + idArr).text('');
                    $('#price_' + idArr).val('');
                    $('#cgst_' + idArr).val('');
                    $('#sgst_' + idArr).val('');
                    $('#igst_' + idArr).val('');
                    $('#total_' + idArr).val('');
                    $('#amount_' + idArr).val('');
                    calculateTotal();
                    $('#total_' + idArr).val('');
                    $('#amount_' + idArr).val('');
                    return;
                }
                $('#quantity_' + idArr).val(1);
               
                // $('#stock_' + idArr).text(res.total_quantity);
                $('#price_' + idArr).val(res.sale_price);
                $('#cgst_' + idArr).val(res.cgst);
                $('#sgst_' + idArr).val(res.sgst);
                $('#igst_' + idArr).val(res.igst);

                fv.addField('data[' + idArr + '][quantity]', {
                    validators: {
                        lessThan: {
                            message: 'Max '+res.total_quantity,
                            max: res.total_quantity,
                        },
                    },
                });
                calculateTotal();
            },
            error: function (xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                switch (xhr.status) {
                    case 401:
                        toastr.error('Authontication fail...');
                        break;
                    case 422:
                        toastr.info('The user is invalid.');
                        break;
                    default:
                        toastr.error('Error - ' + errorMessage);
                }
            }
        });

    });

    // fv.addField('data[2][quantity]', qty);
}



$(document).ready(function () {

    saleForm();

    $(document).on('click', '#checkAll', function () {
        $(".itemRow").prop("checked", this.checked);
    });
    $(document).on('click', '.itemRow', function () {
        if ($('.itemRow:checked').length == $('.itemRow').length) {
            $('#checkAll').prop('checked', true);
        } else {
            $('#checkAll').prop('checked', false);
        }
    });





    $(document).on('click', '#removeRows', function () {
        $(".itemRow:checked").each(function () {
            $(this).closest('tr').remove();
        });
        $('#checkAll').prop('checked', false);
        calculateTotal();
    });

    $(document).on('click', '#sale_form_reset_button', function () {
        document.getElementById("sale_form").reset();
        calculateTotal();
    });

    

    $(document).on('keyup', "[id^=quantity_]", function () {
        calculateTotal();
    });
    // $(document).on('blur', "[id^=price_]", function () {
    //     calculateTotal();
    // });
    // $(document).on('blur', "[id^=sgst_]", function () {
    //     calculateTotal();
    // });

    // $(document).on('blur', "#amountPaid", function () {
    //     var amountPaid = $(this).val();
    //     var totalAftertax = $('#totalAftertax').val();
    //     if (amountPaid && totalAftertax) {
    //         totalAftertax = totalAftertax - amountPaid;
    //         $('#amountDue').val(totalAftertax);
    //     } else {
    //         $('#amountDue').val(totalAftertax);
    //     }
    // });
    // $(document).on('click', '.deleteInvoice', function () {
    //     var id = $(this).attr("id");
    //     if (confirm("Are you sure you want to remove this?")) {
    //         $.ajax({
    //             url: "action.php",
    //             method: "POST",
    //             dataType: "json",
    //             data: {
    //                 id: id,
    //                 action: 'delete_invoice'
    //             },
    //             success: function (response) {
    //                 if (response.status == 1) {
    //                     $('#' + id).closest("tr").remove();
    //                 }
    //             }
    //         });
    //     } else {
    //         return false;
    //     }
    // });
});

function calculateTotal() {
    var finalAmount = 0;
    var totalAmount = 0;
    var totalSgst = 0;
    var totalCgst = 0;
    var totalIgst = 0;
    var totalTax = 0;
    var totalQuantity = 0;

    $("[id^='price_']").each(function () {
        var id = $(this).attr('id');
        id = id.replace("price_", '');
        var price = $('#price_' + id).val();
        var quantity = $('#quantity_' + id).val();
        if (!quantity) {
            quantity = 0;
        }
        var total = price * quantity;
        $('#total_' + id).val(parseFloat(total.toFixed(2)));

        var sgstTax = $('#sgst_' + id).val();
        var cgstTax = $('#cgst_' + id).val();
        // var igstTax = $('#igst_' + id).val();

        var Sgst = (total * sgstTax / 100);
        var Cgst = (total * cgstTax / 100);
        // var Igst = (total * igstTax / 100);

        var amount = total + Sgst + Cgst;
        $('#amount_' + id).val(parseFloat(amount.toFixed(2)));

        totalQuantity += parseFloat(quantity);
        totalAmount += total;

        totalSgst += Sgst;
        totalCgst += Cgst;
        // totalIgst += Igst;

        finalAmount += amount;

        totalTax = finalAmount - totalAmount;

    });
    $('#total_quantityShow').text(parseFloat(totalQuantity));
    $('#total_amountShow').text('₹' + parseFloat(totalAmount.toFixed(2)));
    $('#total_sgst').text('₹' + parseFloat(totalSgst.toFixed(2)));
    $('#total_cgst').text('₹' + parseFloat(totalCgst.toFixed(2)));
    $('#total_igst').text('₹' + parseFloat(totalIgst.toFixed(2)));
    $('#total_tax').text('₹' + parseFloat(totalTax.toFixed(2)));
    $('#final_amount').text('₹' + parseFloat(finalAmount.toFixed(2)));



    $('#total_quantity').val(parseFloat(totalQuantity));
    $('#total_price').val(parseFloat(totalAmount.toFixed(2)));

    $('#sgst_price').val(parseFloat(totalSgst.toFixed(2)));
    $('#cgst_price').val(parseFloat(totalCgst.toFixed(2)));
    $('#igst_price').val(parseFloat(totalIgst.toFixed(2)));

    $('#total_gst_amount').val(parseFloat(totalTax.toFixed(2)));

    $('#total_amount').val(parseFloat(finalAmount.toFixed(2)));

}
