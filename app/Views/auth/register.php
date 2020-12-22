<?= $this->extend('auth/themplates/index'); ?>
<?= $this->section('konten'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
                                </div>

                                <form class="user" action="/auth/register_user" method="POST">
                                    <?php csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" placeholder="Masukan Username" name="username" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email" placeholder="Masukan Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Masukan Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="nik" placeholder="Masukan Nik" name="nik">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="alamat" placeholder="Masukan Alamat" name="alamat">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>

                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('/') ?>">Sudah Punya Akun?</a>
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