<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $data['judul']; ?></h1>
    <div class="col-6 mx-auto text-center">
        <?php Flasher::flash(); ?>

    </div>
    <form action="<?= BASEURL . 'pengaturan/gantiPassword'; ?>" method="post" class="col-6">
        <div class="form-group row">
            <label for="password1" class="col-sm-4 col-form-label">Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password1" placeholder="Password Baru" name="password1">
            </div>
        </div>
        <div class="form-group row">
            <label for="password2" class="col-sm-4 col-form-label">Ulang Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password2" placeholder="Ulang Password Baru"
                    name="password2">
            </div>
        </div>
        <div class="form-group row">
            <label for="password3" class="col-sm-4 col-form-label">Password Lama</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="password3" placeholder="Password Lama" name="password3">
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