<?php
class About extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            Flasher::setFlash("Anda harus login untuk mendapatkan hak akses!", 'danger');
            header("Location: " . BASEURL . "Auth/login");
        }
    }

    public function index($nama = 'Eko Teguh Wicaksono', $pekerjaan = 'mahasiswa')
    {
        $data['title'] = 'Tentang Saya';
        $data['nama'] = 'Eko Teguh Wicaksono';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}