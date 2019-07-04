<?php
class Akun extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'akun/akun_aset');
    }

    public function akun_aset()
    {
        $data['header'] = 'AKUN';
        $data['judul'] = 'AKUN ASET';
        $data['nama'] = $this->model('M_user')->getUser();

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
        $data['nama'] = $this->model('M_user')->getUser();

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
        $data['nama'] = $this->model('M_user')->getUser();

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
        $data['nama'] = $this->model('M_user')->getUser();

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
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('akun/v_akun_piutang', $data);
        $this->view('templates/footer');
    }
}