<?php
class Home extends Controller
{
    public function index()
    {
        $data['header'] = 'Dashboard';
        $data['judul'] = 'Dashboard';
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}