<?php
class Data extends Controller
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
        header('Location: ' . BASEURL . 'data/data_hutang');
    }

    public function data_hutang()
    {
        $data['header'] = 'DATA';
        $data['judul'] = 'DATA HUTANG';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('data/v_data_hutang', $data);
        $this->view('templates/footer');
    }

    public function data_piutang()
    {
        $data['header'] = 'DATA';
        $data['judul'] = 'DATA PIUTANG';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('data/v_data_piutang', $data);
        $this->view('templates/footer');
    }
}