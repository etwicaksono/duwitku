<?php
class Transaksi extends Controller
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
        header('Location: ' . BASEURL . 'transaksi/pemasukan');
    }

    public function pemasukan()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PEMASUKAN';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_pemasukan', $data);
        $this->view('templates/footer');
    }

    public function pengalihanAset()
    {
        if ($this->model('M_transaksi')->m_pengalihanAset($_POST) > 0) {
            Flasher::setFlash('Data aset <strong>berhasil</strong> dialihkan!', 'success');
        } else {
            Flasher::setFlash('Data aset <strong>gagal</strong> dialihkan!', 'danger');
        }

        header("Location: " . BASEURL);
    }

    public function pengeluaran()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PENGELUARAN';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_pengeluaran', $data);
        $this->view('templates/footer');
    }

    public function tmbh_hutang()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'HUTANG';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_tambah_hutang', $data);
        $this->view('templates/footer');
    }

    public function byr_hutang()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PEMBAYARAN HUTANG';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_pembayaran_hutang', $data);
        $this->view('templates/footer');
    }

    public function tmbh_piutang()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PIUTANG';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_tambah_piutang', $data);
        $this->view('templates/footer');
    }

    public function str_piutang()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PENYETORAN PIUTANG';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_penyetoran_piutang', $data);
        $this->view('templates/footer');
    }

    public function pglh_aset()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'PENGALIHAN ASET';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_pengalihan_aset', $data);
        $this->view('templates/footer');
    }

    public function set_saldoAwal()
    {
        $data['header'] = 'TRANSAKSI';
        $data['judul'] = 'SET SALDO AWAL';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('transaksi/v_set_saldo_awal', $data);
        $this->view('templates/footer');
    }

    public function c_tambahHutang()
    {
        if ($this->model('M_transaksi')->m_tambahHutang($_POST) > 0) {
            Flasher::setFlash('Data hutang <strong>berhasil</strong> ditambah!', 'success');
        } else {
            Flasher::setFlash('Data hutang <strong>gagal</strong> ditambah!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/tmbh_hutang");
    }

    public function c_tambahPemasukan()
    {
        if ($this->model('M_transaksi')->m_tambahPemasukan($_POST) > 0) {
            Flasher::setFlash('Data pemasukan <strong>berhasil</strong> ditambah!', 'success');
        } else {
            Flasher::setFlash('Data pemasukan <strong>gagal</strong> ditambah!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/pemasukan");
    }

    public function c_tambahPengeluaran()
    {
        if ($this->model('M_transaksi')->m_tambahPengeluaran($_POST) > 0) {
            Flasher::setFlash('Data pengeluaran <strong>berhasil</strong> ditambah!', 'success');
        } else {
            Flasher::setFlash('Data pengeluaran <strong>gagal</strong> ditambah!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/pengeluaran");
    }

    public function c_tambahPiutang()
    {

        if ($this->model('M_transaksi')->m_tambahPiutang($_POST) > 0) {
            Flasher::setFlash('Data piutang <strong>berhasil</strong> ditambah!', 'success');
        } else {
            Flasher::setFlash('Data piutang <strong>gagal</strong> ditambah!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/tmbh_piutang");
    }

    public function c_bayarHutang()
    {
        if ($this->model('M_transaksi')->m_bayarHutang($_POST) > 0) {
            Flasher::setFlash('Hutang <strong>berhasil</strong> dibayar!', 'success');
        } else {
            Flasher::setFlash('Hutang <strong>gagal</strong> dibayar!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/tmbh_hutang");
    }

    public function c_bayarPiutang()
    {
        // var_dump($_POST);
        // var_dump($_SESSION);
        // die;

        if ($this->model('M_transaksi')->m_bayarPiutang($_POST) > 0) {
            Flasher::setFlash('Hutang <strong>berhasil</strong> dibayar!', 'success');
        } else {
            Flasher::setFlash('Hutang <strong>gagal</strong> dibayar!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/tmbh_piutang");
    }

    public function c_editHutang()
    {

        if ($this->model('M_transaksi')->m_editHutang($_POST) > 0) {
            Flasher::setFlash('Data hutang <strong>berhasil</strong> diubah!', 'success');
        } else {
            Flasher::setFlash('Data hutang <strong>gagal</strong> diubah!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/tmbh_hutang");
    }

    public function c_editPemasukan()
    {

        if ($this->model('M_transaksi')->m_editPemasukan($_POST) > 0) {
            Flasher::setFlash('Data pemasukan <strong>berhasil</strong> diubah!', 'success');
        } else {
            Flasher::setFlash('Data pemasukan <strong>gagal</strong> diubah!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/pemasukan");
    }

    public function c_editPengeluaran()
    {

        if ($this->model('M_transaksi')->m_editPengeluaran($_POST) > 0) {
            Flasher::setFlash('Data pengeluaran <strong>berhasil</strong> diubah!', 'success');
        } else {
            Flasher::setFlash('Data pengeluaran <strong>gagal</strong> diubah!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/pengeluaran");
    }

    public function c_editPiutang()
    {

        if ($this->model('M_transaksi')->m_editPiutang($_POST) > 0) {
            Flasher::setFlash('Data piutang <strong>berhasil</strong> diubah!', 'success');
        } else {
            Flasher::setFlash('Data piutang <strong>gagal</strong> diubah!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/tmbh_piutang");
    }

    public function c_getHutangById()
    {
        echo json_encode($this->model('M_transaksi')->m_getHutangById($_POST['id']));
    }

    public function c_getPemasukanById()
    {
        echo json_encode($this->model('M_transaksi')->m_getPemasukanById($_POST['id']));
    }

    public function c_getPengeluaranById()
    {
        echo json_encode($this->model('M_transaksi')->m_getPengeluaranById($_POST['id']));
    }

    public function c_getPiutangById()
    {
        echo json_encode($this->model('M_transaksi')->m_getPiutangById($_POST['id']));
    }

    public function c_hapusHutang($id)
    {
        $this->model('M_transaksi')->m_hapusHutangByr($id);
        if ($this->model('M_transaksi')->m_hapusHutang($id) > 0) {
            Flasher::setFlash('Data hutang <strong>berhasil</strong> dihapus!', 'success');
        } else {
            Flasher::setFlash('Data hutang <strong>gagal</strong> dihapus!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/tmbh_hutang");
    }

    public function c_hapusPemasukan($id)
    {
        if ($this->model('M_transaksi')->m_hapusPemasukan($id) > 0) {
            Flasher::setFlash('Data pemasukan <strong>berhasil</strong> dihapus!', 'success');
        } else {
            Flasher::setFlash('Data pemasukan <strong>gagal</strong> dihapus!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/pemasukan");
    }

    public function c_hapusPengeluaran($id)
    {
        if ($this->model('M_transaksi')->m_hapusPengeluaran($id) > 0) {
            Flasher::setFlash('Data pengeluaran <strong>berhasil</strong> dihapus!', 'success');
        } else {
            Flasher::setFlash('Data pengeluaran <strong>gagal</strong> dihapus!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/pengeluaran");
    }

    public function c_hapusPiutang($id)
    {
        $this->model('M_transaksi')->m_hapusPiutangByr($id);
        if ($this->model('M_transaksi')->m_hapusPiutang($id) > 0) {
            Flasher::setFlash('Data piutang <strong>berhasil</strong> dihapus!', 'success');
        } else {
            Flasher::setFlash('Data piutang <strong>gagal</strong> dihapus!', 'danger');
        }

        header("Location: " . BASEURL . "transaksi/tmbh_piutang");
    }

    public function setSaldoAwal()
    {
        $akun = $this->model('M_transaksi')->getAssetAccount($_SESSION['user']['id']);
        $data = [];
        foreach ($akun as $a) {
            $data[$a['id']] = $_POST['aset' . $a['id']];
        }


        if ($this->model('M_transaksi')->m_setSaldoAwal($data) > 0) {
            Flasher::setFlash('Saldo awal <strong>berhasil</strong> dibuat!', 'success');
        } else {
            Flasher::setFlash('Saldo awal <strong>gagal</strong> dibuat!', 'danger');
        }

        header("Location: " . BASEURL);
    }

    public function testBox()
    {
        // echo mktime(0, 0, 0, 7, 5, 2019) . "<br>";
        // echo date('d - F - Y', 1562277600);

        var_dump($this->model('M_transaksi')->m_getPemasukanById(5));
    }
}