"use strict";
// Class definition
//add Customer validation
var KTWizard3 = function () {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizard;
    var _validations = [];
    // Private functions
    var initWizard = function () {
        // Initialize form wizard
        _wizard = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: true  // allow step clicking
        });
        // Validation before going to next page
        _wizard.on('beforeNext', function (wizard) {
            // Don't go to the next step yet
            _wizard.stop();
            // Validate form
            var validator = _validations[wizard.getStep() - 1]; // get validator for currnt step
            validator.validate().then(function (status) {
                if (status == 'Valid') {
                    _wizard.goNext();
                    KTUtil.scrollTop();
                }
            });
        });
        // Change event
        _wizard.on('change', function (wizard) {
            KTUtil.scrollTop();
        });
    }
    var initValidation = function () {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Step 1
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    customer_name: {
                        validators: {
                            notEmpty: {
                                message: 'Customer name is required'
                            }
                        }
                    },
                    customer_category: {
                        validators: {
                            notEmpty: {
                                message: 'Customer category  is required'
                            }
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email is required'
                            }
                        }
                    },
                    mobile_main: {
                        validators: {
                            notEmpty: {
                                message: 'Mobile number is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));
        // Step 2
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    address: {
                        validators: {
                            notEmpty: {
                                message: 'Address is required'
                            }
                        }
                    },
                    pincode: {
                        validators: {
                            notEmpty: {
                                message: 'Pincode is required'
                            }
                        }
                    },
                    city: {
                        validators: {
                            notEmpty: {
                                message: 'City is required'
                            }
                        }
                    },
                    state: {
                        validators: {
                            notEmpty: {
                                message: 'State is required'
                            }
                        }
                    },
                    country: {
                        validators: {
                            notEmpty: {
                                message: 'Country is required'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));
        // Step 3
        _validations.push(FormValidation.formValidation(
            _formEl,
            {
                fields: {
                    bank_name: {
                        validators: {
                            notEmpty: {
                                message: 'Bank name is required'
                            }
                        }
                    },
                    bank_branch: {
                        validators: {
                            notEmpty: {
                                message: 'Bank branch is required'
                            }
                        }
                    },
                    acccount_no: {
                        validators: {
                            notEmpty: {
                                message: 'Acccount number is required'
                            }
                        }
                    },
                    ifsc_code: {
                        validators: {
                            notEmpty: {
                                message: 'IFSC code is required'
                            }
                        }
                    },
                    account_name: {
                        validators: {
                            notEmpty: {
                                message: 'Account name is required'
                            }
                        }
                    },
                    // gst_no: {
                    // 	validators: {
                    // 		notEmpty: {
                    // 			message: 'GST number is required'
                    // 		}
                    // 	}
                    // }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        ));
    }
    var getFormSignup = function () {

        var x = $('input[name=customer_name]').val();
        var y = $('input[name=customer_category]').val();
        var p = $('input[name=email]').val();
        var q = $('input[name=mobile_main]').val();
        var r = $('input[name=mobile1]').val();
        var s = $('input[name=gst_no]').val();
        var t = $('input[name=pan_no]').val();
        var u = $('input[name=referee_name]').val();

        var a = $('input[name=address]').val();
        var b = $('input[name=city]').val();
        var c = $('input[name=state]').val();
        var d = $('input[name=pincode]').val();
        var e = $('select[name=country] option:selected').val();

        document.getElementById('customer_information').innerHTML = `<h5>${x} <br>${y} <br> ${p} <br> ${q} <br> ${r}<br> ${s}<br> ${t}<br> ${u}</h5>`;
        document.getElementById('address_details').innerHTML = `<h5>${a} <br> ${b}, ${c} <br> ${e}<br> ${d}</h5>`;
    }
    return {
        // public functions
        init: function () {
            _wizardEl = KTUtil.getById('customer_form_model');
            _formEl = KTUtil.getById('customer_form');
            initWizard();
            initValidation();
            $('#next_button').on('click', function () {
                getFormSignup();
            });
            $('#customer_menu_button').on('click', function () {
                getFormSignup();
            });
        }
    };
}();

var itemForm = function () {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
	var form = KTUtil.getById('items_form');
	var formSubmitButton = KTUtil.getById('items_button');

	if (!form) {
		return;
	}

	const fv=FormValidation.formValidation(
		form,
		{
			fields: {
				item_name: {
					validators: {
						notEmpty: {
							message: 'Item name is required'
						}
					}
				},
				item_code: {
					validators: {
						notEmpty: {
							message: 'Item code is required'
						}
					}
				},
				purchase_price: {
					validators: {
						notEmpty: {
							message: 'Purchase price is required'
						}
					}
				},
				sale_price: {
					validators: {
						notEmpty: {
							message: 'Sale price is required'
						}
					}
				},
				opening_quantity: {
					validators: {
						notEmpty: {
							message: 'Opening quantity is required'
						}
					}
				}
			},
			plugins: {
				trigger: new FormValidation.plugins.Trigger(),
				submitButton: new FormValidation.plugins.SubmitButton(),
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


		var data = $('#items_form').serialize();
		// alert(data);
		$.ajax({
			method: 'post',
			url: baseFolder + 'item/addItem',
			data: data,
			dataType: "json",
			beforeSend: function () {
				$("#items_button").prop('disabled', true);
			},
			success: function (data) {
				if (data.response == true) {
					toastr.success('Successfully save');
					$('#items_form')[0].reset();
					$('#itemsModal').modal('toggle');
					$('#item_datatable').KTDatatable('reload');
				} else {
					toastr.error("Enter Proper Data!!!!");
				}
				$("#items_button").prop('disabled', false);
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
				$("#items_button").prop('disabled', false);
			}
		});

	});


	$('#add_item_button').on('click', function () {
		$("[class^='fv-plugins-message-container']").text('');  //reset('empty') validation
		$('#items_form')[0].reset();
		fv.on('core.form.reset',function(){});
		$('.modal-title').text('Add item');
	});

}

function addcustomer() {
    $('#AddcustomerModal').modal('show');
    KTWizard3.init();
}
function itemModel() {
    $('#itemsModal').modal('show');
}

jQuery(document).ready(function () {

    saleForm();
    itemForm();

    $(document).on('focus', '#customer_name', function () {
        $(this).autocomplete({
            minLength: 0,
            source: function (request, response) {
                // Fetch data
                $.ajax({
                    url: baseFolder + "sale/customerList",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                // Set selection
                if (ui.item.value > 0) {
                    $('#customer_name').val(ui.item.label); // display the selected text
                    $('#customer_id').val(ui.item.value); // save selected id to input
                }
                return false;
            },
            response: function (event, ui) {
                ui.content.push({
                    value: 0,
                    label: '<a href="javascript:void(0);" onclick="addcustomer()" style="color:#207cf4 !important;font-style: normal;font-weight: 100;font-size: 14px;line-height: 19px;letter-spacing: 0.3px;"><i class="icon fas fa-plus text-primary"></i> New customer</a>',
                    // label: '<a href="javascript:;" style="padding: 6px;height: 20px;display: inline-table;" onclick="addcustomer()"><i class="icon-md fas fa-plus text-primary"></i> New customer</a>',
                    desc: ''
                });
            }

        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>").append("<h6 class='header-title'>" + item.label + "</h6>").appendTo(ul);
        }
    });
    $('#customer_form_submit_button').on('click', function () {
        var data = $('#customer_form').serialize();

        $.ajax({
            method: 'post',
            url: baseFolder + 'Customer/addCustomer',
            data: data,
            dataType: "json",
            beforeSend: function () {
                $("#customer_form_submit_button").prop('disabled', true);
            },
            success: function (data) {
                if (data.response == true) {
                    toastr.success('Successfully save');
                    $('#AddcustomerModal').modal('hide');
                    location.reload(true);
                } else {
                    if (data.email != "") {
                        toastr.error(data.email);
                    }
                }
                $("#customer_form_submit_button").prop('disabled', false);
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
                $("#customer_form_submit_button").prop('disabled', false);
            }
        });
    });

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
        KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses, "Please wait..");

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
                $("#sale_form_submit_button").prop('disabled', true);
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
                    case 410:
                        toastr.error('Network Error');
                        break;
                    default:
                        toastr.error('Error - ' + errorMessage);
                }

                setTimeout(function () {
                    KTUtil.btnRelease(formSubmitButton);
                }, 1000);
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

    $(document).on('focus', '[id^=productname_]', function () {

        let tr_id = $(this).attr('id');
        let idArr = tr_id.split("_")[1];

        $(this).autocomplete({
            minLength: 0,
            source: function (request, response) {
                // Fetch data
                $.ajax({
                    url: baseFolder + "item/getItemList",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                // Set selection
                if (ui.item.value > 0) {
                    $('#productname_' + idArr).val(ui.item.label); // display the selected text
                    $('#productId_' + idArr).val(ui.item.value); // save selected id to input

                    var id = $('#productId_' + idArr).val();

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
                            $('#price_' + idArr).val(res.sale_price);
                            $('#cgst_' + idArr).val(res.cgst);
                            $('#sgst_' + idArr).val(res.sgst);
                            $('#igst_' + idArr).val(res.igst);

                            fv.addField('data[' + idArr + '][quantity]', {
                                validators: {
                                    lessThan: {
                                        message: 'Available ' + res.total_quantity,
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
                }
                return false;
            },
            response: function (event, ui) {
                ui.content.push({
                    value: 0,
                    label: '<a href="javascript:void(0);" onclick="itemModel()" style="color:#207cf4 !important;font-style: normal;font-weight: 100;font-size: 14px;line-height: 19px;letter-spacing: 0.3px;"><i class="icon fas fa-plus text-primary"></i> New Item</a>',
                    // label: '<a href="javascript:;" style="padding: 6px;height: 20px;display: inline-table;" onclick="addcustomer()"><i class="icon-md fas fa-plus text-primary"></i> New customer</a>',
                    desc: ''
                });
            }

        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>").append("<h6 class='header-title'>" + item.label + "</h6>").appendTo(ul);
        }
    });

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
                htmlRows += '<td><div class="form-group">';
                htmlRows += '<input type="text" id="productname_' + count + '" class="form-control" placeholder="Items">';
                htmlRows += '<input type="hidden" name="data[' + count + '][item_id]" id="productId_' + count + '">';
                htmlRows += '</div></td>';
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

}


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


