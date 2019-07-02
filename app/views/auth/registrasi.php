<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-8 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="row justify-content-center">
                                    <i class="fa fa-3x fa-dollar-sign rotate-n-15">
                                    </i>
                                    <h1 class="mx-2">DUWITKU</h1>
                                </div>
                                <div class="text-center">
                                    <h1 class="h1 text-gray-900 mb-4 mt-3">Registrasi</h1>
                                </div>
                                <form class="user" action="<?= BASEURL; ?>auth/registrasi" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nama" name="nama"
                                            placeholder="Masukan nama anda..">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email"
                                            name="email" placeholder="Masukan email...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password1"
                                            name="password1" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password2"
                                            name="password2" placeholder="Konfirmasi Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Registrasi
                                    </button>

                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> -->
                                <div class="text-center">
                                    <a class="small" href="<?= BASEURL; ?>auth/login">Sudah punya akun? Silahkan
                                        login.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>