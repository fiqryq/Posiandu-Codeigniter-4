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
                                <!-- Form start -->
                                <form class="user" action="<?= base_url('auth/register_user'); ?>" method="POST">
                                    <?php csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" id="username" placeholder="Masukan Username" name="username" autofocus value="<?= old('username'); ?>">
                                        <div class="invalid-feedback ml-2">
                                            <?= $validation->getError('username'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" id="email" placeholder="Masukan Email" name="email" value="<?= old('email'); ?>">
                                        <div class="invalid-feedback ml-2">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" id="password" placeholder="Masukan Password" name="password" value="<?= old('password'); ?>">
                                        <div class="invalid-feedback ml-2">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('nik') ? 'is-invalid' : ''); ?>" id="nik" placeholder="Masukan Nik" name="nik" value="<?= old('nik'); ?>">
                                        <div class="invalid-feedback ml-2">
                                            <?= $validation->getError('nik'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('kk') ? 'is-invalid' : ''); ?>" id="kk" placeholder="Masukan Nomor KK" name="kk" value="<?= old('kk'); ?>">
                                        <div class="invalid-feedback ml-2">
                                            <?= $validation->getError('kk'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>" id="alamat" placeholder="Masukan Alamat" name="alamat" value="<?= old('alamat'); ?>">
                                        <div class="invalid-feedback ml-2">
                                            <?= $validation->getError('alamat'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                                </form>
                                <!-- End Form -->
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