<?php
class Laporan extends Controller
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
        header('Location: ' . BASEURL . 'laporan/jurnal');
    }

    public function jurnal()
    {
        $data['header'] = 'LAPORAN';
        $data['judul'] = 'JURNAL';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('laporan/v_jurnal', $data);
        $this->view('templates/footer');
    }

    public function buku_besar()
    {
        $data['header'] = 'LAPORAN';
        $data['judul'] = 'BUKU BESAR';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('laporan/v_buku_besar', $data);
        $this->view('templates/footer');
    }

    public function informasi_saldo()
    {
        $data['header'] = 'LAPORAN';
        $data['judul'] = 'INFORMASI SALDO';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('laporan/v_informasi_saldo', $data);
        $this->view('templates/footer');
    }

    public function laporan_bulanan()
    {
        $data['header'] = 'LAPORAN';
        $data['judul'] = 'LAPORAN BULANAN';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('laporan/v_laporan_bulanan', $data);
        $this->view('templates/footer');
    }

    public function laporan_tahunan()
    {
        $data['header'] = 'LAPORAN';
        $data['judul'] = 'LAPORAN TAHUNAN';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('laporan/v_laporan_tahunan', $data);
        $this->view('templates/footer');
    }
}