
"use strict";
// Class definition


jQuery(document).ready(function () {
	// KTWizard3.init();

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
	                        </a>\
	                    ';
				},
			}],
	});
});

jQuery(document).ready(function () {
	var count = $('.item_row').length;
	// alert(count);

	function addpurchse() {
		$.ajax({
			type: 'ajax',
			url: baseFolder + 'item/itemList',
			dataType: 'json',
			success: function (data) {
				count++;
				var htmlRows = '';
                htmlRows += '<tr>';
                htmlRows += '<td><select class="form-control" name="data[" + count + "][item_id]" id="item_id_' + count + '"><option value="">Select Item</option>';
                for (let i = 0; i < data["data"].length; i++) {
                    htmlRows += '<option value="' + data["data"][i].id + '">' + data["data"][i].item_name + '</option>';
                }
                htmlRows += '</select></td>';
                htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][quantity]" id="quantity_' + count + '" placeholder="Qty"/></td>';
                htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][rate]" id="rate_' + count + '"  placeholder="Rate" /></td>';
                htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][cgst_tax]" id="cgst_tax_' + count + '"  placeholder="CGST" /></td>';
                htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][sgst_tax]" id="sgst_tax_' + count + '"  placeholder="SGST" /></td>';
                htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][igst_tax]" id="igst_tax_' + count + '"  placeholder="IGST" /> </td>';
                htmlRows += '<td><input type="number" class="form-control" name="data[' + count + '][total_amount]" id="total_amount_' + count + '"  placeholder="Amount" /></td>';
                htmlRows += '<td><div class="row"><div class="col-4"><a href="javascript:;" id="addItemfield" class="btn btn-sm font-weight-bolder btn-light-primary addItemfield"><i class="la la-plus"></i></a></div>""<div class="col-4"><a href="javascript:;" id="deleteItemfield" class="btn btn-sm font-weight-bolder btn-light-danger"><i class="la la-trash-o"></i></a></div></div></td>';
                htmlRows += '</tr>';
				$('#app-purchse-table').append(htmlRows);
				
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
	$("#app-purchse-table").on("click", ".addItemfield", function () {
		addpurchse();
	});
	$("#app-purchse-table").on("click", "#deleteItemfield", function () {
		$(this).closest("tr").remove();
		calculateTotal();
	});
	$('#reset_button').click(function () {
		document.getElementById("purchse_form").reset();
	});
	$('#purchase_form_submit_button').click(function () {

		var data = $('#purchse_form').serialize();

		$.ajax({
			method: 'post',
			url: baseFolder + 'purchase/addpurchse',
			data: data,
			dataType: "json",
			success: function (data) {
				if (data.response == true) {
					toastr.success('Successfully Save');
					window.location.href = baseFolder + "purchase";
				}
			}
		});
	});
	$(document).on('change', "[id^=item_id_]", function () {
		var id = this.value;
		let tr_id = $(this).attr('id');
		let idArr = tr_id.split("_")[2];
		$.ajax({
			method: 'post',
			url: baseFolder + 'purchase/setitem',
			data: {
				id: id
			},
			dataType: "json",
			success: function (data) {
				// console.log(data.total_quantity);
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
				$('#rate_' + idArr).val(data.sale_price);
				$('#cgst_tax_' + idArr).val(data.cgst);
				$('#sgst_tax_' + idArr).val(data.sgst);
				$('#igst_tax_' + idArr).val(data.igst);
				$('#total_amount_' + idArr).val(data.sale_price);

				calculateTotal();
			}
		});
	});
	$(document).on('keyup', "[id^=quantity_]", function () {
		calculateTotal();
	});
});


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

function delete_purchase(id){
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