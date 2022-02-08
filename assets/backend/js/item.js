jQuery(document).ready(function () {
	itemForm();
	var datatable = $('#item_datatable').KTDatatable({
		// datasource definition
		data: {
			type: 'remote',
			source: {
				read: {
					url: baseFolder + 'item/itemList',
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
				field: 'item_name',
				title: 'Item Name',
				sortable: 'asc',
				width: 170,
				template: function (data) {
					var output = '';
					output += '<span class="font-weight-bolder">' + data.item_name + '</span>';
					output += '<div class="font-weight-bold text-muted">code: ' + data.item_code + '</div>';

					return output;
				}
			},
			{
				field: 'sale_price',
				title: 'Sale Price',
				width: 100,
				template: function (row) {
					var output = '';

					output += '<div class="font-weight ">' + row.sale_price + '</div>';

					return output;
				}
			},
			{
				field: 'purchase_price',
				title: 'Purchase Price',
				width: 100,
				template: function (row) {
					var output = '';

					output += '<div class="font-weight ">' + row.purchase_price + '</div>';

					return output;
				}
			},
			{
				field: 'opening_quantity',
				title: 'Opening Qty.',
				width: 100,
				textAlign: 'center',
				template: function (row) {
					var output = '';

					output += '<div class="font-weight font-size-lg mb-0">' + row.opening_quantity + '</div>';
					return output;
				}
			},
			{
				field: 'total_quantity',
				title: 'Total Qty.',
				width: 100,
				textAlign: 'center',
				template: function (row) {
					var output = '';

					output += '<div class="font-weight font-size-lg mb-0">' + row.total_quantity + '</div>';
					return output;
				}
			},
			{
				field: 'status',
				title: 'Status',
				// callback function support for column rendering
				template: function (row) {
					var status = {
						0: { 'title': 'Active', 'class': ' label-light-success' },
						1: { 'title': 'Deactive', 'class': ' label-light-danger' },
					};
					return `<span class="label label-lg font-weight-bold   ${status[row.status].class}   label-inline" onclick="statusChange( ${row.id} ,${row.status} ,'items','id','item','#item_datatable')">${status[row.status].title}</span>`;
				},
			},
			{
				field: 'Action',
				title: 'Action',
				sortable: false,
				width: 60,
				overflow: 'visible',
				autoHide: false,
				template: function (data) {
					var edbutton = '';
					if ($.inArray(15, session_permission) !== -1) {
						edbutton += '<a href="javascript:;" title="Edit" onclick="edit_item(' + data.id + ')"><i class="far fa-edit text-success mr-3"></i></a>';
					}
					if ($.inArray(16, session_permission) !== -1) {
						edbutton += '<a href="javascript:;" title="Delete" onclick="delete_item(' + data.id + ')"><i class="fas fa-trash text-danger"></i></a>';
					}
					return edbutton;
				},
			}],
	});
});

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

	});


	$('#add_item_button').on('click', function () {
		$("[class^='fv-plugins-message-container']").text('');  //reset('empty') validation
		$('#items_form')[0].reset();
		fv.on('core.form.reset', function () { });
		$('.modal-title').text('Add item');
	});

}
function edit_item(id) {
	$("[class^='fv-plugins-message-container']").text('');
	$('#items_form')[0].reset();
	$.ajax({
		type: "POST",
		url: baseFolder + 'item/editItem',
		data: { id: id },
		dataType: "json",
		success: function (res) {
			// console.log(res.total_quantity);	
			$('#id').val(res.id);
			$('#item_name').val(res.item_name)
			$('#item_code').val(res.item_code);
			$('#purchase_price').val(res.purchase_price);
			$('#sale_price').val(res.sale_price);
			$('#opening_quantity').val(res.opening_quantity);

			$('#cgst').val(res.cgst);
			$('#sgst').val(res.sgst);
			$('#igst').val(res.igst);
			$('#note').val(res.note);
			$('.modal-title').text('Edit item');
			$('#itemsModal').modal('toggle');
		}
	});
}
function delete_item(id) {
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
				url: baseFolder + 'item/deleteItem',
				data: { id: id },
				dataType: "json",
				success: function (data) {
					if (data.response == true) {
						toastr.success('Successfully Deleted');
						$('#item_datatable').KTDatatable('reload');
					}
				}

			});
		}
	});
}
