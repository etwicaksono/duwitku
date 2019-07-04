<?php
class Auth extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'auth/login');
    }

    public function login()
    {
        $data['judul'] = 'Login';

        $this->view('auth/a_header', $data);
        $this->view('auth/login');
        $this->view('auth/a_footer');
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
                // $tes = $this->model('M_user')->tambahDataUser($_POST);
                // var_dump($tes);
                // die;
                if ($this->model('M_user')->tambahDataUser($_POST) > 0) {
                    header('Location: ' . BASEURL . 'auth/login');
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

    public function testbox()
    {
        //Code here
        // $email = 'ekoteguhwicakso@gmail.com';
        // $user = $this->model('M_user')->getUserByEmail($email);
        // var_dump($user);


        $data = [
            'nama'      => 'Eko Teguh',
            'email'     => 'echotechno007@gmail.com',
            'password'  => '1234567890'
        ];

        $this->model('M_user')->insertRegistration($data);
    }
}