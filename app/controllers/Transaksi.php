<?php
class Transaksi extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            Flasher::setFlash("Anda harus login untuk mendapatkan hak akses!", 'danger');
            header("Location: " . BASEURL . "auth/login");
        }
    }

    public function index()
    {
        header('Location: ' . BASEURL . 'transaksi/pemasukan');
    }

    public function pemasukan()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PEMASUKAN';

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

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_set_saldo_awal', $data);
        $this->view('templates/footer');
    }
}