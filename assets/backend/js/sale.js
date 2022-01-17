$(document).ready(function () {
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
    var count = $(".itemRow").length;

    $(document).on('click', '#addRows', function () {

        $.ajax({
            type: 'ajax',
            url: baseFolder + 'item/itemList',
            dataType: 'json',
            success: function (data) {
                // alert(data["data"][0].item_name);
                count++;
                var htmlRows = '';
                htmlRows += '<tr>';
                htmlRows += '<td><input class="itemRow" type="checkbox"></td>';
                htmlRows += '<td><select class="form-control" name="productName" id="productName_' + count + '" autocomplete="off">\
                                        <option value="">Select Item</option>';

                for (i = 0; i < data["data"].length; i++) {

                    htmlRows += '<option value="' + data["data"][i].id + '">' + data["data"][i].item_name + '</option>';

                }
                htmlRows += '</select></td>';
                htmlRows += '<td><input type="number" name="quantity" id="quantity_' + count + '" class="form-control quantity" autocomplete="off"></td>';
                htmlRows += '<td><input type="number" name="price" id="price_' + count + '"  class="form-control price" autocomplete="off" readonly></td>';
                htmlRows += '<td><input type="number" name="total" id="total_' + count + '"  class="form-control total" autocomplete="off" readonly></td>';
                htmlRows += '<td><input type="number" name="sgst" id="sgst_' + count + '"  class="form-control total" autocomplete="off" readonly></td>';
                htmlRows += '<td><input type="number" name="cgst" id="cgst_' + count + '"  class="form-control total" autocomplete="off" readonly></td>';
                htmlRows += '<td><input type="number" name="igst" id="igst_' + count + '"  class="form-control total" autocomplete="off" readonly></td>';
                htmlRows += '<td><input type="number" name="amount" id="amount_' + count + '"  class="form-control total" autocomplete="off" readonly></td>';
                htmlRows += '</tr>';
                $('#invoiceItem').append(htmlRows);
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

    $(document).on('click', '#removeRows', function () {
        $(".itemRow:checked").each(function () {
            $(this).closest('tr').remove();
        });
        $('#checkAll').prop('checked', false);
        calculateTotal();
    });

    $(document).on('change', "[id^=productName_]", function () {
        var id = this.value;
        let tr_id = $(this).attr('id');
        let idArr = tr_id.split("_")[1];
        $('#price_' + idArr).val('');
        $('#cgst_' + idArr).val('');
        $('#sgst_' + idArr).val('');

        $.ajax({
            type: "POST",
            url: baseFolder + 'item/editItem',
            data: { id: id },
            dataType: "json",
            success: function (res) {
                // alert(res);
                console.log(res);
                if (res == null) {
                    $('#price_' + idArr).val('');
                    $('#cgst_' + idArr).val('');
                    $('#sgst_' + idArr).val('');
                    return;
                }
                $('#price_' + idArr).val(res.sale_price);
                $('#cgst_' + idArr).val(res.cgst);
                $('#sgst_' + idArr).val(res.sgst);

                // $('#igst_1').val(res.igst);


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
    var totalTax=0;
    $("[id^='price_']").each(function () {
        var id = $(this).attr('id');
        id = id.replace("price_", '');
        var price = $('#price_' + id).val();
        var quantity = $('#quantity_' + id).val();
        if (!quantity) {
            quantity = 1;
        }
        var total = price * quantity;
        $('#total_' + id).val(parseFloat(total.toFixed(2)));

        var tax = (total * 0.18);
        var amount = total + tax;
        $('#amount_' + id).val(parseFloat(amount.toFixed(2)));

        totalAmount += total;

        finalAmount += amount;
        
        totalTax =finalAmount - totalAmount;

    });
    $('#total_amount').text('₹' + parseFloat(totalAmount.toFixed(2)));
    $('#total_tax').text('₹' + parseFloat(totalTax.toFixed(2)));
    $('#final_amount').text('₹' + parseFloat(finalAmount.toFixed(2)));
    
}