<?php
class Akun extends Controller
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
        header('Location: ' . BASEURL . 'akun/akun_aset');
    }

    public function akun_aset()
    {
        $data['header'] = 'AKUN';
        $data['judul'] = 'AKUN ASET';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('akun/v_akun_aset', $data);
        $this->view('templates/footer');
    }

    public function akun_pemasukan()
    {
        $data['header'] = 'AKUN';
        $data['judul'] = 'AKUN PEMASUKAN';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('akun/v_akun_pemasukan', $data);
        $this->view('templates/footer');
    }

    public function akun_pengeluaran()
    {
        $data['header'] = 'AKUN';
        $data['judul'] = 'AKUN PENGELUARAN';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('akun/v_akun_pengeluaran', $data);
        $this->view('templates/footer');
    }

    public function akun_hutang()
    {
        $data['header'] = 'AKUN';
        $data['judul'] = 'AKUN HUTANG';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('akun/v_akun_hutang', $data);
        $this->view('templates/footer');
    }

    public function akun_piutang()
    {
        $data['header'] = 'AKUN';
        $data['judul'] = 'AKUN PIUTANG';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('akun/v_akun_piutang', $data);
        $this->view('templates/footer');
    }
}