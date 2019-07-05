<?php
class Home extends Controller
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

        $data['header'] = 'Dashboard';
        $data['judul'] = 'Dashboard';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function outputTest()
    {
        var_dump($_COOKIE);
    }
}