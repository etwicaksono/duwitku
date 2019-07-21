<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['judul']; ?></h1>
    <div class="col-6 mx-auto text-center">
        <?php Flasher::flash(); ?>

    </div>
    <form action="<?= BASEURL . 'pengaturan/userSetting'; ?>" method="post" class="col-6">
        <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div>


        <div class="form-group row">
            <div class="col-4"></div>
            <div class="col-sm-8">
                <button type="submit" class="btn btn-primary align-items-end">Simpan</button>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->