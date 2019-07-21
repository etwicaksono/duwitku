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
        $('#newCreditModalLabel').html('Tambah Hutang Baru');
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
        $('#newCreditModalLabel').html('Ubah Data Hutang');
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
    $('.tampilDeletePiutangModal').on('click', function () {
        const id = $(this).data('id');
        $('#hapusData').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_hapusPiutang/' + id);
    });

    //script untuk kembalikan tampilan tambah Piutang
    $('#tambahPiutang').on('click', function () {
        console.log('tambah');
        $('.modal-content form').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_tambahPiutang');
        $('#newDebtModalLabel').html('Tambah Piutang Baru');
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
        $('#debitur').val(1);
        $('#aset').val(1);
        $('#jumlah').val('');
        $('#keterangan').val('');

    });

    //ajax untuk edit transaksi Piutang
    $('.tampilEditPiutangModal').on('click', function () {
        $('#newDebtModalLabel').html('Ubah Data Piutang');
        $('.modal-footer button[type=submit]').html('Ubah');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-info');
        $('.modal-content form').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_editPiutang');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_getPiutangById',
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
                $('#debitur').val(data.debitur);
                $('#debitur').prop('disabled', true);
                $('#aset').val(data.aset);
                $('#aset').prop('disabled', true);
                $('#jumlah').val(data.jumlah);
                $('#keterangan').val(data.keterangan);
                $('#id').val(data.id);
            }

        });
    });

    //script untuk mengaktifkan kembali input tambah/edit piutang yang disabled
    $('#formPiutang').on('submit', function () {
        $('input, select').prop('disabled', false);
    });

    //ajax untuk bayar Piutang
    $('.tampilBayarPiutangModal').on('click', function () {
        $('.modal-content form').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_bayarPiutang');

        const id = $(this).data('id');
        console.log('bayar Piutang ' + id);
        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/transaksi/c_getPiutangById',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id_piutang').val(data.id);
                $('#debitur_byr').val(data.debitur);
                $('#debitur_byr').prop('disabled', true);
                console.log(data);
            }
        });

    });

    //script untuk mengaktifkan kembali input tambah/edit piutang yang disabled
    $('#form_bayar').on('submit', function () {
        $('input, select').prop('disabled', false);
    });
    //end of transaksi piutang==========================================================================================================


    //pengalihan aset==========================================================================================================
    //script untuk menutup alert ketika diklik 'ya'
    $('#saldoAwal').on('click', function () {
        $('#setSaldoAwalModal').modal('hide');
    });
    //end of pengalihan aset==========================================================================================================


    //akun aset==========================================================================================================
    //ajax untuk edit akun aset
    $('.tampilEditAsetModal').on('click', function () {
        $('#newAsetModalLabel').html('Ubah Aset');
        $('#formAkun').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_editAset');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-info');
        $('.modal-footer button[type=submit]').html('Simpan');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_getAkunAsetById',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#id_aset').val(data.id);
                $('#kode_akun').val(data.kode_asset);
                $('#nama_akun').val(data.nama_aset);
            }
        });
    });

    //script untuk menormalkan kembali modal tambah aset
    $('#tambahAset').on('click', function () {
        $('#newAsetModalLabel').html('Tambah Aset Baru');
        $('#formAkun').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_tambahAset');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-primary');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('#id_aset').val('');
        $('#kode_akun').val('');
        $('#nama_akun').val('');
    });

    //script untuk menghapus akun aset
    $('.tampilDeleteAsetModal').on('click', function () {
        const id = $(this).data('id');
        $('#hapusAkunAset').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_hapusAset/' + id);
    });
    //end of akun aset==========================================================================================================


    //akun pemasukan==========================================================================================================
    //ajax untuk edit akun pemasukan
    $('.tampilEditAkunPemasukanModal').on('click', function () {
        $('#newAkunPemasukanModalLabel').html('Ubah Akun Pemasukan');
        $('#formAkun').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_editAkunPemasukan');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-info');
        $('.modal-footer button[type=submit]').html('Simpan');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_getAkunPemasukanById',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#id_aset').val(data.id);
                $('#kode_akun').val(data.kode_pemasukan);
                $('#nama_akun').val(data.nama_pemasukan);
            }
        });
    });

    //script untuk menormalkan kembali modal tambah pemasukan
    $('#tambahAkunPemasukan').on('click', function () {
        $('#newAkunPemasukanModalLabel').html('Tambah Akun Pemasukan Baru');
        $('#formAkun').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_tambahAkunPemasukan');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-primary');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('#id_aset').val('');
        $('#kode_akun').val('');
        $('#nama_akun').val('');
    });

    //script untuk menghapus akun pemasukan
    $('.tampilDeleteAkunPemasukanModal').on('click', function () {
        const id = $(this).data('id');
        $('#hapusAkunAset').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_hapusAkunPemasukan/' + id);
    });
    //end of akun pemasukan==========================================================================================================


    //akun pengeluaran==========================================================================================================
    //ajax untuk edit akun pengeluaran
    $('.tampilEditAkunPengeluaranModal').on('click', function () {
        $('#newAkunPengeluaranModalLabel').html('Ubah Akun Pengeluaran');
        $('#formAkun').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_editAkunPengeluaran');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-info');
        $('.modal-footer button[type=submit]').html('Simpan');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_getAkunPengeluaranById',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#id_aset').val(data.id);
                $('#kode_akun').val(data.kode_pengeluaran);
                $('#nama_akun').val(data.nama_pengeluaran);
            }
        });
    });

    //script untuk menormalkan kembali modal tambah pengeluaran
    $('#tambahAkunPengeluaran').on('click', function () {
        $('#newAkunPengeluaranModalLabel').html('Tambah Akun Pengeluaran Baru');
        $('#formAkun').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_tambahAkunPengeluaran');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-primary');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('#id_aset').val('');
        $('#kode_akun').val('');
        $('#nama_akun').val('');
    });

    //script untuk menghapus akun pengeluaran
    $('.tampilDeleteAkunPengeluaranModal').on('click', function () {
        const id = $(this).data('id');
        $('#hapusAkunAset').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_hapusAkunPengeluaran/' + id);
    });
    //end of akun pengeluaran==========================================================================================================



    //akun hutang==========================================================================================================
    //ajax untuk edit akun hutang
    $('.tampilEditAkunHutangModal').on('click', function () {
        $('#newAkunHutangModalLabel').html('Ubah Akun Hutang');
        $('#formAkun').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_editAkunHutang');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-info');
        $('.modal-footer button[type=submit]').html('Simpan');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_getAkunHutangById',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#id_aset').val(data.id);
                $('#kode_akun').val(data.kode_kreditur);
                $('#nama_akun').val(data.nama_kreditur);
            }
        });
    });

    //script untuk menormalkan kembali modal tambah hutang
    $('#tambahAkunHutang').on('click', function () {
        $('#newAkunHutangModalLabel').html('Tambah Akun Hutang Baru');
        $('#formAkun').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_tambahAkunHutang');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-primary');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('#id_aset').val('');
        $('#kode_akun').val('');
        $('#nama_akun').val('');
    });

    //script untuk menghapus akun hutang
    $('.tampilDeleteAkunHutangModal').on('click', function () {
        const id = $(this).data('id');
        $('#hapusAkunAset').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_hapusAkunHutang/' + id);
    });
    //end of akun hutang==========================================================================================================



    //akun piutang==========================================================================================================
    //ajax untuk edit akun piutang
    $('.tampilEditAkunPiutangModal').on('click', function () {
        $('#newAkunPiutangModalLabel').html('Ubah Akun Piutang');
        $('#formAkun').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_editAkunPiutang');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-info');
        $('.modal-footer button[type=submit]').html('Simpan');
        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_getAkunPiutangById',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#id_aset').val(data.id);
                $('#kode_akun').val(data.kode_debitur);
                $('#nama_akun').val(data.nama_debitur);
            }
        });
    });

    //script untuk menormalkan kembali modal tambah piutang
    $('#tambahAkunPiutang').on('click', function () {
        $('#newAkunPiutangModalLabel').html('Tambah Akun Piutang Baru');
        $('#formAkun').attr('action', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_tambahAkunPiutang');
        $('.modal-footer button[type=submit]').attr('class', 'btn btn-primary');
        $('.modal-footer button[type=submit]').html('Tambah');
        $('#id_aset').val('');
        $('#kode_akun').val('');
        $('#nama_akun').val('');
    });

    //script untuk menghapus akun piutang
    $('.tampilDeleteAkunPiutangModal').on('click', function () {
        const id = $(this).data('id');
        $('#hapusAkunAset').attr('href', 'http://localhost/project/Experiment/php/phpmvc/public/akun/c_hapusAkunPiutang/' + id);
    });
    //end of akun piutang==========================================================================================================


    //fungsi untuk ajax ganti hak akses menu
    $('.form-check-input').on('click', function () {
        const id = $(this).data('id');
        console.log('konek ' + id);

        $.ajax({
            url: "http://localhost/project/Experiment/php/phpmvc/public/admin/gantiStatus",
            type: 'post',
            data: {
                id: id
            },
            success: function () {

                location.href = "http://localhost/project/Experiment/php/phpmvc/public/admin/manajemenUser";
            }
        });



    });
});