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
							emailAddress:{
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
					bootstrap: new FormValidation.plugins.Bootstrap()
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

jQuery(document).ready(function () {	
	KTWizard3.init();
	var datatable = $('#vendor_datatable').KTDatatable({
		// datasource definition
		data: {
			type: 'remote',
			source: {
				read: {
					url: baseFolder + 'vendor/vendorList',
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
				title: '#',
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
				field: 'company_name',
				title: 'Company Name',
				sortable: 'asc',
				width: 150,
				template: function (data) {
					var output = '';
					output += '<span class="font-weight-bolder">' + data.company_name + '</span>';
					output += '<div class="font-weight-bold text-muted">Code: ' + data.code + '</div>';

					return output;
				}
			},
			{
				field: 'contact_person_name',
				title: 'Company Person Name',
				width: 150,
				template: function (row) {
					var output = '';

					output += '<div class="font-weight ">' + row.contact_person_name + '</div>';

					return output;
				}
			},
			{
				field: 'email',
				title: 'Email',
				width: 220,
				template: function (row) {
					var output = '';

					output += '<div class="font-weight font-size-lg mb-0">' + row.email + '</div>';
					output += '<div class="font-weight-bold text-muted">Phone: ' + row.mobile_main + '</div>';

					return output;
				}
			}, {
				field: 'Country',
				title: 'Country',
				width: 80,
				template: function (row) {
					var output = '';

					output += '<div class="font-weight font-size-lg mb-0">' + (row.country) + '</div>';
					return output;
				}
			}, {
				field: 'created_at',
				title: 'Created Date & Time',
				type: 'date',
				width: 90,
				format: 'MM/DD/YYYY',
				template: function (row) {
					var output = '';

					output += '<div class="font-weight text-primary mb-0">' + row.created_at + '<div class="font-weight-bold text-muted" style="font-size:11px;">' + row.vendor_creator + '</div></div>';

					return output;
				},
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
						<a href="javascript:;" title="Edit" onclick="edit_vendor('+ data.id + ')">\
						<i class="far fa-edit text-success mr-3"></i>\
						</a>\
						<a href="javascript:;" title="Delete" onclick="delete_vendor('+ data.id + ')">\
						<i class="fas fa-trash text-danger"></i>\
						</a>\
					';
				},
			}],
	});
	var title = $('#vendor_dynamic_title').text();
	var subtitle = $('#vendor_dynamic_subtitle_span').text();

	$('#add_vendor_button').on('click', function () {
		modelshow();
	});
	$('#vendor_list_button').on('click', function () {
		datatableshow(title ,subtitle);
	});

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
					datatableshow(title ,subtitle);
					$('#vendor_datatable').KTDatatable('reload');
				} else {
					toastr.error("Enter Proper Data!!!!");
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

	


});

function modelshow() {
	$('#vendor_form')[0].reset();
	$('#vendor_datatable').hide();
	$('#vendor_form_model').removeClass('d-none');
	$('#add_vendor_button').hide();
	$('#vendor_list_button').removeClass('d-none');
	$('#vendor_dynamic_title').text('Vendor Signup');
	$('#vendor_dynamic_subtitle_span').text('Great work ahead');
}
function datatableshow(title ,subtitle) {
	$('#vendor_form_model').addClass('d-none');
		$('#vendor_datatable').show();
		$('#add_vendor_button').show();
		$('#vendor_list_button').addClass('d-none');
		$('#vendor_dynamic_title').text(title);
		$('#vendor_dynamic_subtitle_span').text(subtitle);
}
function edit_vendor(id) {
	$('#vendor_datatable').hide();
	$('#vendor_form_model').removeClass('d-none');
	$('#add_vendor_button').hide();
	$('#vendor_list_button').removeClass('d-none');

	$('#vendor_dynamic_title').text('Edit Vendor');
	$('#vendor_dynamic_subtitle_span').text('Correct information lead to great business!');
	
	$.ajax({
		type: "POST",
		url: baseFolder + 'vendor/editVendor',
		data: { id: id },
		dataType: "json",
		success: function (data) {
			$('#id').val(data.id);
			$('#company_name').val(data.company_name);
			$('#code').val(data.code);
			$('#contact_person_name').val(data.contact_person_name);
			$('#email').val(data.email);
			$('#mobile_main').val(data.mobile_main);
			$('#mobile1').val(data.mobile1);
			$('#mobile2').val(data.mobile2);
			$('#website').val(data.website);
			$('#referee_name').val(data.referee_name);

			$('#address').val(data.address);
			$('#city').val(data.city);
			$('#state').val(data.state);
			$('#pincode').val(data.pincode);
			$('#country').val(data.country);

			$('#bank_name').val(data.bank_name);
			$('#bank_branch').val(data.bank_branch);
			$('#acccount_no').val(data.acccount_no);
			$('#ifsc_code').val(data.ifsc_code);
			$('#account_name').val(data.account_name);
			$('#gst_no').val(data.gst_no);
			$('#cst_no').val(data.cst_no);
			$('#pan_no').val(data.pan_no);

		}
	});

}

function delete_vendor(id) {
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
				url: baseFolder + 'vendor/deleteVendor',
				data: { id: id },
				dataType: "json",
				success: function (data) {
					if (data.response == true) {
						toastr.success('Successfully Deleted');
						$('#vendor_datatable').KTDatatable('reload');
					}
				}

			});
		}
	});

}
