"use strict";
// Class definition

var KTAppsUsersListDatatable = function () {
	// Private functions

	// basic demo
	var _demo = function () {
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
					title: 'Price',
					width: 100,
					template: function (row) {
						var output = '';

						output += '<div class="font-weight ">' + row.sale_price + '</div>';

						return output;
					}
				},
				{
					field: 'total_quantity',
					title: 'Total Qty.',
					width: 100,
                    textAlign:'center',
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
	                        <a href="javascript:;" title="Edit" onclick="edit_item('+ data.id + ')">\
							<i class="far fa-edit text-success mr-3"></i>\
	                        </a>\
	                        <a href="javascript:;" title="Delete" onclick="delete_item('+ data.id + ')">\
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
    // KTWizard3.init();
	KTAppsUsersListDatatable.init();
	var title = $('#item_dynamic_title').text();
	var subtitle = $('#item_dynamic_subtitle_span').text();

	$('#add_item_button').on('click', function () {
		$('#item_datatable').hide();
		$('#item_form_model').removeClass('d-none');

		$('#add_item_button').hide();
		$('#item_list_button').removeClass('d-none');
		$('#item_dynamic_title').text('Add item');
		$('#item_dynamic_subtitle_span').text('Great work ahead');

	});
	$('#item_list_button').on('click', function () {
		$('#item_form_model').addClass('d-none');
		$('#item_datatable').show();
		$('#add_item_button').show();
		$('#item_list_button').addClass('d-none');
		$('#item_dynamic_title').text(title);
		$('#item_dynamic_subtitle_span').text('subtitle');
	});
});