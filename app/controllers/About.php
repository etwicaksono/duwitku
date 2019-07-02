<?php
class About extends Controller
{
    public function index($nama = 'Eko Teguh Wicaksono', $pekerjaan = 'mahasiswa')
    {
        $data['title'] = 'Tentang Saya';
        $data['nama'] = 'Eko Teguh Wicaksono';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
}