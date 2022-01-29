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
					<div class="dropdown dropdown-inline"><a href="javascript:;" title="Edit" onclick="permission_edit(' + row.user_id + ')"><i class="icon-lg fa fa-cog text-warning mr-3"></i></a>\
						<a href="javascript:;" title="Delete" onclick="user_delete(' + row.user_id + ')"><i class="fas fa-trash text-danger"></i></a></div>';
				},
			}
		],

	});

	$('#addRole').on('click', function () {
		$("#role_form").removeClass("d-none");
		$('#role_datatable').hide();
		$('#addRole').addClass("d-none");
	});
	$('#SelectAll').on("click",function(){
		$('input:checkbox').not(this).prop('checked', this.checked);
	});
});