<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['judul']; ?></h1>

    <div class="row col-lg-12 justify-content-center">
        <div class="col-lg-6 text-center">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <table class="table table-hover col-lg-12 table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width:5%">#</th>
                <th scope="col" class="text-center" style="width:10%">Tanggal</th>
                <th scope="col" class="text-center" style="width:10%">Akun</th>
                <th scope="col" class="text-center" style="width:10%">Jumlah</th>
                <th scope="col" class="text-center" style="width:10%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $transaksi = $this->model('M_transaksi')->getPiutangByr($_SESSION['user']['id']);
            ?>
            <?php $counter = 1; ?>
            <?php foreach ($transaksi as $tr) : ?>

            <tr>
                <th scope="row" class="text-center"><?= $counter; ?></th>
                <td><?= date('d F Y', $tr['tanggal']); ?></td>
                <td><?= $tr['id_piutang'] . " - " . $tr['kode_debitur'] . " - " . $tr['nama_debitur']; ?></td>
                <td class="text-right">
                    <?= number_format($tr['jumlah'], 0, ',', '.'); ?>
                </td>
                <td><?= $tr['keterangan']; ?></td>

            </tr>
            <?php $counter++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->