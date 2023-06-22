// Sweet Alert
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal.fire(
		'Sukses',
		'Data Berhasil ' + flashData,
		'success'
	)
}

const comment = $('.comment').data('flashdata');

if (comment) {
	Swal.fire(
		'Sukses',
		'Comment berhasil ditambahkan',
		'success'
	)
}


const comment_gagal = $('.comment-gagal').data('flashdata');

if (comment_gagal) {
	Swal.fire(
		'Failed',
		'Comment gagal ditambahkan!',
		'error'
	)
}

// Sweet Alert
const flashGagal = $('.flash-data-gagal').data('flashdata');

if (flashGagal) {
	Swal.fire(
		'Failed',
		'Data Gagal ' + flashGagal,
		'error'
	)
}
const gabung = $('.flash-data-gabung').data('flashdata');

if (gabung) {
	Swal.fire(
		'Failed',
		'Gagal Bergabung Ke Kelas!',
		'error'
	)
}
const pembayaran = $('.pembayaran-berhasil').data('flashdata');

if (pembayaran) {
	Swal.fire(
		'Sukses',
		'Pembayaran Berhasil',
		'success'
	)
}

const pembayaranGagal = $('.pembayaran-gagal').data('flashdata');

if (pembayaranGagal) {
	Swal.fire(
		'Gagal',
		'Pembayaran Gagal',
		'error'
	)
}
const pesan = $('.pesan').data('flashdata');

if (pesan) {
	Swal.fire(
		'Failed',
		pesan,
		'error'
	)
}

// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Apakah anda yakin',
		text: "data akan dihapus!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#e74c3c',
		cancelButtonColor: '#3085d6',
		confirmButtonText: 'Delete'
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	})

});

