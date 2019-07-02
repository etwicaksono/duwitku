<?php
class Transaksi extends Controller
{
    public function pemasukan()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PEMASUKAN';
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_pemasukan', $data);
        $this->view('templates/footer');
    }

    public function pengeluaran()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PENGELUARAN';
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_pengeluaran', $data);
        $this->view('templates/footer');
    }

    public function tmbh_hutang()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'TAMBAH HUTANG';
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_tambah_hutang', $data);
        $this->view('templates/footer');
    }

    public function byr_hutang()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PEMBAYARAN HUTANG';
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_pembayaran_hutang', $data);
        $this->view('templates/footer');
    }

    public function tmbh_piutang()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'TAMBAH PIUTANG';
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_tambah_piutang', $data);
        $this->view('templates/footer');
    }

    public function str_piutang()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PENYETORAN PIUTANG';
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_penyetoran_piutang', $data);
        $this->view('templates/footer');
    }

    public function pglh_aset()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PENGALIHAN ASET';
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_pengalihan_aset', $data);
        $this->view('templates/footer');
    }

    public function set_saldoAwal()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'SET SALDO AWAL';
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_set_saldo_awal', $data);
        $this->view('templates/footer');
    }
}