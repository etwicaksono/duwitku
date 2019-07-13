<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['judul']; ?></h1>
    <!-- flasher start -->
    <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <!-- flasher end -->

    <table class="table table-hover col-lg-12 table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center" style="width:5%">#</th>
                <th scope="col" class="text-center" style="width:20%">Tipe</th>
                <th scope="col" class="text-center" style="width:20%">Akun</th>
                <th scope="col" class="text-center" style="width:20%">Saldo</th>
            </tr>
        </thead>
        <tbody>

            <!-- start cetak aset -->
            <?php $counter = 1;
            $jumlah = 0;
            $ind = 0; ?>
            <?php
            $aset = $this->model('M_transaksi')->getAssetAccount($_SESSION['user']['id']);
            foreach ($aset as $as) : ?>
            <tr>
                <td class="text-center"><?php if ($ind == 0) echo $counter; ?></td>
                <td class="text-center"><?php if ($ind == 0) {
                                                echo 'ASET';
                                                $counter++;
                                            } ?></td>
                <td><?= $as['kode_asset'] . ' - ' . $as['nama_aset']; ?></td>
                <td class="text-right"><?php $saldo = $this->model('M_transaksi')->getSaldoByAssetId($as['id']);
                                            if ($saldo != null) {
                                                echo number_format($saldo[0]['saldo'], 0, ',', '.');
                                                $jumlah = $jumlah + $saldo[0]['saldo'];
                                            }
                                            ?>
                </td>

            </tr>
            <?php $ind++; ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td>JUMLAH</td>
                <td class="text-right"><?= number_format($jumlah, 0, ',', '.'); ?></td>
            </tr>
            <!-- end cetak aset -->

            <!-- start cetak pemasukan -->
            <?php
            $ind = 0;
            $jumlah = 0;
            $aset = $this->model('M_transaksi')->getIncomeAccount($_SESSION['user']['id']);
            foreach ($aset as $as) : ?>
            <tr>
                <td class="text-center"><?php if ($ind == 0) echo $counter; ?></td>
                <td class="text-center"><?php if ($ind == 0) {
                                                echo 'PEMASUKAN';
                                                $counter++;
                                            } ?></td>
                <td><?= $as['kode_pemasukan'] . ' - ' . $as['nama_pemasukan']; ?></td>
                <td class="text-right">
                    <?php $jml = $this->model('M_transaksi')->getPemasukanByAkunPemasukan($as['id']);
                        if ($jml[0]['jumlah'] != null) {
                            $jumlah = $jumlah + $jml[0]['jumlah'];
                            echo number_format($jml[0]['jumlah'], 0, ',', '.');
                        }
                        ?></td>

            </tr>
            <?php $ind++; ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td>JUMLAH</td>
                <td class="text-right"><?= number_format($jumlah, 0, ',', '.'); ?></td>
            </tr>
            <!-- end cetak pemasukan -->

            <!-- start cetak pengeluaran -->
            <?php
            $ind = 0;
            $jumlah = 0;
            $aset = $this->model('M_transaksi')->getOutcomeAccount($_SESSION['user']['id']);
            foreach ($aset as $as) : ?>
            <tr>
                <td class="text-center"><?php if ($ind == 0) echo $counter; ?></td>
                <td class="text-center"><?php if ($ind == 0) {
                                                echo 'PENGELUARAN';
                                                $counter++;
                                            } ?></td>
                <td><?= $as['kode_pengeluaran'] . ' - ' . $as['nama_pengeluaran']; ?></td>
                <td class="text-right"><?php $jml = $this->model('M_transaksi')->getPengeluaranByAkunPengeluaran($as['id']);
                                            if ($jml[0]['jumlah'] != null) {
                                                $jumlah = $jumlah + $jml[0]['jumlah'];
                                                echo number_format($jml[0]['jumlah'], 0, ',', '.');
                                            }
                                            ?></td>

            </tr>
            <?php $ind++; ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td>JUMLAH</td>
                <td class="text-right"><?= number_format($jumlah, 0, ',', '.'); ?></td>
            </tr>
            <!-- end cetak pengeluaran -->

            <!-- start cetak hutang -->
            <?php
            $ind = 0;
            $jumlah = 0;
            $aset = $this->model('M_transaksi')->getDebtAccount($_SESSION['user']['id']);
            foreach ($aset as $as) : ?>
            <tr>
                <td class="text-center"><?php if ($ind == 0) echo $counter; ?></td>
                <td class="text-center"><?php if ($ind == 0) {
                                                echo 'HUTANG';
                                                $counter++;
                                            } ?></td>
                <td><?= $as['kode_kreditur'] . ' - ' . $as['nama_kreditur']; ?></td>
                <td class="text-right"><?php $jml = $this->model('M_transaksi')->getHutangByIdKreditur($as['id']);
                                            if ($jml[0]['jumlah'] != null) {
                                                $jumlah = $jumlah + $jml[0]['jumlah'];
                                                echo number_format($jml[0]['jumlah'], 0, ',', '.');
                                            }
                                            ?></td>

            </tr>
            <?php $ind++; ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td>JUMLAH</td>
                <td class="text-right"><?= number_format($jumlah, 0, ',', '.'); ?></td>
            </tr>
            <!-- end cetak hutang -->

            <!-- start cetak piutang -->
            <?php
            $ind = 0;
            $jumlah = 0;
            $aset = $this->model('M_transaksi')->getCreditAccount($_SESSION['user']['id']);
            foreach ($aset as $as) : ?>
            <tr>
                <td class="text-center"><?php if ($ind == 0) echo $counter; ?></td>
                <td class="text-center"><?php if ($ind == 0) {
                                                echo 'PIUTANG';
                                                $counter++;
                                            } ?></td>
                <td><?= $as['kode_debitur'] . ' - ' . $as['nama_debitur']; ?></td>
                <td class="text-right"><?php $jml = $this->model('M_transaksi')->getPiutangByIdDebitur($as['id']);
                                            if ($jml[0]['jumlah'] != null) {
                                                $jumlah = $jumlah + $jml[0]['jumlah'];
                                                echo number_format($jml[0]['jumlah'], 0, ',', '.');
                                            }
                                            ?></td>

            </tr>
            <?php $ind++; ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td>JUMLAH</td>
                <td class="text-right"><?= number_format($jumlah, 0, ',', '.'); ?></td>
            </tr>
            <!-- end cetak piutang -->

        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->