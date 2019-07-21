<?php
class M_akun
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function m_editAkunHutang($data)
    {
        $query = "UPDATE kreditur_acc
                    SET
                    kode_kreditur=:kode_asset,
                    nama_kreditur=:nama_aset
                    WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('kode_asset', $data['kode_akun']);
        $this->db->bind('nama_aset', $data['nama_akun']);
        $this->db->bind('id', $data['id_aset']);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function m_editAkunPemasukan($data)
    {
        $query = "UPDATE pemasukan_acc
                    SET
                    kode_pemasukan=:kode_asset,
                    nama_pemasukan=:nama_aset
                    WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('kode_asset', $data['kode_akun']);
        $this->db->bind('nama_aset', $data['nama_akun']);
        $this->db->bind('id', $data['id_aset']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_editAkunPengeluaran($data)
    {
        $query = "UPDATE pengeluaran_acc
                    SET
                    kode_pengeluaran=:kode_asset,
                    nama_pengeluaran=:nama_aset
                    WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('kode_asset', $data['kode_akun']);
        $this->db->bind('nama_aset', $data['nama_akun']);
        $this->db->bind('id', $data['id_aset']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_editAkunPiutang($data)
    {
        $query = "UPDATE debitur_acc
                    SET
                    kode_debitur=:kode_asset,
                    nama_debitur=:nama_aset
                    WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('kode_asset', $data['kode_akun']);
        $this->db->bind('nama_aset', $data['nama_akun']);
        $this->db->bind('id', $data['id_aset']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_editAset($data)
    {
        $query = "UPDATE aset
                    SET
                    kode_asset=:kode_asset,
                    nama_aset=:nama_aset
                    WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('kode_asset', $data['kode_akun']);
        $this->db->bind('nama_aset', $data['nama_akun']);
        $this->db->bind('id', $data['id_aset']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_getAkunAsetById($id)
    {
        $query = "SELECT * FROM aset WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->single();
    }


    public function m_getAkunHutangById($id)
    {
        $query = "SELECT * FROM kreditur_acc WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->single();
    }

    public function m_getAkunPemasukanById($id)
    {
        $query = "SELECT * FROM pemasukan_acc WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->single();
    }

    public function m_getAkunPengeluaranById($id)
    {
        $query = "SELECT * FROM pengeluaran_acc WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->single();
    }


    public function m_getAkunPiutangById($id)
    {
        $query = "SELECT * FROM debitur_acc WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->single();
    }


    public function m_hapusAkunHutang($id)
    {
        $query = "DELETE FROM kreditur_acc WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_hapusAkunPemasukan($id)
    {
        $query = "DELETE FROM pemasukan_acc WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_hapusAkunPengeluaran($id)
    {
        $query = "DELETE FROM pengeluaran_acc WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_hapusAkunPiutang($id)
    {
        $query = "DELETE FROM debitur_acc WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_hapusAset($id)
    {
        $query = "DELETE FROM aset WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_tambahAkunHutang($data)
    {
        //Code here
        $query = "INSERT INTO kreditur_acc
        VALUES
        ('', :id_user, :kode_aset, :nama_aset)
        ";

        // var_dump($data);
        // die;

        $id_user = $_SESSION['user']['id'];
        $kode_aset = $data['kode_akun'];
        $nama_aset = $data['nama_akun'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('kode_aset', $kode_aset);
        $this->db->bind('nama_aset', $nama_aset);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_tambahAkunPemasukan($data)
    {
        //Code here
        $query = "INSERT INTO pemasukan_acc
        VALUES
        ('', :id_user, :kode_aset, :nama_aset)
        ";

        // var_dump($data);
        // die;

        $id_user = $_SESSION['user']['id'];
        $kode_aset = $data['kode_akun'];
        $nama_aset = $data['nama_akun'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('kode_aset', $kode_aset);
        $this->db->bind('nama_aset', $nama_aset);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_tambahAkunPengeluaran($data)
    {
        //Code here
        $query = "INSERT INTO pengeluaran_acc
        VALUES
        ('', :id_user, :kode_aset, :nama_aset)
        ";

        // var_dump($data);
        // die;

        $id_user = $_SESSION['user']['id'];
        $kode_aset = $data['kode_akun'];
        $nama_aset = $data['nama_akun'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('kode_aset', $kode_aset);
        $this->db->bind('nama_aset', $nama_aset);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_tambahAkunPiutang($data)
    {
        //Code here
        $query = "INSERT INTO debitur_acc
        VALUES
        ('', :id_user, :kode_aset, :nama_aset)
        ";

        // var_dump($data);
        // die;

        $id_user = $_SESSION['user']['id'];
        $kode_aset = $data['kode_akun'];
        $nama_aset = $data['nama_akun'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('kode_aset', $kode_aset);
        $this->db->bind('nama_aset', $nama_aset);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_tambahAset($data)
    {
        //Code here
        $query = "INSERT INTO aset
        VALUES
        ('', :id_user, :kode_aset, :nama_aset)
        ";

        // var_dump($data);
        // die;

        $id_user = $_SESSION['user']['id'];
        $kode_aset = $data['kode_akun'];
        $nama_aset = $data['nama_akun'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('kode_aset', $kode_aset);
        $this->db->bind('nama_aset', $nama_aset);
        $this->db->execute();

        return $this->db->rowCount();
    }
}