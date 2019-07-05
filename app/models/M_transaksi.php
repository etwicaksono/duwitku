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

    public function getTransaksiPemasukan($user_id)
    {
        $query = "SELECT `pemasukan`.*, `pemasukan_acc`.`nama_pemasukan`
                    FROM `pemasukan` JOIN `pemasukan_acc`
                    ON `pemasukan`.`id_akun_pemasukan` = `pemasukan_acc`.`id`
                    WHERE `pemasukan`.`id_user`=:user_id";

        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
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
}