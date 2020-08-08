const flashdata = $('.flash-data').data('flashdata');
const flashdata2 = $('.flash-data2').data('flashdata2');

if (flashdata) {
	Swal.fire({
		icon: 'success',
		title: 'Success',
		text: 'Data successfull ' + flashdata
	});
}

if (flashdata2) {
	Swal.fire({
		icon: 'success',
		title: 'Success',
		text: 'Payment Succesfull check your history '
	});
}

$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Are you Sure ?',
		text: "Deleted this Data",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});
