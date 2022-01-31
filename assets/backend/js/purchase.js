"use strict";
// Class definition
//add vendor validation
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
					company_name: {
						validators: {
							notEmpty: {
								message: 'Company name is required'
							}
						}
					},
					code: {
						validators: {
							notEmpty: {
								message: 'Company code is required'
							}
						}
					},
					contact_person_name: {
						validators: {
							notEmpty: {
								message: 'Contact person name is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							emailAddress: {
								message: 'Entered Email is not valid email address'
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
					gst_no: {
						validators: {
							notEmpty: {
								message: 'GST number is required'
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
	}
	var getFormSignup = function () {
		// var x= $('#fullName').attr('value',$('.firstname').value);
		// document.getElementById('fullName').remove();
		var x = $('input[name=company_name]').val();
		var y = $('input[name=code]').val();
		var z = $('input[name=contact_person_name]').val();
		var p = $('input[name=email]').val();
		var q = $('input[name=mobile_main]').val();
		var r = $('input[name=mobile1]').val();
		var s = $('input[name=mobile2]').val();
		var t = $('input[name=website]').val();
		var u = $('input[name=referee_name]').val();

		var a = $('input[name=address]').val();
		var b = $('input[name=city]').val();
		var c = $('input[name=state]').val();
		var d = $('input[name=pincode]').val();
		var e = $('select[name=country] option:selected').val();

		var f = $('input[name=bank_name]').val();
		var g = $('input[name=bank_branch]').val();
		var h = $('input[name=acccount_no]').val();
		var i = $('input[name=ifsc_code]').val();
		var j = $('input[name=account_name]').val();
		var k = $('input[name=gst_no]').val();
		var l = $('input[name=cst_no]').val();
		var m = $('input[name=pan_no]').val();

		document.getElementById('company_information').innerHTML = `<h5>${x + " " + y} <br> ${z} <br> ${p} <br> ${q} <br> ${r}<br> ${s}<br> ${t}<br> ${u}</h5>`;
		document.getElementById('address_details').innerHTML = `<h5>${a} <br> ${b}, ${c} <br> ${e}<br> ${d}</h5>`;
		document.getElementById('bank_details').innerHTML = `<h5>${f} , ${g} <br> ${h} <br> ${i}<br> ${j}</h5>`;
		document.getElementById('document_details').innerHTML = `<h5>${k} <br> ${l} <br> ${m}</h5>`;
	}
	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('vendor_form_model');
			_formEl = KTUtil.getById('vendor_form');
			initWizard();
			initValidation();
			$('#next_button').on('click', function () {
				getFormSignup();
			});
			$('#vendor_menu_button').on('click', function () {
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

	const fv = FormValidation.formValidation(
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

		fv.on('core.form.reset', function () { });
	});


	$('#add_item_button').on('click', function () {
		$("[class^='fv-plugins-message-container']").text('');
		$('#items_form')[0].reset();
		fv.on('core.form.reset', function () { });
		$('.modal-title').text('Add item');
	});

}
function addvendor() {
	$('#AddvendorModal').modal('show');
	KTWizard3.init();
	// $('#vendor_id').select2('close');
}

function additem() {
	$('#itemsModal').modal('show');
}
jQuery(document).ready(function () {

	purchaseForm();
	itemForm();
	$(document).on('focus', '#vendor_name', function () {
		$(this).autocomplete({
			minLength: 0,
			source: function (request, response) {
				// Fetch data
				$.ajax({
					url: baseFolder + "purchase/vendorList",
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
					$('#vendor_name').val(ui.item.label); // display the selected text
					$('#vendor_id').val(ui.item.value); // save selected id to input
				}
				return false;
			},
			response: function (event, ui) {
				ui.content.push({
					value: 0,
					label: '<a href="javascript:void(0);" onclick="addvendor()" style="color:#207cf4 !important;font-style: normal;font-weight: 100;font-size: 14px;line-height: 19px;letter-spacing: 0.3px;"><i class="icon fas fa-plus text-primary"></i> New vendor</a>',
					// label: '<a href="javascript:;" style="padding: 6px;height: 20px;display: inline-table;" onclick="addcustomer()"><i class="icon-md fas fa-plus text-primary"></i> New customer</a>',
					desc: ''
				});
			}

		}).autocomplete("instance")._renderItem = function (ul, item) {
			return $("<li>").append("<h6 class='header-title'>" + item.label + "</h6>").appendTo(ul);
		}
	});


	$(document).on('focus', "[id^=item_name_]", function () {
		let tr_id = $(this).attr('id');
		let idArr = tr_id.split("_")[2];

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
					$('#item_name_' + idArr).val(ui.item.label); // display the selected text
					$('#item_id_' + idArr).val(ui.item.value); // save selected id to input

					var id = $('#item_id_' + idArr).val();

					$.ajax({
						method: 'post',
						url: baseFolder + 'purchase/setitem',
						data: {
							id: id
						},
						dataType: "json",
						success: function (data) {
							// console.log(data);
							if (data == null) {
								$('#quantity_' + idArr).val('');
								$('#rate_' + idArr).val('');
								$('#cgst_tax_' + idArr).val('');
								$('#sgst_tax_' + idArr).val('');
								$('#igst_tax_' + idArr).val('');
								$('#total_amount_' + idArr).val('');
								calculateTotal();
								return;
							}
							$('#quantity_' + idArr).val(1);
							$('#rate_' + idArr).val(data.purchase_price);
							$('#cgst_tax_' + idArr).val(data.cgst);
							$('#sgst_tax_' + idArr).val(data.sgst);
							$('#igst_tax_' + idArr).val(data.igst);
							$('#total_amount_' + idArr).val(data.purchase_price);

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
					label: '<a href="javascript:void(0);" onClick="additem()"style="color:#207cf4 !important;font-style: normal;font-weight: 100;font-size: 13px;line-height: 19px;letter-spacing: 0.3px;"><i class="icon fas fa-plus text-primary"></i> New Item</a>',
					// label: '<a href="javascript:;" style="padding: 6px;height: 20px;display: inline-table;" onclick="addcustomer()"><i class="icon-md fas fa-plus text-primary"></i> New customer</a>',
					desc: ''
				});
			}

		}).autocomplete("instance")._renderItem = function (ul, item) {
			return $("<li>").append("<h6 class='header-title'>" + item.label + "</h6>").appendTo(ul);
		}
	});
	// alert(count);

	//add vendor ajax
	$('#vendor_form_submit_button').on('click', function () {

		var data = $('#vendor_form').serialize();

		$.ajax({
			method: 'post',
			url: baseFolder + 'Vendor/addVendor',
			data: data,
			dataType: "json",
			beforeSend: function () {
				$("#vendor_form_submit_button").prop('disabled', true);
			},
			success: function (data) {
				if (data.response == true) {
					toastr.success('Successfully save');
					$('#AddvendorModal').modal('hide');
					location.reload(true);
				} else {
					if (data.company_name != "") {
						toastr.error(data.company_name);
					}
					if (data.email != "") {
						toastr.error(data.email);
					}
					if (data.acccount_no != "") {
						toastr.error(data.acccount_no);
					}
				}
				$("#vendor_form_submit_button").prop('disabled', false);
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
				$("#vendor_form_submit_button").prop('disabled', false);
			}
		});
	});



	$("#app-purchse-table").on("click", "#deleteItemfield", function () {
		$(this).closest("tr").remove();
		calculateTotal();
	});
	$('#reset_button').click(function () {
		document.getElementById("purchase_form").reset();
		calculateTotal();
	});

	$(document).on('keyup', "[id^=quantity_]", function () {
		calculateTotal();
	});

	var datatable = $('#purchase_datatable').KTDatatable({
		// datasource definition
		data: {
			type: 'remote',
			source: {
				read: {
					url: baseFolder + 'purchase/purchaseList',
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
				field: 'vendor_id',
				title: 'Vendor Name',
				sortable: 'asc',
				width: 100,
				template: function (data) {
					var output = '';
					output += '<span class="font-weight-bolder">' + data.vendor_name + '</span>';

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
			// {
			// 	field: 'Status',
			// 	title: 'Status',
			// 	// callback function support for column rendering
			// 	template: function(row) {
			// 		var status = {
			// 			1: {'title': 'Pending', 'class': ' label-light-primary'},
			// 			2: {'title': 'Delivered', 'class': ' label-light-danger'},
			// 			3: {'title': 'Canceled', 'class': ' label-light-primary'},
			// 			4: {'title': 'Success', 'class': ' label-light-success'},
			// 			5: {'title': 'Info', 'class': ' label-light-info'},
			// 			6: {'title': 'Danger', 'class': ' label-light-danger'},
			// 			7: {'title': 'Warning', 'class': ' label-light-warning'},
			// 		};
			// 		return '<span class="label label-lg font-weight-bold ' + status[row.Status].class + ' label-inline">' + status[row.Status].title + '</span>';
			// 	},
			// }, 
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
	                        <a href="'+ baseFolder + 'purchase/editpurchase/' + data.id + '" title="Edit">\
								<i class="far fa-edit text-success mr-3"></i>\
	                        </a>\
	                        <a href="javascript:;" title="Delete" onclick="delete_purchase('+ data.id + ')">\
								<i class="fas fa-trash text-danger"></i>\
	                        </a></div>\
	                    ';
				},
			}],
	});
});


function purchaseForm() {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
	var form = KTUtil.getById('purchase_form');
	var formSubmitButton = KTUtil.getById('purchase_form_submit_button');

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

		// Simulate Ajax request
		// setTimeout(function () {
		// 	KTUtil.btnRelease(formSubmitButton);
		// }, 5000);


		var data = $('#purchase_form').serialize();
		// alert(data);
		$.ajax({
			method: 'post',
			url: baseFolder + 'purchase/addpurchse',
			data: data,
			dataType: "json",
			beforeSend: function () {
				$("#purchase_form_submit_button").prop('disabled', true);
			},
			success: function (data) {
				if (data.response == true) {
					toastr.success('Successfully Save');
					window.location.href = baseFolder + "purchase";

				} else {
					toastr.error("Something went wrong! ");
				}
				$("#purchase_form_submit_button").prop('disabled', true);
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
				$("#purchase_form_submit_button").prop('disabled', false);
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

	var count = $('.item_row').length;
	$("#app-purchse-table").on("click", ".addItemfield", function () {

		count++;
		var htmlRows = '';
		htmlRows += '<tr class="item_row">';
		htmlRows += '<td><div class="form-group"><input type="text" id="item_name_' + count + '" class="form-control" placeholder="Selete Item"><input type="hidden" name="data[' + count + '][item_id]" id="item_id_' + count + '"></div></td>';
		htmlRows += '<td><div class="form-group"><input type="number" class="form-control" name="data[' + count + '][quantity]" id="quantity_' + count + '" placeholder="Qty"/></div></td>';
		htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][rate]" id="rate_' + count + '"  placeholder="Rate" readonly/></td>';
		htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][cgst_tax]" id="cgst_tax_' + count + '"  placeholder="CGST" readonly/></td>';
		htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][sgst_tax]" id="sgst_tax_' + count + '"  placeholder="SGST" readonly/></td>';
		htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][igst_tax]" id="igst_tax_' + count + '"  placeholder="IGST" readonly/> </td>';
		htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][total_amount]" id="total_amount_' + count + '"  placeholder="Amount" readonly/></td>';
		htmlRows += '<td><div class="row"><div class="col-4"><a href="javascript:;" id="addItemfield" class="btn btn-sm font-weight-bolder btn-light-primary addItemfield"><i class="la la-plus"></i></a></div>""<div class="col-4"><a href="javascript:;" id="deleteItemfield" class="btn btn-sm font-weight-bolder btn-light-danger"><i class="la la-trash-o"></i></a></div></div></td>';
		htmlRows += '</tr>';
		$('#app-purchse-table').append(htmlRows);
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
	});
}

function calculateTotal() {
	// alert("keyup");
	var finalAmount = 0;
	var totalAmount = 0;
	var totalCgst = 0;
	var totalSgst = 0;
	var totalIgst = 0;
	var totalQty = 0;
	$("[id^='rate_']").each(function () {
		var id = $(this).attr('id');
		id = id.replace("rate_", '');
		var rate = $('#rate_' + id).val();
		var quantity = $('#quantity_' + id).val();
		if (!quantity) {
			quantity = 1;
		}
		var total = rate * quantity;
		var cgst = $('#cgst_tax_' + id).val();
		var sgst = $('#sgst_tax_' + id).val();
		var igst = $('#igst_tax_' + id).val();

		var qty = $('#quantity_' + id).val();

		var cgst_price = total * cgst / 100;
		var sgst_price = total * sgst / 100;
		var igst_price = total * igst / 100;

		totalQty += parseFloat(qty);

		totalCgst += cgst_price;
		totalSgst += sgst_price;
		totalIgst += igst_price;
		totalAmount += total;

		$('#total_amount_' + id).val(parseFloat(total.toFixed(2)));
	});
	// alert(totalQty);
	var totalafter = totalAmount + totalCgst + totalSgst + totalIgst;
	finalAmount += totalafter;
	$('#amount').val(parseFloat(totalAmount.toFixed(2)));
	$('#cgst_taxs').val(parseFloat(totalCgst.toFixed(2)));
	$('#sgst_taxs').val(parseFloat(totalSgst.toFixed(2)));
	$('#igst_taxs').val(parseFloat(totalIgst.toFixed(2)));
	$('#total').val(parseFloat(finalAmount.toFixed(2)));
	$('#qty').val(parseFloat(totalQty.toFixed(2)));
}

function delete_purchase(id) {
	// alert(id);
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
				url: baseFolder + 'purchase/deletePurchase',
				data: { id: id },
				dataType: "json",
				success: function (data) {
					if (data.response == true) {
						toastr.success('Successfully Deleted');
						$('#purchase_datatable').KTDatatable('reload');
					}
				}
			});
		}
	});
}