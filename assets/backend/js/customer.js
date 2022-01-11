"use strict";
// Class definition

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
					bootstrap: new FormValidation.plugins.Bootstrap()
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
					bootstrap: new FormValidation.plugins.Bootstrap()
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
					bootstrap: new FormValidation.plugins.Bootstrap()
				}
			}
		));
	}
	var getFormSignup = function () {
		// var x= $('#fullName').attr('value',$('.firstname').value);
		// document.getElementById('fullName').remove();
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

var KTAppsUsersListDatatable = function () {
	// Private functions

	// basic demo
	var _demo = function () {
		var datatable = $('#customer_datatable').KTDatatable({
			// datasource definition
			data: {
				type: 'remote',
				source: {
					read: {
						url: baseFolder + 'customer/customerList',
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
					width: 50,
					type: 'number',
					selector: false,
					textAlign: 'left',
					template: function (data) {
						return '<span class="font-weight-bolder">' + data.number + '</span>';
					}
				},
				{
					field: 'customer_name',
					title: 'Customer Name',
					sortable: 'asc',
					width: 150,
					template: function (data) {
						var output = '';
						output += '<span class="font-weight-bolder">' + data.customer_name + '</span>';

						return output;
					}
				},
				{
					field: 'customer_category',
					title: 'Customer category',
					width: 150,
					template: function (row) {
						var output = '';

						output += '<div class="font-weight ">' + row.customer_category + '</div>';

						return output;
					}
				},
				{
					field: 'email',
					title: 'Email',
					width: 200,
					template: function (row) {
						var output = '';

						output += '<div class="font-weight font-size-lg mb-0">' + row.email + '</div>';
                        output += '<div class="font-weight-bold text-muted">Phone: ' + row.mobile_main + '</div>';
						return output;
					}
				}, {
					field: 'gst_no',
					title: 'GST_no',
					width: 80,
					template: function (row) {
						var output = '';

						output += '<div class="font-weight font-size-lg mb-0">' + row.gst_no + '</div>';
						return output;
					}
				}, {
					field: 'address',
					title: 'address',
					width: 80,
					template: function (row) {
						var output = '';

						output += '<div class="font-weight font-size-lg mb-0">' + (row.address) + '</div>';
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
	                        <a href="javascript:;" title="Edit" onclick="edit_customer('+ data.id + ')">\
							<i class="far fa-edit text-success mr-3"></i>\
	                        </a>\
	                        <a href="javascript:;" title="Delete" onclick="delete_customer('+ data.id + ')">\
							<i class="fas fa-trash text-danger"></i>\
	                        </a>\
	                    ';
					},
				}],
		});

		$('#kt_datatable_search_status').on('change', function () {
			datatable.search($(this).val().toLowerCase(), 'Status');
		});

		$('#kt_datatable_search_type').on('change', function () {
			datatable.search($(this).val().toLowerCase(), 'Type');
		});

		$('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
	};

	return {
		// public functions
		init: function () {
			_demo();

		},
	};
}();

jQuery(document).ready(function () {
    KTWizard3.init();
	KTAppsUsersListDatatable.init();
	var title = $('#customer_dynamic_title').text();
	var subtitle = $('#customer_dynamic_subtitle_span').text();

	$('#add_customer_button').on('click', function () {
		$('#customer_datatable').hide();
		$('#customer_form_model').removeClass('d-none');

		$('#add_customer_button').hide();
		$('#customer_list_button').removeClass('d-none');
		$('#customer_dynamic_title').text('Add customer');
		$('#customer_dynamic_subtitle_span').text('Great work ahead');

	});
	$('#customer_list_button').on('click', function () {
		$('#customer_form_model').addClass('d-none');
		$('#customer_datatable').show();
		$('#add_customer_button').show();
		$('#customer_list_button').addClass('d-none');
		$('#customer_dynamic_title').text(title);
		$('#customer_dynamic_subtitle_span').text('subtitle');
	});
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
				setTimeout(function () {
					window.location.href = baseFolder + "Customer";
				}, 1000);
				toastr.success('Successfully save');
			} else {
				toastr.error("Enter Proper Data!!!!");
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


function edit_customer(id) {
	$('#customer_datatable').hide();
	$('#customer_form_model').removeClass('d-none');
	$('#add_customer_button').hide();
	$('#customer_list_button').removeClass('d-none');

	$('#customer_dynamic_title').text('Edit Customer');
	$('#customer_dynamic_subtitle_span').text('Correct information lead to great business!');

	// $('#customer_form').attr('action', baseFolder + 'Customer/addCustomer');
	
	$.ajax({
		type: "POST",
		url: baseFolder + 'customer/editCustomer',
		data: { id: id },
		dataType: "json",
		success: function (data) {
			$('#id').val(data.id);
			$('#customer_name').val(data.customer_name);
			$('#customer_category').val(data.customer_category);
			$('#email').val(data.email);
			$('#mobile_main').val(data.mobile_main);
			$('#mobile1').val(data.mobile1);
            $('#gst_no').val(data.gst_no);
            $('#pan_no').val(data.pan_no);
			$('#referee_name').val(data.referee_name);

			$('#address').val(data.address);
			$('#city').val(data.city);
			$('#state').val(data.state);
			$('#pincode').val(data.pincode);
			$('#country').val(data.country);
		}
	});

}


function delete_customer(id) {
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
				url: baseFolder + 'customer/deleteCustomer',
				data: { id: id },
				dataType: "json",
				success: function (data) {
					if (data.response == true) {
						toastr.success('Successfully Deleted');
						setTimeout(function () {
							window.location.href = baseFolder + "Customer";
						}, 1000);
					}
				}

			});
		}
	});
}