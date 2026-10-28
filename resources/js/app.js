
import 'bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;

// ======================================
// AJAX KETERSEDIAAN KURSI - PERTEMUAN 9
// ======================================

$(document).on('change', '#course_id', function () {

    const id = this.value;

    // Jika pengguna belum memilih kursus
    if (!id) {
        $('#availability')
            .removeClass('alert-success alert-danger')
            .addClass('alert-secondary')
            .text('Pilih kursus untuk melihat sisa kursi.');

        return;
    }

    // Tampilkan pesan saat data sedang dimuat
    $('#availability')
        .removeClass('alert-success alert-danger')
        .addClass('alert-secondary')
        .text('Memuat ketersediaan kursi...');

    // Mengambil data dari route Laravel
    $.ajax({
        url: `/courses/${id}/availability`,
        method: 'GET',
        dataType: 'json',

        success: function (data) {

            $('#availability')
                .removeClass('alert-secondary alert-danger')
                .addClass('alert-success')
                .text(
                    `${data.remaining} kursi tersisa untuk ${data.course}.`
                );
        },

        error: function () {

            $('#availability')
                .removeClass('alert-secondary alert-success')
                .addClass('alert-danger')
                .text('Gagal memuat ketersediaan kursus.');
        }
    });

});
