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
                <th scope="col" class="text-center" style="width:5%">ID</th>
                <th scope="col" class="text-center" style="width:10%">Username</th>
                <th scope="col" class="text-center" style="width:10%">Role</th>
                <th scope="col" class="text-center" style="width:10%">Tanggal gabung</th>
                <th scope="col" class="text-center" style="width:10%">Foto</th>
                <th scope="col" class="text-center" style="width:10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $user = $this->model('M_admin')->getAllUser(); ?>
            <?php $counter = 1; ?>
            <?php foreach ($user as $u) : ?>
            <tr>
                <th scope="row" class="text-center"><?= $counter; ?></th>
                <td class="text-center"><?= $u['id']; ?></td>
                <td><?= $u['username']; ?></td>
                <td class="text-center"><?php if ($u['role_id'] == 1) {
                                                echo 'Admin';
                                            } else {
                                                echo 'Member';
                                            } ?></td>
                <td class="text-center"><?= date('d-m-Y', $u['tgl_daftar']); ?></td>
                <td><img src="<?= BASEURL . 'img/profile/' . $u['foto']; ?>" alt="" class="img-thumbnail"></td>
                <td class="text-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                            data-id="<?= $u['id']; ?>" <?php if ($u['is_active'] == 1) echo 'checked'; ?>>
                        <label class="form-check-label" for="is_active">
                            is active
                        </label>
                    </div>
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