<?php
class Admin extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['user'])) {
            Flasher::setFlash("Anda harus login untuk mendapatkan hak akses!", "danger");
            header("Location: " . BASEURL . "auth/login");
        }
    }

    public function gantiStatus()
    {
        $id = $_POST['id'];
        $status = $this->model('M_user')->getUserById($id)['is_active'];

        if ($status == 1) {
            if ($this->model('M_admin')->deactivateById($id) > 0) {
                Flasher::setFlash('Status akun <strong>berhasil</strong> dinonaktifkan!', 'success');
            } else {
                Flasher::setFlash('Status akun <strong>gagal</strong> dinonaktifkan!', 'danger');
            }
        } else {
            if ($this->model('M_admin')->activateById($id) > 0) {
                Flasher::setFlash('Status akun <strong>berhasil</strong> diaktifkan!', 'success');
            } else {
                Flasher::setFlash('Status akun <strong>gagal</strong> diaktifkan!', 'danger');
            }
        }
    }

    public function manajemenUser()
    {
        $data['header'] = 'MANAJEMEN USER';
        $data['judul'] = 'MANAJEMEN USER';

        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('templates/topbar', $data);
        $this->view('admin/admin', $data);
        $this->view('templates/footer');
    }
}