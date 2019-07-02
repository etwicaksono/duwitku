<?php
class Laporan extends Controller
{
    public function jurnal()
    {
        $data['header'] = 'LAPORAN';
        $data['judul'] = 'JURNAL';
        $data['nama'] = $this->model('M_user')->getUser();

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
        $data['nama'] = $this->model('M_user')->getUser();

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
        $data['nama'] = $this->model('M_user')->getUser();

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
        $data['nama'] = $this->model('M_user')->getUser();

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
        $data['nama'] = $this->model('M_user')->getUser();

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('laporan/v_laporan_tahunan', $data);
        $this->view('templates/footer');
    }
}