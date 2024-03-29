$(function () {
    //transaksi pemasukan========================================================================================================
    //script untuk hapus transaksi pemasukan
    $('.tampilDeleteModal').on('click', function () {
        const id = $(this).data('id');
        $('#hapusData').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_hapusPemasukan/' + id);
    });

    //script untuk edit transaksi pemasukan
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
    //end of transaksi pemasukan===================================================================================================================


    //transaksi pengeluaran======================================================================================================
    //script untuk hapus transaksi pengeluaran
    $('.tampilDeletePengeluaran').on('click', function () {
        const id = $(this).data('id');
        $('#hapusData').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_hapusPengeluaran/' + id);
    });

    //script untuk edit transaksi pengeluaran
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

    //ajax untuk kembalikan tampilan tambah pengeluaran
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
    //end of transaksi pengeluaran================================================================================================================


    //transaksi hutang==========================================================================================================
    //script untuk hapus transaksi hutang
    $('.tampilDeleteHutangModal').on('click', function () {
        const id = $(this).data('id');
        $('#hapusData').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_hapusHutang/' + id);
    });

    //script untuk kembalikan tampilan tambah hutang
    $('#tambahHutang').on('click', function () {
        console.log('tambah');
        $('.modal-content form').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_tambahHutang');
        $('#newDebtModalLabel').html('Tambah Hutang Baru');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-primary');

        let date = new Date();
        let bulan = '';
        let x = date.getMonth() + 1;
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

        $('input, select').prop('disabled', false);
        $('#tanggal').val(date.getDate());
        $('#bulan').val(date.getMonth() + 1);
        $('#tahun').val(date.getFullYear());
        $('#tanggal_jt').val(date.getDate());
        $('#bulan_jt').val(date.getMonth() + 1);
        $('#bulan_jt').html(bulan);
        $('#tahun_jt').val(date.getFullYear());
        $('#terimaDari').val(1);
        $('#terimaDari').val(1);
        $('#simpanKe').val(1);
        $('#jumlah').val('');
        $('#keterangan').val('');

    });

    //ajax untuk edit transaksi hutang
    $('.tampilEditHutangModal').on('click', function () {
        $('#newDebtModalLabel').html('Ubah Data Hutang');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-info');
        $('.modal-content form').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_editHutang');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_getHutangById',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
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

                let bulan_jt = '';
                let y = data.bulan_jt;
                if (y == 01) {
                    bulan_jt = 'Januari';
                } else if (y == 02) {
                    bulan_jt = 'Februari';
                } else if (y == 03) {
                    bulan_jt = 'Maret';
                } else if (y == 04) {
                    bulan_jt = 'April';
                } else if (y == 05) {
                    bulan_jt = 'Mei';
                } else if (y == 06) {
                    bulan_jt = 'Juni';
                } else if (y == 07) {
                    bulan_jt = 'Juli';
                } else if (y == 08) {
                    bulan_jt = 'Agustus';
                } else if (y == 09) {
                    bulan_jt = 'September';
                } else if (y == 10) {
                    bulan_jt = 'Oktober';
                } else if (y == 11) {
                    bulan_jt = 'November';
                } else {
                    bulan_jt = 'Desember';
                }

                $('#tanggal').val(data.tanggal);
                $('#bulan').val(data.bulan);
                $('#bulan').html(bulan);
                $('#tahun').val(data.tahun);
                $('#tanggal_jt').val(data.tanggal_jt);
                $('#bulan_jt').val(data.bulan_jt);
                $('#bulan_jt').html(bulan_jt);
                $('#tahun_jt').val(data.tahun_jt);
                $('#terimaDari').val(data.terimaDari);
                $('#terimaDari').prop('disabled', true);
                $('#simpanKe').val(data.simpanKe);
                $('#simpanKe').prop('disabled', true);
                $('#jumlah').val(data.jumlah);
                $('#keterangan').val(data.keterangan);
                $('#id').val(data.id);
            }

        });
    });

    //script untuk mengaktifkan kembali input yang disabled
    $('#formHutang').on('submit', function () {
        $('input, select').prop('disabled', false);
    });

    //ajax untuk bayar hutang
    $('.tampilBayarHutangModal').on('click', function () {
        $('.modal-content form').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_bayarHutang');

        const id = $(this).data('id');
        console.log('bayar hutang ' + id);
        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_getHutangById',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_hutang').val(data.id);
                $('#hutangDari').val(data.terimaDari);
                $('#hutangDari').prop('disabled', true);
                $('#id_kreditur').val(data.terimaDari);
                console.log(data);
            }
        });

    });
    //end of transaksi hutang=======================================================================================================


    //transaksi piutang==========================================================================================================

    //end of transaksi piutang==========================================================================================================



});