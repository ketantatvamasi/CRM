var roleForm = function () {
	var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
	var form = KTUtil.getById('role_form');
	var formSubmitButton = KTUtil.getById('role_form_submit_button');

	if (!form) {
		return;
	}

		FormValidation.formValidation(
		form,
		{
			fields: {
				role_name: {
					validators: {
						notEmpty: {
							message: 'Role name is required'
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


		var data = $('#role_form').serialize();
		$.ajax({
			method: 'post',
			url: baseFolder + 'role/addRole',
			data: data,
			dataType: "json",
			beforeSend: function () {
				$("#role_form_submit_button").prop('disabled', true);
			},
			success: function (data) {
				if (data.response == true) {
					toastr.success('Successfully save');
					$('#role_form')[0].reset();
					$("#addRole").removeClass("d-none");
					$("#role_form").addClass("d-none");
					$('#role_datatable').show();
					$('#role_datatable').KTDatatable('reload');
				} else {
					toastr.error("Enter Proper Data!!!!");
				}
				$("#role_form_submit_button").prop('disabled', false);
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
				$("#role_form_submit_button").prop('disabled', false);
			}
		});

	});
}
jQuery(document).ready(function () {
	
	var datatable = $('#role_datatable').KTDatatable({
		// datasource definition
		data: {
			type: 'remote',
			source: {
				read: {
					url: baseFolder + 'role/roleList',
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
				field: 'id',
				title: 'id',
				sortable: false,
				autoHide: false,
				width: 40,
				type: 'number',
				selector: false,
				textAlign: 'left',
				template: function (data) {
					return data.id;

				}
			}, {
				field: 'role_name',
				title: 'Role',
				width: 200,
				autoHide: false,
				template: function (row) {
					var output = '';
					output += '<span class="font-weight-bolder">' + row.role_name + '</span>';

					return output;
					// return row.firstname;
				}
			},
			{
				field: 'Action',
				title: 'Action',
				sortable: false,
				width: 60,
				overflow: 'visible',
				template: function (row) {
					return '\
					<div class="dropdown dropdown-inline"><a href="javascript:;" title="Edit" onclick="role_edit(' + row.role_id + ')"><i class="far fa-edit text-success mr-3"></i></a>\
						<a href="javascript:;" title="Delete" onclick="role_delete(' + row.role_id + ')"><i class="fas fa-trash text-danger"></i></a></div>';
				},
			}
		],

	});
	roleForm();

	$('#addRole').on('click', function () {
		$("#role_form").removeClass("d-none");
		$('#role_datatable').hide();
		$('#addRole').addClass("d-none");
		$('#role_dynamic_title').text('Add Role');
	});
	$('#SelectAll').on("click", function () {
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
});


function role_edit(id) {
	$("#role_form").removeClass("d-none");
	$('#role_datatable').hide();
	$('#addRole').addClass("d-none");

	$('#role_dynamic_title').text('Edit Role');
	$('#role_dynamic_subtitle_span').text('Role is Important.');

	$.ajax({
		type: "POST",
		url: baseFolder + 'role/editRole',
		data: { id: id },
		dataType: "json",
		success: function (data) {
			$('#id').val(data.id);
			$('#role_name').val(data.role_name);
			data.permission.forEach(function (element) {
				console.log(element.permission_id);
				$("input[value='" + element.permission_id + "']").prop('checked', true);
			});
		}
	});

}

function role_delete(id) {
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
				url: baseFolder + 'role/deleteRole',
				data: { id: id },
				dataType: "json",
				success: function (data) {
					if (data.response == true) {
						toastr.success('Successfully Deleted');
						$('#role_datatable').KTDatatable('reload');
					}
				}

			});
		}
	});

}