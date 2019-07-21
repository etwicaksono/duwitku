<?php
class Auth extends Controller
{
    public function __construct()
    {
        // if (isset($_SESSION['user'])) {
        //     header('Location: ' . BASEURL . 'home');
        // }
    }
    public function index()
    {
        header('Location: ' . BASEURL . 'Auth/login');
    }

    public function login()
    {
        $data['judul'] = 'Login';

        //cek cookies
        if (isset($_COOKIE['email'])) {
            if ($_COOKIE['email'] == $this->model('M_user')->getUserByEmail($_COOKIE['email'])['email'] && $_COOKIE['key'] == hash('sha256', $_COOKIE['email'])) {
                $user = $this->model('M_user')->getUserByEmail($_COOKIE['email']);
                $_SESSION['user'] = $user;
                Flasher::setFlash("Selamat datang <strong>" . $user['username'] . "</strong>", "success");

                header('Location: ' . BASEURL . 'home');
                exit;
            }
        }

        if (!isset($_POST['email'])) {
            $this->view('auth/a_header', $data);
            $this->view('auth/login');
            $this->view('auth/a_footer');
        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->model('M_user')->getUserByEmail($email);
            if ($user) {
                if ($user['is_active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        //kalau email dan password benar

                        //set session
                        $_SESSION['user'] = $user;
                        //set cookie
                        if (isset($_POST['rememberMe'])) {
                            setcookie('email',  $user['email'], time() + 60 * 60 * 24);
                            setcookie('key',  hash('sha256', $user['email']), time() + 60 * 60 * 24);
                        }
                        //set flash message
                        Flasher::setFlash("Selamat datang <strong>" . $user['username'] . "</strong>", "success");

                        header('Location: ' . BASEURL . 'home');
                        exit;
                    } else {
                        Flasher::setFlash("Login <strong>gagal!</strong> password anda salah.", "warning");

                        header('Location: ' . BASEURL . 'Auth/login');
                        exit;
                    }
                } else {
                    Flasher::setFlash("Login <strong>gagal!</strong> akun anda saat ini sedang dinonaktifkan oleh admin.", "warning");

                    header('Location: ' . BASEURL . 'Auth/login');
                    exit;
                }
            } else {
                Flasher::setFlash("Login <strong>gagal!</strong> email ini belum terdaftar. Silahkan mendaftar terlebih dahulu.", "danger");

                header('Location: ' . BASEURL . 'Auth/login');
                exit;
            }
        }
    }

    public function registrasi()
    {
        $data['judul'] = 'Pendaftaran';

        $this->view('auth/a_header', $data);
        $this->view('auth/registrasi');
        $this->view('auth/a_footer');
    }

    public function tambahUser()
    {
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $date_created = time();

        //ambil data dari database
        $user = $this->model('M_user')->getUserByEmail($email);
        // var_dump($user);
        // die;
        if ($email != $user['email']) { //kalau user belum ada
            if ($password1 === $password2) { //cek kesamaan password

                if ($this->model('M_user')->tambahDataUser($_POST) > 0) {
                    Flasher::setFlash('Anda telah <strong>berhasil</strong> membuat akun. Silahkan login.', 'success');
                    $user = $this->model('M_user')->getUserByEmail($email);
                    $this->setDefault($user['id']);
                    header('Location: ' . BASEURL . 'Auth/login');
                    exit;
                }
            } else {
                //set notifikasi bahwa password harus sama
                echo "konfirmasi password gagal ";
                return false;
            }
        } else { //kalau user sudah ada
            //set notifikasi bahwa password harus sama
            echo "email ini sudah terdaftar ";
            return false;
        }
    }

    public function logout()
    {
        //hapus session
        $_SESSION = [];
        session_unset();
        session_destroy();
        //hapus cookie
        setcookie('email', '', time() - 3600);
        setcookie('key', '', time() - 3600);

        header("Location: " . BASEURL . "Auth/login");
    }

    public function setDefault($data)
    {
        $this->model('M_transaksi')->m_defaultAkunPemasukan((int) $data);
        $this->model('M_transaksi')->m_defaultAkunPengeluaran((int) $data);
        $this->model('M_transaksi')->m_defaultAkunAset((int) $data);
        $this->model('M_transaksi')->m_defaultAkunHutang((int) $data);
        $this->model('M_transaksi')->m_defaultAkunPiutang((int) $data);
    }

    public function testBox()
    {

        var_dump($_SESSION);
        $this->model('M_transaksi')->m_defaultAkunPengeluaran((int) $_SESSION['user']['id']);
    }

    public function outputTest()
    {
        var_dump($_COOKIE);
    }
}