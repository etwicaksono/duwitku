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
        header('Location: ' . BASEURL . 'pengaturan/user_setting');
    }

    public function editProfile()
    {
        //inisiasi variabel
        $data['id'] = $_SESSION['user']['id'];
        $data['nama'] = $_POST['nama'];
        $data['email'] = $_POST['email'];
        $gambarLama = $_SESSION['user']['foto'];

        //cek apakah user upload gambar baru
        if ($_FILES['foto']['error'] === 4) {
            $data['gambar'] = $gambarLama;
        } else {
            $data['gambar'] = $this->uploadProfile();
            if ($gambarLama != 'default.jpg') {
                unlink(BASEPATH . 'img/profile/' . $gambarLama);
            }
        }

        if ($this->model('M_user')->m_editUserProfile($data)) {
            $user = $this->model('M_user')->getUserByEmail($data['email']);
            $_SESSION['user'] = $user;
            Flasher::setFlash("Data anda <strong>berhasil</strong> diubah", "success");
            header('Location:' . BASEURL . 'pengaturan/user_setting');
        } else {
            Flasher::setFlash("Data anda <strong>gagal</strong> diubah", "danger");
            header('Location:' . BASEURL . 'pengaturan/user_setting');
        }
    }

    public function uploadProfile()
    {

        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        //cek ada gambar yang diupload atau tidak
        if ($error === 4) {
            echo "
                <script>
                alert('pilih gambar terlebih dahulu!');
                </script>;
            ";
            return false;
        }

        //cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "
                <script>
                alert('yang anda upload bukan gambar!');
                </script>;
            ";
            return false;
        }

        //cek ukuran file
        if ($ukuranFile > 1000000) {
            echo "
                <script>
                alert('ukuran file terlalu besar!');
                </script>;
            ";
            return false;
        }

        //lolos pengecekan, gambar siap diupload
        //generate nama file baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, BASEPATH . 'img/profile/' . $namaFileBaru);

        return $namaFileBaru;
    }

    public function gantiPassword()
    {
        //cek pengisian password
        if ($_POST['password1'] != null && $_POST['password2'] != null) {
            //cek kesamaan password
            $p1 = $_POST['password1'];
            $p2 = $_POST['password2'];
            $p3 = $_POST['password3'];
            $pass = $_SESSION['user']['password'];
            if ($p1 == $p2) {
                //cek kebenaran password lama
                if (password_verify($p3, $pass)) {
                    if ($this->model('M_user')->gantiPassword($p1)) {
                        Flasher::setFlash("Password berhasil diubah!", 'success');
                        header('Location:' . BASEURL . 'pengaturan/set_password');
                    } else {
                        Flasher::setFlash("Password gagal diubah!", 'danger');
                        header('Location:' . BASEURL . 'pengaturan/set_password');
                    }
                } else {
                    Flasher::setFlash("Password salah!", 'danger');
                    header('Location:' . BASEURL . 'pengaturan/set_password');
                }
            } else {
                Flasher::setFlash("Kedua kolom password baru harus sama!", 'danger');
                header('Location:' . BASEURL . 'pengaturan/set_password');
            }
        } else {
            Flasher::setFlash("Kedua kolom password baru harus diisi!", 'danger');
            header('Location:' . BASEURL . 'pengaturan/set_password');
        }
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
        $message =  '';
        if ($result = $this->model('M_transaksi')->hapusPemasukanByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus pemasukan.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus pemasukan.<br>';
        }

        if ($this->model('M_transaksi')->hapusPengeluaranByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus pengeluaran.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus pengeluaran.<br>';
        }
        if ($this->model('M_transaksi')->hapusPiutangByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus piutang.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus piutang.<br>';
        }
        if ($this->model('M_transaksi')->hapusHutangByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus hutang.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus hutang.<br>';
        }
        if ($this->model('M_transaksi')->hapusPengalihanAsetByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus pengalihan aset.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus pengalihan aset.<br>';
        }
        if ($this->model('M_transaksi')->hapusAkunPemasukanByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus akun pemasukan.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus akun pemasukan.<br>';
        }
        if ($this->model('M_transaksi')->hapusAkunPengeluaranByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus akun pengeluaran.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus akun pengeluaran.<br>';
        }

        if ($this->model('M_transaksi')->hapusAkunSaldoAwalByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus saldo awal.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus saldo awal.<br>';
        }


        if ($this->model('M_transaksi')->hapusAsetByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus akun aset.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus akun aset.<br>';
        }
        if ($this->model('M_transaksi')->hapusAkunHutangByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus akun hutang.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus akun hutang.<br>';
        }
        if ($this->model('M_transaksi')->hapusAkunPiutangByUserId($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> hapus akun piutang.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> hapus akun piutang.<br>';
        }
        if ($this->model('M_transaksi')->m_defaultAkunPemasukan($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> membuat akun pemasukan.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> membuat akun pemasukan.<br>';
        }
        if ($this->model('M_transaksi')->m_defaultAkunPengeluaran($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> membuat akun pengeluaran.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> membuat akun pengeluaran.<br>';
        }
        if ($this->model('M_transaksi')->m_defaultAkunAset($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> membuat akun aset.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> membuat akun aset.<br>';
        }
        if ($this->model('M_transaksi')->m_defaultAkunHutang($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> membuat akun hutang.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> membuat akun hutang.<br>';
        }
        if ($this->model('M_transaksi')->m_defaultAkunPiutang($_SESSION['user']['id']) > 0) {
            $message .= '<strong class="text-success">Berhasil</strong> membuat akun piutang.<br>';
        } else {
            $message .= '<strong class="text-danger">Gagal</strong> membuat akun piutang.<br>';
        }

        Flasher::setFlash($message, 'secondary');

        header("Location: " . BASEURL);
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