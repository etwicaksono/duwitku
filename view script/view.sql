#untuk membuat view yang menampilkan semua saldo tiap aset
CREATE VIEW saldo_aset
AS
SELECT a.id_user id_user,
a.id id_aset,    
(
    (SELECT IFNULL(SUM(jumlah),0)
     FROM pemasukan p
     WHERE p.id_aset = a.id)
    -
    (SELECT IFNULL(SUM(jumlah),0)
     FROM pengeluaran k
     WHERE k.id_aset = a.id)

    +

    (SELECT IFNULL(SUM(jumlah),0)
     FROM hutang h
     WHERE h.id_aset = a.id)
    -
    (SELECT IFNULL(SUM(jumlah),0)
     FROM hutang_byr hby
     WHERE hby.id_aset = a.id)

    -

    (SELECT IFNULL(SUM(jumlah),0)
     FROM piutang p
     WHERE p.id_aset = a.id)
    +
    (SELECT IFNULL(SUM(jumlah),0)
     FROM piutang_byr pby
     WHERE pby.id_aset = a.id)

    -

    (SELECT IFNULL(SUM(jumlah),0)
     FROM pengalihan_aset p
     WHERE p.id_aset_asal = a.id)
    +
    (SELECT IFNULL(SUM(jumlah),0)
     FROM pengalihan_aset pby
     WHERE pby.id_aset_tujuan = a.id)

    +

    (SELECT IFNULL(SUM(jumlah),0)
     FROM saldo_awal p
     WHERE p.id_aset = a.id)
) saldo
FROM aset a

#===================================================

#membuat view untuk menampilkan jumlah hutang
CREATE VIEW saldo_hutang
AS
SELECT *,
		h.jumlah - (SELECT IFNULL(SUM(jumlah),0)
			FROM hutang_byr hby
		WHERE hby.id_hutang = h.id
		) jumlah_hutang

FROM hutang h

#===================================================

#membuat view untuk menampilkan jumlah piutang
CREATE VIEW saldo_piutang
AS
SELECT *,
		p.jumlah - (SELECT IFNULL(SUM(jumlah),0)
			FROM piutang_byr pby
		WHERE pby.id_piutang = p.id
		) jumlah_piutang

FROM piutang p