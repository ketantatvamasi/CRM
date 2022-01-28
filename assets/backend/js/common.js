function statusChange(user_id, status,table,id,title,datatable) {

	var temp = "active";
	if (status == 0) {
		temp = "deactive";
	}

	Swal.fire({
		title: "Are you sure?",
		text: "Are you want to " + temp + " this "+title+" ?",
		icon:"question",
		showCancelButton: true,
		confirmButtonColor: "#3085D6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, Change it!",
		cancelButtonText: "Cancel!",
		reverseButtons: true
	}).then(function (result) {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: baseFolder + 'login/statusChange',
				data: { user_id: user_id, status: status, table : table ,id:id},
				dataType: "json",
				success: function (data) {
					if (data.response == true) {
						$(datatable).KTDatatable('reload');
					} else {
						toastr.error("Something went wrong !!");
					}
				},
			});
		}
	});
}