<?= $this->extend('auth/themplates/index'); ?>
<?= $this->section('konten'); ?>


<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Dipandu</h1>
                                </div>
                                <form class="user" method="POST" action="<?= base_url('auth/login_action'); ?>">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                    </div>

                                    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                </form>
                                <!-- flash data on failed login -->
                                <p>
                                    <?php
                                    if (!empty(session()->getFlashdata('gagal'))) { ?>
                                        <div class="alert alert-warning">
                                            <?php echo session()->getFlashdata('gagal') ?>
                                        </div>
                                    <?php } ?>
                                </p>
                                <!-- Login Failed -->
                                <p>
                                    <?php
                                    if (!empty(session()->getFlashdata('warning'))) { ?>
                                        <div class="alert alert-danger">
                                            <?php echo session()->getFlashdata('warning') ?>
                                        </div>
                                    <?php } ?>
                                </p>
                                <p>
                                    <?php
                                    if (!empty(session()->getFlashdata('berhasil'))) { ?>
                                        <div class="alert alert-success">
                                            <?php echo session()->getFlashdata('berhasil') ?>
                                        </div>
                                    <?php } ?>
                                </p>
                                <hr>
                                <!-- <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> -->
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('home/register')  ?>">Buat Akun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>