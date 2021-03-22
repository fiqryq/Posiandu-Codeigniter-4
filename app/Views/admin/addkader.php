<?= $this->extend('admin/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Tambah Kader</h6>
        </div>
        <div class="card-body">
            <!-- Flash Data -->
            <?php
            if (!empty(session()->getFlashdata('berhasil'))) { ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('berhasil') ?>
                </div>
            <?php } ?>
            <!-- End Flash Data -->

            <!-- start form -->
            <form action="<?= base_url('admin/register_kader'); ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('username') ? 'is-invalid' : ''); ?>" id="username" placeholder="Masukan Username" name="username" autofocus value="<?= old('username'); ?>">
                    <div class="invalid-feedback ml-2">
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-user <?= ($validation->hasError('email') ? 'is-invalid' : ''); ?>" id="email" placeholder="Masukan Email" name="email" value="<?= old('email'); ?>">
                    <div class="invalid-feedback ml-2">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control form-control-user <?= ($validation->hasError('password') ? 'is-invalid' : ''); ?>" id="password" placeholder="Masukan Password" name="password" value="<?= old('password'); ?>">
                    <div class="invalid-feedback ml-2">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nik">NIK(Nomor induk kependudukan)</label>
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('nik') ? 'is-invalid' : ''); ?>" id="nik" placeholder="Masukan Nik" name="nik" value="<?= old('nik'); ?>">
                    <div class="invalid-feedback ml-2">
                        <?= $validation->getError('nik'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kk">KK(Nomor Kartu Keluarga)</label>
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('kk') ? 'is-invalid' : ''); ?>" id="kk" placeholder="Masukan KK" name="kk" value="<?= old('kk'); ?>">
                    <div class="invalid-feedback ml-2">
                        <?= $validation->getError('kk'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('alamat') ? 'is-invalid' : ''); ?>" id="alamat" placeholder="Masukan Alamat" name="alamat" value="<?= old('alamat'); ?>">
                    <div class="invalid-feedback ml-2">
                        <?= $validation->getError('alamat'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
            <!-- end form -->
        </div>
    </div>
</div>
<!-- end content -->
<?= $this->endSection(); ?>