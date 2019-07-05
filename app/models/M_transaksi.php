<?php
class M_transaksi
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAssetAccount($user_id)
    {
        $this->db->query('SELECT * FROM aset WHERE id_user=:user_id');
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getIncomeAccount($user_id)
    {
        $this->db->query('SELECT * FROM pemasukan_acc WHERE id_user=:user_id');
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getOutcomeAccount($user_id)
    {
        $this->db->query('SELECT * FROM pengeluaran_acc WHERE id_user=:user_id');
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getTransaksiPemasukan($user_id)
    {
        $query = "SELECT `pemasukan`.*, `pemasukan_acc`.`nama_pemasukan`,`pemasukan_acc`.`kode_pemasukan`
                    FROM `pemasukan` JOIN `pemasukan_acc`
                    ON `pemasukan`.`id_akun_pemasukan` = `pemasukan_acc`.`id`
                    WHERE `pemasukan`.`id_user`=:user_id";

        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getTransaksiPengeluaran($user_id)
    {
        $query = "SELECT `pengeluaran`.*, `pengeluaran_acc`.`nama_pengeluaran`,`pengeluaran_acc`.`kode_pengeluaran`
                    FROM `pengeluaran` JOIN `pengeluaran_acc`
                    ON `pengeluaran`.`id_akun_pengeluaran` = `pengeluaran_acc`.`id`
                    WHERE `pengeluaran`.`id_user`=:user_id";

        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function m_getPemasukanById($id)
    {
        $query = "SELECT *
                    FROM `pemasukan` 
                    WHERE `id`=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $raw = $this->db->resultSet()[0];


        $result = [
            'tanggal'     => date('d', $raw['tanggal']),
            'bulan'       => date('m', $raw['tanggal']),
            'tahun'       => date('Y', $raw['tanggal']),
            'terimaDari'  => $raw['id_akun_pemasukan'],
            'simpanKe'    => $raw['id_aset'],
            'jumlah'      => $raw['jumlah'],
            'keterangan'  => $raw['keterangan'],
            'id'          => $id
        ];

        return $result;
    }

    public function m_getPengeluaranById($id)
    {
        $query = "SELECT *
                    FROM `pengeluaran` 
                    WHERE `id`=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $raw = $this->db->resultSet()[0];


        $result = [
            'tanggal'     => date('d', $raw['tanggal']),
            'bulan'       => date('m', $raw['tanggal']),
            'tahun'       => date('Y', $raw['tanggal']),
            'pengeluaran'  => $raw['id_akun_pengeluaran'],
            'ambilDari'    => $raw['id_aset'],
            'jumlah'      => $raw['jumlah'],
            'keterangan'  => $raw['keterangan'],
            'id'          => $id
        ];

        return $result;
    }

    public function m_tambahPemasukan($data)
    {
        //Code here
        $query = "INSERT INTO pemasukan
        VALUES
        ('', :id_user, :id_aset, :id_akun_pemasukan, :tanggal, :jumlah, :keterangan)
        ";

        $id_user = $_SESSION['user']['id'];
        $id_aset = $data['simpanKe'];
        $id_akun_pemasukan = $data['terimaDari'];
        $tanggal = mktime(0, 0, 0, $data['bulan'], $data['tanggal'], $data['tahun']);
        $jumlah = $data['jumlah'];
        $keterangan = $data['keterangan'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset', $id_aset);
        $this->db->bind('id_akun_pemasukan', $id_akun_pemasukan);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_tambahPengeluaran($data)
    {
        //Code here
        $query = "INSERT INTO pengeluaran
        VALUES
        ('', :id_user, :id_aset, :id_akun_pengeluaran, :tanggal, :jumlah, :keterangan)
        ";

        $id_user = $_SESSION['user']['id'];
        $id_aset = $data['ambilDari'];
        $id_akun_pengeluaran = $data['pengeluaran'];
        $tanggal = mktime(0, 0, 0, $data['bulan'], $data['tanggal'], $data['tahun']);
        $jumlah = $data['jumlah'];
        $keterangan = $data['keterangan'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset', $id_aset);
        $this->db->bind('id_akun_pengeluaran', $id_akun_pengeluaran);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_editPemasukan($data)
    {
        //Code here
        $query = "UPDATE pemasukan SET
                id_user = :id_user,
                id_aset = :id_aset,
                id_akun_pemasukan = :id_akun_pemasukan,
                tanggal = :tanggal,
                jumlah = :jumlah,
                keterangan = :keterangan
                WHERE id = :id
        ";

        $id_user = $_SESSION['user']['id'];
        $id_aset = $data['simpanKe'];
        $id_akun_pemasukan = $data['terimaDari'];
        $tanggal = mktime(0, 0, 0, $data['bulan'], $data['tanggal'], $data['tahun']);
        $jumlah = $data['jumlah'];
        $keterangan = $data['keterangan'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset', $id_aset);
        $this->db->bind('id_akun_pemasukan', $id_akun_pemasukan);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_editPengeluaran($data)
    {
        //Code here
        $query = "UPDATE pengeluaran SET
                id_user = :id_user,
                id_aset = :id_aset,
                id_akun_pengeluaran = :id_akun_pengeluaran,
                tanggal = :tanggal,
                jumlah = :jumlah,
                keterangan = :keterangan
                WHERE id = :id
        ";

        $id_user = $_SESSION['user']['id'];
        $id_aset = $data['ambilDari'];
        $id_akun_pengeluaran = $data['pengeluaran'];
        $tanggal = mktime(0, 0, 0, $data['bulan'], $data['tanggal'], $data['tahun']);
        $jumlah = $data['jumlah'];
        $keterangan = $data['keterangan'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset', $id_aset);
        $this->db->bind('id_akun_pengeluaran', $id_akun_pengeluaran);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_hapusPemasukan($id)
    {
        //Code here
        $query = "DELETE FROM pemasukan WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_hapusPengeluaran($id)
    {
        //Code here
        $query = "DELETE FROM pengeluaran WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_defaultAkunPemasukan($data)
    {

        $query = "INSERT INTO `pemasukan_acc`(`id`, `id_user`, `kode_pemasukan`, `nama_pemasukan`) VALUES
        ('',:id,'3111','Hasil Usaha'),
        ('',:id,'3112','Gaji'),
        ('',:id,'3113','Uang Saku'),
        ('',:id,'3114','Lain-lain');";

        $this->db->query($query);
        $this->db->bind('id', $data);
        $this->db->execute();
    }

    public function m_defaultAkunPengeluaran($data)
    {

        $query = "INSERT INTO `pengeluaran_acc`(`id`, `id_user`, `kode_pengeluaran`, `nama_pengeluaran`) VALUES 
        ('',:id_user,'4111','Rumah'),
        ('',:id_user,'4112','Listrik'),
        ('',:id_user,'4113','Transportasi'),
        ('',:id_user,'4114','Air');";

        $this->db->query($query);
        $this->db->bind('id_user', $data);
        $this->db->execute();
    }

    public function m_defaultAkunAset($data)
    {

        $query = "INSERT INTO `aset`(`id`, `id_user`, `kode_asset`, `nama_aset`) VALUES
        ('',:id,'1111','Kas'),
        ('',:id,'1112','Bank BNI'),
        ('',:id,'1113','Bank BCA'),
        ('',:id,'1114','Lain-lain');";

        $this->db->query($query);
        $this->db->bind('id', $data);
        $this->db->execute();
    }
}