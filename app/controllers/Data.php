<?php
class Data extends Controller
{
    public function data_hutang()
    {
        $data['header'] = 'DATA';
        $data['judul'] = 'DATA HUTANG';
        $data['nama'] = $this->model('M_user')->getUser();

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
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('data/v_data_piutang', $data);
        $this->view('templates/footer');
    }
}