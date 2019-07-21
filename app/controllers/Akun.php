<?php
class Akun extends Controller
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
        header('Location: ' . BASEURL . 'akun/akun_aset');
    }

    public function akun_aset()
    {
        $data['header'] = 'AKUN';
        $data['judul'] = 'AKUN ASET';

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

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('akun/v_akun_piutang', $data);
        $this->view('templates/footer');
    }

    public function c_editAkunHutang()
    {
        if ($this->model('M_akun')->m_editAkunHutang($_POST) > 0) {
            Flasher::setFlash('Akun hutang <strong>berhasil</strong> diubah!', 'success');
        } else {
            Flasher::setFlash('Akun hutang <strong>gagal</strong> diubah!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_hutang");
    }

    public function c_editAkunPemasukan()
    {
        if ($this->model('M_akun')->m_editAkunPemasukan($_POST) > 0) {
            Flasher::setFlash('Akun pemasukan <strong>berhasil</strong> diubah!', 'success');
        } else {
            Flasher::setFlash('Akun pemasukan <strong>gagal</strong> diubah!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_pemasukan");
    }

    public function c_editAkunPengeluaran()
    {
        if ($this->model('M_akun')->m_editAkunPengeluaran($_POST) > 0) {
            Flasher::setFlash('Akun pengeluaran <strong>berhasil</strong> diubah!', 'success');
        } else {
            Flasher::setFlash('Akun pengeluaran <strong>gagal</strong> diubah!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_pengeluaran");
    }

    public function c_editAkunPiutang()
    {
        if ($this->model('M_akun')->m_editAkunPiutang($_POST) > 0) {
            Flasher::setFlash('Akun piutang <strong>berhasil</strong> diubah!', 'success');
        } else {
            Flasher::setFlash('Akun piutang <strong>gagal</strong> diubah!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_piutang");
    }

    public function c_editAset()
    {
        if ($this->model('M_akun')->m_editAset($_POST) > 0) {
            Flasher::setFlash('Akun aset <strong>berhasil</strong> diubah!', 'success');
        } else {
            Flasher::setFlash('Akun aset <strong>gagal</strong> diubah!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_aset");
    }

    public function c_getAkunAsetById()
    {
        echo json_encode($this->model('M_akun')->m_getAkunAsetById($_POST['id']));
    }

    public function c_getAkunHutangById()
    {
        echo json_encode($this->model('M_akun')->m_getAkunHutangById($_POST['id']));
    }

    public function c_getAkunPemasukanById()
    {
        echo json_encode($this->model('M_akun')->m_getAkunPemasukanById($_POST['id']));
    }

    public function c_getAkunPengeluaranById()
    {
        echo json_encode($this->model('M_akun')->m_getAkunPengeluaranById($_POST['id']));
    }


    public function c_getAkunPiutangById()
    {
        echo json_encode($this->model('M_akun')->m_getAkunPiutangById($_POST['id']));
    }

    public function c_hapusAkunHutang($data)
    {
        if ($this->model('M_akun')->m_hapusAkunHutang($data) > 0) {
            Flasher::setFlash('Akun hutang <strong>berhasil</strong> dihapus!', 'success');
        } else {
            Flasher::setFlash('Akun hutang <strong>gagal</strong> dihapus!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_hutang");
    }

    public function c_hapusAkunPemasukan($data)
    {
        if ($this->model('M_akun')->m_hapusAkunPemasukan($data) > 0) {
            Flasher::setFlash('Akun pemasukan <strong>berhasil</strong> dihapus!', 'success');
        } else {
            Flasher::setFlash('Akun pemasukan <strong>gagal</strong> dihapus!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_pemasukan");
    }

    public function c_hapusAkunPiutang($data)
    {
        if ($this->model('M_akun')->m_hapusAkunPiutang($data) > 0) {
            Flasher::setFlash('Akun piutang <strong>berhasil</strong> dihapus!', 'success');
        } else {
            Flasher::setFlash('Akun piutang <strong>gagal</strong> dihapus!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_piutang");
    }

    public function c_hapusAkunPengeluaran($data)
    {
        if ($this->model('M_akun')->m_hapusAkunPengeluaran($data) > 0) {
            Flasher::setFlash('Akun pengeluaran <strong>berhasil</strong> dihapus!', 'success');
        } else {
            Flasher::setFlash('Akun pengeluaran <strong>gagal</strong> dihapus!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_pengeluaran");
    }

    public function c_hapusAset($data)
    {
        if ($this->model('M_akun')->m_hapusAset($data) > 0) {
            Flasher::setFlash('Akun aset <strong>berhasil</strong> dihapus!', 'success');
        } else {
            Flasher::setFlash('Akun aset <strong>gagal</strong> dihapus!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_aset");
    }


    public function c_tambahAkunHutang()
    {
        // var_dump($_POST);
        // die;
        if ($this->model('M_akun')->m_tambahAkunHutang($_POST) > 0) {
            Flasher::setFlash('Akun hutang <strong>berhasil</strong> ditambah!', 'success');
        } else {
            Flasher::setFlash('Akun hutang <strong>gagal</strong> ditambah!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_hutang");
    }

    public function c_tambahAkunPemasukan()
    {
        // var_dump($_POST);
        // die;
        if ($this->model('M_akun')->m_tambahAkunPemasukan($_POST) > 0) {
            Flasher::setFlash('Akun pemasukan <strong>berhasil</strong> ditambah!', 'success');
        } else {
            Flasher::setFlash('Akun pemasukan <strong>gagal</strong> ditambah!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_pemasukan");
    }

    public function c_tambahAkunPengeluaran()
    {
        // var_dump($_POST);
        // die;
        if ($this->model('M_akun')->m_tambahAkunPengeluaran($_POST) > 0) {
            Flasher::setFlash('Akun pengeluaran <strong>berhasil</strong> ditambah!', 'success');
        } else {
            Flasher::setFlash('Akun pengeluaran <strong>gagal</strong> ditambah!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_pengeluaran");
    }

    public function c_tambahAkunPiutang()
    {
        // var_dump($_POST);
        // die;
        if ($this->model('M_akun')->m_tambahAkunPiutang($_POST) > 0) {
            Flasher::setFlash('Akun piutang <strong>berhasil</strong> ditambah!', 'success');
        } else {
            Flasher::setFlash('Akun piutang <strong>gagal</strong> ditambah!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_piutang");
    }

    public function c_tambahAset()
    {
        // var_dump($_POST);
        // die;
        if ($this->model('M_akun')->m_tambahAset($_POST) > 0) {
            Flasher::setFlash('Akun aset <strong>berhasil</strong> ditambah!', 'success');
        } else {
            Flasher::setFlash('Akun aset <strong>gagal</strong> ditambah!', 'danger');
        }

        header("Location: " . BASEURL . "akun/akun_aset");
    }
}