<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['judul']; ?></h1>

    <div class="row col-lg-12 justify-content-center">
        <div class="col-lg-6 text-center">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 mb-4">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#newAkunPemasukanModal"
                id="tambahAkunPemasukan">Tambah
                Akun Pemasukan</a>
        </div>
    </div>
    <table class="table table-hover col-lg-12 table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width:5%">#</th>
                <th scope="col" class="text-center" style="width:10%">Kode</th>
                <th scope="col" class="text-center" style="width:10%">Akun</th>
                <th scope="col" class="text-center" style="width:10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $transaksi = $this->model('M_transaksi')->getIncomeAccount($_SESSION['user']['id']);
            ?>
            <?php $counter = 1; ?>
            <?php foreach ($transaksi as $tr) : ?>

            <tr>
                <th scope="row" class="text-center"><?= $counter; ?></th>
                <td><?= $tr['kode_pemasukan']; ?></td>
                <td><?= $tr['nama_pemasukan']; ?></td>
                <td class="text-center">
                    <a href="#" class="btn btn-info my-1 mx-3 tampilEditAkunPemasukanModal" data-toggle="modal"
                        data-target="#newAkunPemasukanModal" data-id="<?= $tr['id']; ?>"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-danger my-1 mx-3 tampilDeleteAkunPemasukanModal" data-toggle="modal"
                        data-target="#deleteAkunPemasukan" data-id="<?= $tr['id']; ?>"><i
                            class="fas fa-trash-alt"></i></a>
                </td>

            </tr>
            <?php $counter++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- modal tambah aset-->
<div class="modal fade" id="newAkunPemasukanModal" tabindex="-1" role="dialog"
    aria-labelledby="newAkunPemasukanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAkunPemasukanModalLabel">Tambah Akun Pemasukan Baru</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASEURL; ?>akun/c_tambahAkunPemasukan" method="post" id="formAkun">
                <input type="hidden" name="id_aset" id="id_aset">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kode_akun" class="col-3 col-form-label">Kode Akun</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="kode_akun" name="kode_akun"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_akun" class="col-3 col-form-label">Nama Akun</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="nama_akun" name="nama_akun" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- delete modal-->
<div class="modal fade" id="deleteAkunPemasukan" tabindex="-1" role="dialog" aria-labelledby="deleteAkunPemasukanLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAkunPemasukanLabel">Hapus akun pemasukan ini?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih hapus jika anda yakin untuk menghapus data ini. Setiap perubahan tidak bisa
                dikembalikan.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" id="hapusAkunAset" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>