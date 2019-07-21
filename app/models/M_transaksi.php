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

    public function getDebiturAccount($user_id)
    {
        $this->db->query('SELECT * FROM debitur_acc WHERE id_user=:user_id');
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getCrediturAccount($user_id)
    {
        $this->db->query('SELECT * FROM kreditur_acc WHERE id_user=:user_id');
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

    public function getPemasukanByAkunPemasukan($id)
    {
        $query = "SELECT id,
        (SELECT SUM(jumlah)FROM pemasukan
            WHERE id_akun_pemasukan = :id) AS jumlah
        FROM pemasukan_acc WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getPengeluaranByAkunPengeluaran($id)
    {
        $query = "SELECT id,
        (SELECT SUM(jumlah)FROM pengeluaran
            WHERE id_akun_pengeluaran = :id) AS jumlah
        FROM pengeluaran_acc WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getHutangByIdKreditur($id)
    {
        $query = "SELECT id,
        (SELECT SUM(jumlah_hutang) FROM saldo_hutang
            WHERE id_kreditur = :id) AS jumlah
        FROM kreditur_acc WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getPiutang($user_id)
    {
        $query = "SELECT h.*, k.nama_debitur, k.kode_debitur
                    FROM piutang h JOIN debitur_acc k
                    ON h.id_debitur = k.id
                    WHERE h.id_user=:user_id
                    ORDER BY h.id DESC";

        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getPiutangByIdDebitur($id)
    {
        $query = "SELECT id,
        (SELECT SUM(jumlah_piutang)FROM saldo_piutang
            WHERE id_debitur = :id) AS jumlah
        FROM debitur_acc WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getPiutangByr($user_id)
    {
        $query = "SELECT h.*, k.nama_debitur, k.kode_debitur
                    FROM piutang_byr h JOIN debitur_acc k
                    ON h.id_debitur = k.id
                    WHERE h.id_user=:user_id
                    ORDER BY h.id DESC";

        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getSaldoByAssetId($id)
    {
        $query = "SELECT saldo FROM saldo_aset WHERE id_aset = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        return $this->db->resultSet();
    }

    public function getHutang($user_id)
    {
        $query = "SELECT h.*, k.nama_kreditur, k.kode_kreditur
                    FROM hutang h JOIN kreditur_acc k
                    ON h.id_kreditur = k.id
                    WHERE h.id_user=:user_id
                    ORDER BY h.id DESC";

        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getHutangByr($user_id)
    {
        $query = "SELECT h.*, k.nama_kreditur, k.kode_kreditur
                    FROM hutang_byr h JOIN kreditur_acc k
                    ON h.id_kreditur = k.id
                    WHERE h.id_user=:user_id
                    ORDER BY h.id DESC";

        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getTransaksiPemasukan($user_id)
    {
        $query = "SELECT `pemasukan`.*, `pemasukan_acc`.`nama_pemasukan`,`pemasukan_acc`.`kode_pemasukan`
                    FROM `pemasukan` JOIN `pemasukan_acc`
                    ON `pemasukan`.`id_akun_pemasukan` = `pemasukan_acc`.`id`
                    WHERE `pemasukan`.`id_user`=:user_id
                    ORDER BY pemasukan.id DESC";

        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getTransaksiPengeluaran($user_id)
    {
        $query = "SELECT `pengeluaran`.*, `pengeluaran_acc`.`nama_pengeluaran`,`pengeluaran_acc`.`kode_pengeluaran`
                    FROM `pengeluaran` JOIN `pengeluaran_acc`
                    ON `pengeluaran`.`id_akun_pengeluaran` = `pengeluaran_acc`.`id`
                    WHERE `pengeluaran`.`id_user`=:user_id
                    ORDER BY pengeluaran.id DESC";

        $this->db->query($query);
        $this->db->bind('user_id', $user_id);
        return $this->db->resultSet();
    }

    public function hapusAkunSaldoAwalByUserId($id)
    {
        $query = "DELETE FROM saldo_awal WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusAkunHutangByUserId($id)
    {
        $query = "DELETE FROM kreditur_acc WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusAkunPemasukanByUserId($id)
    {
        $query = "DELETE FROM pemasukan_acc WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusAkunPengeluaranByUserId($id)
    {
        $query = "DELETE FROM pengeluaran_acc WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusAkunPiutangByUserId($id)
    {
        $query = "DELETE FROM debitur_acc WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusAsetByUserId($id)
    {
        $query = "DELETE FROM aset WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusHutangByUserId($id)
    {
        $query = "DELETE FROM hutang_byr WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();

        $query = "DELETE FROM hutang WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusPemasukanByUserId($id)
    {
        $query = "DELETE FROM pemasukan WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusPengalihanAsetByUserId($id)
    {
        $query = "DELETE FROM pengalihan_aset WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusPengeluaranByUserId($id)
    {
        $query = "DELETE FROM pengeluaran WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusPiutangByUserId($id)
    {

        $query = "DELETE FROM piutang_byr WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();

        $query = "DELETE FROM piutang WHERE id_user =:id_user";

        $this->db->query($query);
        $this->db->bind('id_user', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function m_bayarHutang($data)
    {

        //query untuk insert ke hutang_bayar
        $query = "INSERT INTO hutang_byr
                VALUES
                (null, :id_user, :id_aset, :id_kreditur, :id_hutang, :tanggal, :jumlah, :keterangan)";

        $id_user = $_SESSION['user']['id'];
        $id_aset = $data['ambilDari'];
        $id_kreditur = $data['id_kreditur'];
        $id_hutang = $data['id_hutang'];
        $tanggal = mktime(0, 0, 0, $data['bulan'], $data['tanggal_byr'], $data['tanggal_byr']);
        $jumlah = $data['jumlah_byr'];
        $keterangan = $data['keterangan_byr'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset', $id_aset);
        $this->db->bind('id_kreditur', $id_kreditur);
        $this->db->bind('id_hutang', $id_hutang);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_bayarPiutang($data)
    {

        //query untuk insert ke piutang_bayar
        $query = "INSERT INTO piutang_byr
                VALUES
                (null, :id_user, :id_aset, :id_debitur, :id_piutang, :tanggal, :jumlah, :keterangan)";

        $id_user = $_SESSION['user']['id'];
        $id_aset = $data['aset'];
        $id_debitur = $data['debitur_byr'];
        $id_piutang = $data['id_piutang'];
        $tanggal = mktime(0, 0, 0, $data['bulan'], $data['tanggal_byr'], $data['tanggal_byr']);
        $jumlah = $data['jumlah_byr'];
        $keterangan = $data['keterangan_byr'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset', $id_aset);
        $this->db->bind('id_debitur', $id_debitur);
        $this->db->bind('id_piutang', $id_piutang);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_getHutangById($id)
    {
        $query = "SELECT *
                    FROM `saldo_hutang` 
                    WHERE `id`=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $raw = $this->db->resultSet()[0];

        $result = [
            'tanggal'     => date('d', $raw['tanggal_hutang']),
            'bulan'       => date('m', $raw['tanggal_hutang']),
            'tahun'       => date('Y', $raw['tanggal_hutang']),
            'tanggal_jt'     => date('d', $raw['tanggal_jatuh_tempo']),
            'bulan_jt'       => date('m', $raw['tanggal_jatuh_tempo']),
            'tahun_jt'       => date('Y', $raw['tanggal_jatuh_tempo']),
            'terimaDari'  => $raw['id_kreditur'],
            'simpanKe'    => $raw['id_aset'],
            'jumlah'      => $raw['jumlah'],
            'jumlah_hutang'      => $raw['jumlah_hutang'],
            'keterangan'  => $raw['keterangan'],
            'id'          => $id
        ];

        return $result;
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

    public function m_getPiutangById($id)
    {
        $query = "SELECT *
                    FROM `saldo_piutang` 
                    WHERE `id`=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $raw = $this->db->resultSet()[0];

        $result = [
            'tanggal'     => date('d', $raw['tanggal_piutang']),
            'bulan'       => date('m', $raw['tanggal_piutang']),
            'tahun'       => date('Y', $raw['tanggal_piutang']),
            'tanggal_jt'     => date('d', $raw['tanggal_jatuh_tempo']),
            'bulan_jt'       => date('m', $raw['tanggal_jatuh_tempo']),
            'tahun_jt'       => date('Y', $raw['tanggal_jatuh_tempo']),
            'debitur'  => $raw['id_debitur'],
            'aset'    => $raw['id_aset'],
            'jumlah'      => $raw['jumlah'],
            'jumlah_piutang'      => $raw['jumlah_piutang'],
            'keterangan'  => $raw['keterangan'],
            'id'          => $id
        ];

        return $result;
    }

    public function m_tambahHutang($data)
    {
        //Code here
        $query = "INSERT INTO hutang
        VALUES
        ('', :id_user, :id_aset, :id_kreditur, :tanggal, :tanggal_jt, :jumlah, :keterangan)
        ";

        // var_dump($data);
        // die;

        $id_user = $_SESSION['user']['id'];
        $id_aset = $data['simpanKe'];
        $id_kreditur = $data['terimaDari'];
        $tanggal = mktime(0, 0, 0, $data['bulan'], $data['tanggal'], $data['tahun']);
        $tanggal_jt = mktime(0, 0, 0, $data['bulan_jt'], $data['tanggal_jt'], $data['tahun_jt']);
        $jumlah = $data['jumlah'];
        $keterangan = $data['keterangan'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset', $id_aset);
        $this->db->bind('id_kreditur', $id_kreditur);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('tanggal_jt', $tanggal_jt);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);

        $this->db->execute();

        return $this->db->rowCount();
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

    public function m_tambahPiutang($data)
    {
        //Code here
        $query = "INSERT INTO piutang
        VALUES
        ('', :id_user, :id_aset, :id_debitur, :tanggal, :tanggal_jt, :jumlah, :keterangan)
        ";

        // var_dump($data);
        // die;

        $id_user = $_SESSION['user']['id'];
        $id_aset = $data['aset'];
        $id_debitur = $data['debitur'];
        $tanggal = mktime(0, 0, 0, $data['bulan'], $data['tanggal'], $data['tahun']);
        $tanggal_jt = mktime(0, 0, 0, $data['bulan_jt'], $data['tanggal_jt'], $data['tahun_jt']);
        $jumlah = $data['jumlah'];
        $keterangan = $data['keterangan'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset', $id_aset);
        $this->db->bind('id_debitur', $id_debitur);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('tanggal_jt', $tanggal_jt);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_editHutang($data)
    {
        //Code here
        $query = "UPDATE hutang SET
                id_user = :id_user,
                id_aset = :id_aset,
                id_kreditur = :id_kreditur,
                tanggal_hutang = :tanggal,
                tanggal_jatuh_tempo = :tanggal_jt,
                jumlah = :jumlah,
                keterangan = :keterangan
                WHERE id = :id
        ";

        $id_user = $_SESSION['user']['id'];
        $id_aset = $data['simpanKe'];
        $id_kreditur = $data['terimaDari'];
        $tanggal = mktime(0, 0, 0, $data['bulan'], $data['tanggal'], $data['tahun']);
        $tanggal_jt = mktime(0, 0, 0, $data['bulan_jt'], $data['tanggal_jt'], $data['tahun_jt']);
        $jumlah = $data['jumlah'];
        $keterangan = $data['keterangan'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset', $id_aset);
        $this->db->bind('id_kreditur', $id_kreditur);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('tanggal_jt', $tanggal_jt);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);
        $this->db->bind('id', $data['id']);

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

    public function m_editPiutang($data)
    {
        //Code here
        $query = "UPDATE piutang SET
                id_user = :id_user,
                id_aset = :id_aset,
                id_debitur = :id_debitur,
                tanggal_piutang = :tanggal,
                tanggal_jatuh_tempo = :tanggal_jt,
                jumlah = :jumlah,
                keterangan = :keterangan
                WHERE id = :id
        ";

        $id_user = $_SESSION['user']['id'];
        $id_aset = $data['aset'];
        $id_debitur = $data['debitur'];
        $tanggal = mktime(0, 0, 0, $data['bulan'], $data['tanggal'], $data['tahun']);
        $tanggal_jt = mktime(0, 0, 0, $data['bulan_jt'], $data['tanggal_jt'], $data['tahun_jt']);
        $jumlah = $data['jumlah'];
        $keterangan = $data['keterangan'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset', $id_aset);
        $this->db->bind('id_debitur', $id_debitur);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('tanggal_jt', $tanggal_jt);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_hapusHutang($id)
    {
        //Code here
        $query = "DELETE FROM hutang WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_hapusHutangByr($id)
    {
        //Code here
        $query = "DELETE FROM hutang_byr WHERE id_hutang=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
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


    public function m_hapusPiutang($id)
    {
        //Code here
        $query = "DELETE FROM piutang WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_hapusPiutangByr($id)
    {
        //Code here
        $query = "DELETE FROM piutang_byr WHERE id_piutang=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_pengalihanAset($data)
    {

        //query untuk insert ke pengalihan_aset
        $query = "INSERT INTO pengalihan_aset
                VALUES
                (null, :id_user, :id_aset_asal, :id_aset_tujuan, :tanggal, :jumlah, :keterangan)";

        $id_user = $_SESSION['user']['id'];
        $id_aset_asal = $data['asetAsal'];
        $id_aset_tujuan = $data['asetTujuan'];
        $tanggal = mktime(0, 0, 0, $data['bulan_pa'], $data['tanggal_pa'], $data['tanggal_pa']);
        $jumlah = $data['jumlah_pa'];
        $keterangan = $data['keterangan_pa'];

        $this->db->query($query);
        $this->db->bind('id_user', $id_user);
        $this->db->bind('id_aset_asal', $id_aset_asal);
        $this->db->bind('id_aset_tujuan', $id_aset_tujuan);
        $this->db->bind('tanggal', $tanggal);
        $this->db->bind('jumlah', $jumlah);
        $this->db->bind('keterangan', $keterangan);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_defaultAkunPemasukan($data)
    {

        $query = "INSERT INTO `pemasukan_acc`(`id`, `id_user`, `kode_pemasukan`, `nama_pemasukan`) VALUES
        ('',:id,'2111','Hasil Usaha'),
        ('',:id,'2112','Gaji'),
        ('',:id,'2113','Uang Saku'),
        ('',:id,'2114','Lain-lain');";

        $this->db->query($query);
        $this->db->bind('id', $data);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function m_defaultAkunPengeluaran($data)
    {

        $query = "INSERT INTO `pengeluaran_acc`(`id`, `id_user`, `kode_pengeluaran`, `nama_pengeluaran`) VALUES 
        ('',:id_user,'3111','Rumah'),
        ('',:id_user,'3112','Listrik'),
        ('',:id_user,'3113','Transportasi'),
        ('',:id_user,'3114','Air');";

        $this->db->query($query);
        $this->db->bind('id_user', $data);
        $this->db->execute();
        return $this->db->rowCount();
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
        return $this->db->rowCount();
    }

    public function m_defaultAkunHutang($data)
    {

        $query = "INSERT INTO `kreditur_acc`(`id`, `id_user`, `kode_kreditur`, `nama_kreditur`) VALUES
        ('',:id,'4111','kreditur 1'),
        ('',:id,'4112','kreditur 2'),
        ('',:id,'4113','kreditur 3'),
        ('',:id,'4114','kreditur 4');";

        $this->db->query($query);
        $this->db->bind('id', $data);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function m_defaultAkunPiutang($data)
    {

        $query = "INSERT INTO `debitur_acc`(`id`, `id_user`, `kode_debitur`, `nama_debitur`) VALUES
        ('',:id,'5111','debitur 1'),
        ('',:id,'5112','debitur 2'),
        ('',:id,'5113','debitur 3'),
        ('',:id,'5114','debitur 4');";

        $this->db->query($query);
        $this->db->bind('id', $data);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function m_setSaldoAwal($data)
    {
        foreach ($data as $d => $v) {
            $query = "INSERT INTO saldo_awal
                        VALUES
                        (null, :id_user, :id_aset, :jumlah)";

            $this->db->query($query);
            $this->db->bind('id_user', $_SESSION['user']['id']);
            $this->db->bind('id_aset', $d);
            $this->db->bind('jumlah', $v);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }
}