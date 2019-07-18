//transaksi pemasukan========================================================================================================================
$(function () {
    //ajax untuk hapus transaksi pemasukan
    $('.tampilDeleteModal').on('click', function () {
        const id = $(this).data('id');
        $('#hapusData').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_hapusPemasukan/' + id);
    });

    //ajax untuk edit transaksi pemasukan

    $('.tampilEditModal').on('click', function () {
        $('#newTransModalLabel').html('Ubah Data Pemasukan');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-info');
        $('.modal-content form').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_editPemasukan');
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_getPemasukanById',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data.bulan);
                let bulan = '';
                let x = data.bulan;
                if (x == 01) {
                    bulan = 'Januari';
                } else if (x == 02) {
                    bulan = 'Februari';
                } else if (x == 03) {
                    bulan = 'Maret';
                } else if (x == 04) {
                    bulan = 'April';
                } else if (x == 05) {
                    bulan = 'Mei';
                } else if (x == 06) {
                    bulan = 'Juni';
                } else if (x == 07) {
                    bulan = 'Juli';
                } else if (x == 08) {
                    bulan = 'Agustus';
                } else if (x == 09) {
                    bulan = 'September';
                } else if (x == 10) {
                    bulan = 'Oktober';
                } else if (x == 11) {
                    bulan = 'November';
                } else {
                    bulan = 'Desember';
                }

                $('#tanggal').val(data.tanggal);
                $('#bulan_text').val(data.bulan);
                $('#bulan_text').html(bulan);
                $('#tahun').val(data.tahun);
                $('#terimaDari').val(data.terimaDari);
                $('#simpanKe').val(data.simpanKe);
                $('#jumlah').val(data.jumlah);
                $('#keterangan').val(data.keterangan);
                $('#id').val(data.id);
            }

        });
    });

    //ajax untuk kembalikan tampilan tambah pemasukan

    $('#tambahPemasukan').on('click', function () {
        $('.modal-content form').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_tambahPemasukan');
        $('#newTransModalLabel').html('Tambah Pemasukan Baru');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-primary');
        let date = new Date();
        $('#tanggal').val(date.getDate());
        $('#bulan').val(date.getMonth() + 1);
        $('#tahun').val(date.getFullYear());
        $('#terimaDari').val(1);
        $('#simpanKe').val(1);
        $('#jumlah').val('');
        $('#keterangan').val('');

    });
});

//end of transaksi pemasukan===================================================================================================================

//transaksi pengeluaran========================================================================================================================
$(function () {
    //ajax untuk hapus transaksi pengeluaran
    $('.tampilDeletePengeluaran').on('click', function () {
        const id = $(this).data('id');
        $('#hapusData').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_hapusPengeluaran/' + id);
    });

    //ajax untuk edit transaksi pengeluaran

    $('.tampilEditPengeluaran').on('click', function () {
        $('#modalPengeluaranLabel').html('Ubah Data Pengeluaran');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-info');
        $('.modal-content form').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_editPengeluaran');
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_getPengeluaranById',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data.tanggal);

                $('#tanggal').val(data.tanggal);
                $('#bulan').val(data.bulan);
                $('#tahun').val(data.tahun);
                $('#pengeluaran').val(data.pengeluaran);
                $('#ambilDari').val(data.ambilDari);
                $('#jumlah').val(data.jumlah);
                $('#keterangan').val(data.keterangan);
                $('#id').val(data.id);
            }

        });
    });

    //ajax untuk kembalikan tampilan tambah pemasukan

    $('#tambahPengeluaran').on('click', function () {
        $('.modal-content form').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_tambahPengeluaran');
        $('#modalPengeluaranLabel').html('Tambah Pengeluaran Baru');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-primary');
        let date = new Date();
        $('#tanggal').val(date.getDate());
        $('#bulan').val(date.getMonth() + 1);
        $('#tahun').val(date.getFullYear());
        $('#pengeluaran').val(1);
        $('#ambilDari').val(1);
        $('#jumlah').val('');
        $('#keterangan').val('');

    });
});
//end of transaksi pengeluaran================================================================================================================