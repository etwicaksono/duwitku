<?php
class Auth extends Controller
{
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

        if (!isset($_POST['email'])) { //cek apakah formnya sudah diisi
            $this->view('auth/a_header', $data);
            $this->view('auth/registrasi');
            $this->view('auth/a_footer');
        } else { //kalau sudah ada
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            var_dump($_POST);
        }
    }
}