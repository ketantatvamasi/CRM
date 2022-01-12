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
				width: 50,
				type: 'number',
				selector: false,
				textAlign: 'left',
				template: function (data) {
					return '<span class="font-weight-bolder">' + data.number + '</span>';
				}
			},
			{
				field: 'purchase_name',
				title: 'purchase Name',
				sortable: 'asc',
				width: 130,
				template: function (data) {
					var output = '';
					output += '<span class="font-weight-bolder">' + data.purchase_name + '</span>';
					output += '<div class="font-weight-bold text-muted">code: ' + data.purchase_code + '</div>';

					return output;
				}
			},
			{
				field: 'sale_price',
				title: 'Price',
				width: 70,
				template: function (row) {
					var output = '';

					output += '<div class="font-weight ">' + row.sale_price + '</div>';

					return output;
				}
			},
			{
				field: 'opening_quantity',
				title: 'Openinig Qty.',
				width: 70,
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
				width: 70,
				textAlign: 'center',
				template: function (row) {
					var output = '';

					output += '<div class="font-weight font-size-lg mb-0">' + row.total_quantity + '</div>';
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
	                        <a href="javascript:;" title="Edit" onclick="edit_purchase('+ data.id + ')">\
							<i class="far fa-edit text-success mr-3"></i>\
	                        </a>\
	                        <a href="javascript:;" title="Delete" onclick="delete_purchase('+ data.id + ')">\
							<i class="fas fa-trash text-danger"></i>\
	                        </a>\
	                    ';
				},
			}],
	});

	var title = $('#purchase_dynamic_title').text();
	var subtitle = $('#purchase_dynamic_subtitle_span').text();

	$('#add_purchase_button').on('click', function () {
		modelshow(subtitle);

	});
	$('#purchase_list_button').on('click', function () {
		datatableshow(title);
	});
});

function modelshow(subtitle){
	$('#purchase_datatable').hide();
	$('#purchase_form_model').removeClass('d-none');

	$('#add_purchase_button').hide();
	$('#purchase_list_button').removeClass('d-none');
	$('#purchase_dynamic_title').text('Add purchase');
	$('#purchase_dynamic_subtitle_span').text(subtitle);
}

function datatableshow(title,subtitle){
	$('#purchase_form_model').addClass('d-none');
	$('#purchase_datatable').show();
	$('#add_purchase_button').show();
	$('#purchase_list_button').addClass('d-none');
	$('#purchase_dynamic_title').text(title);
	$('#purchase_dynamic_subtitle_span').text(subtitle);
}