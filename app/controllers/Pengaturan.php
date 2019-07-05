<?php
class Pengaturan extends Controller
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
        header('Location: ' . BASEURL . 'pengaturan/set_password');
    }

    public function set_password()
    {
        $data['header'] = 'PENGATURAN';
        $data['judul'] = 'SET PASSWORD';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('pengaturan/v_set_password', $data);
        $this->view('templates/footer');
    }

    public function reset_data()
    {
        $data['header'] = 'PENGATURAN';
        $data['judul'] = 'RESET DATA';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('pengaturan/v_reset_data', $data);
        $this->view('templates/footer');
    }

    public function user_setting()
    {
        $data['header'] = 'PENGATURAN';
        $data['judul'] = 'USER SETTING';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('pengaturan/v_user_setting', $data);
        $this->view('templates/footer');
    }
}