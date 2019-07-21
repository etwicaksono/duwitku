<div class="container">
    <?php var_dump($_COOKIE);
    die; ?>
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
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <?php Flasher::flash(); ?>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="h1 text-gray-900 mb-4 mt-3">Login</h1>
                                </div>
                                <form class="user" action="<?= BASEURL; ?>auth/login" method="post">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="rememberMe"
                                                name="rememberMe">
                                            <label class="custom-control-label" for="rememberMe">Ingat saya</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> -->
                                <div class="text-center">
                                    <a class="small" href="<?= BASEURL; ?>auth/registrasi">Belum punya akun? daftar di
                                        sini!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>