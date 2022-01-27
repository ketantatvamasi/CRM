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
					firstname: {
						validators: {
							notEmpty: {
								message: 'First name is required'
							}
						}
					},
					lastname: {
						validators: {
							notEmpty: {
								message: 'Last name is required'
							}
						}
					},
					organization_name: {
						validators: {
							notEmpty: {
								message: 'Organization name is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Email is required'
							},
							regexp: {
								regexp: /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
								message: 'The Email is not a valid email address',
							}
						}
					},
					phone: {
						validators: {
							notEmpty: {
								message: 'Number is required'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
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
								message: 'Postcode is required'
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
	}
	var getFormSignup = function () {
		// var x= $('#fullName').attr('value',$('.firstname').value);
		// document.getElementById('fullName').remove();
		var x = $('input[name=firstname]').val();
		var y = $('input[name=lastname]').val();
		var z = $('input[name=email]').val();
		var p = $('input[name=number]').val();
		var q = $('input[name=password]').val();
		var r = $('input[name=organization]').val();
		var a = $('input[name=address]').val();
		var b = $('input[name=city]').val();
		var c = $('input[name=state]').val();
		var d = $('input[name=pincode]').val();
		var e = $('select[name=country] option:selected').text();
		document.getElementById('information').innerHTML = `<h5>${x + " " + y} <br> ${z} <br> ${p} <br> ${r} <br> ${q}</h5>`;
		document.getElementById('addressdetails').innerHTML = `<h5>${a} <br> ${b}, ${c} <br> ${e}<br> ${d}</h5>`;
	}
	return {
		// public functions
		init: function () {
			_wizardEl = KTUtil.getById('kt_wizard_v3');
			_formEl = KTUtil.getById('user_add_form');

			initWizard();
			initValidation();
			$('#nextbutton').on('click', function () {
				getFormSignup();
			});
		}
	};
}();



jQuery(document).ready(function () {
	KTWizard3.init();


	var datatable = $('#userlist').KTDatatable({
		// datasource definition
		data: {
			type: 'remote',
			source: {
				read: {
					url: baseFolder + 'Users/UserList',
				},
			},
			pageSize: 5, // display 20 records per page
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
				field: 'user_id',
				title: 'id',
				sortable: false,
				width: 40,
				type: 'number',
				selector: false,
				textAlign: 'left',
				template: function (data) {
					return data.id;

				}
			}, {
				field: 'firstname',
				title: 'Name',
				template: function (row) {
					var output = '';
					output += '<span class="font-weight-bolder">' + row.firstname + '</span>';
					output += '<div class="font-weight-bold text-muted" style="font-size:11px;">(' + row.role_name + ')</div>';
					return output;
					// return row.firstname;
				}
			}, {
				field: 'organization_name',
				title: 'Orgazation name',
				width: 170,
				template: function (data) {
					return data.organization_name;
				}
			}, {
				field: 'email',
				title: 'Email',
				width: 250,
				template: function (row) {
					return row.email;
				},
			}, {
				field: 'phone',
				title: 'Phone no',
				template: function (row) {

					return row.phone;
				}
			}, {
				field: 'Action',
				title: 'Action',
				sortable: false,
				width: 60,
				overflow: 'visible',
				autoHide: false,
				template: function (row) {
					return '\
						<a href="javascript:;" title="Edit" onclick="user_edit(' + row.user_id + ')"><i class="far fa-edit text-success mr-3"></i></a>\
						<a href="javascript:;" title="Delete" onclick="user_delete(' + row.user_id + ')"><i class="fas fa-trash text-danger"></i></a>\
					';
				},
			}
		],

	});


	var title = $('#user_dynamic_title').text();
	var subtitle = $('#user_dynamic_subtitle_span').text();
	$('#adduser').on('click', function () {
		$("[class^='fv-plugins-message-container']").text('');
		modelshow(subtitle);
	});
	$('#listuser').on('click', function () {
		$("[class^='fv-plugins-message-container']").text('');
		datatableshow(title);
	});


	$('#users_form_submit_button').on('click', function () {
		var data = $('#user_add_form').serialize();

		$.ajax({
			method: 'post',
			url: baseFolder + 'Users/adduser',
			data: data,
			dataType: "json",
			beforeSend: function () {
				$("#users_form_submit_button").prop('disabled', true);
			},
			success: function (data) {
				if (data.response == true) {
					datatableshow(title);
					toastr.success('Successfully save');
					$('#userlist').KTDatatable('reload');
				} else {
					toastr.error("Enter Proper Data!!!!");
				}
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
				$("#users_form_submit_button").prop('disabled', false);
			}
		});
	});
});

function modelshow(subtitle) {
	$('#user_add_form')[0].reset();
	$("#kt_wizard_v3").removeClass("d-none");
	$("#listuser").removeClass("d-none");
	$('#userlist').hide();
	$('#adduser').hide();
	$('#user_dynamic_title').text('Add User');
	$('#user_dynamic_subtitle_span').text(subtitle);
	$('#user_add_form')[0].reset();
}
function datatableshow(title) {
	$("#kt_wizard_v3").addClass("d-none");
	$("#listuser").addClass("d-none");
	$('#userlist').show();
	$('#adduser').show();
	$('#user_dynamic_title').text(title);
}
function user_edit(user_id) {
	var subtitle = $('#user_dynamic_subtitle_span').text();
	$("#listuser").removeClass("d-none");
	$("#kt_wizard_v3").removeClass("d-none");
	$('#userlist').hide();
	$('#kt_wizard_v3').show();
	$('#adduser').hide();
	$('#user_dynamic_title').text('Edit User');
	$('#user_dynamic_subtitle_span').text(subtitle);

	$.ajax({
		type: "POST",
		url: baseFolder + 'Users/edituser',
		data: { user_id: user_id },
		dataType: "json",
		success: function (data) {
			// console.log(data);
			$('#user_id').val(data.user_id);
			$('#firstname').val(data.firstname);
			$('#lastname').val(data.lastname);
			$('#organization_name').val(data.organization_name);
			$('#email').val(data.email);
			$('#phone').val(data.phone);
			$('#password').val(data.password);
			$('#address').val(data.address);
			$('#pincode').val(data.pincode);
			$('#city').val(data.city);
			$('#state').val(data.state);
			$('#country').val(data.country);


		}
	});
}
function user_delete(user_id) {

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
				url: baseFolder + 'Users/deleteuser',
				data: { user_id: user_id },
				dataType: "json",
				success: function (data) {
					// console.log(data);
					if (data.response == 'success') {
						toastr.success('Successfully Deleted');
						$('#userlist').KTDatatable('reload');
					}
				}
			});
		}
	});
}
