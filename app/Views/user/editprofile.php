<?= $this->extend('user/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- content -->
<div class="container-fluid">
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Edit Profile</h6>
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
            <?php $id = session()->get('id') ?>
            <form action="<?= base_url('/auth/editProfile/' . $id); ?>" method="POST">
                <? csrf_field();  ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control form-control-user" value="<?= session()->get('user_name'); ?>" id="username" placeholder="Masukan username" name="username" autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-user" value="<?= session()->get('user_email'); ?>" id="email" placeholder="Masukan Email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control form-control-user" value="<?= session()->get('user_password'); ?>" id="password" placeholder="Masukan Password" name="password">
                </div>
                <div class="form-group">
                    <label for="nik">NIK(Nomor induk kependudukan)</label>
                    <input type="text" class="form-control form-control-user" id="nik" value="<?= session()->get('user_nik'); ?>" placeholder="Masukan NIK" name="nik">
                </div>
                <div class="form-group">
                    <label for="kk">KK(Nomor KK)</label>
                    <input type="text" class="form-control form-control-user" id="kk" value="<?= session()->get('user_kk'); ?>" placeholder="Masukan KK" name="kk">
                </div>
                <div class="form-group">
                    <label for="phone">No Telp</label>
                    <input type="text" class="form-control form-control-user" id="phone" value="<?= session()->get('user_phone'); ?>" placeholder="Masukan no tlp" name="phone">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control form-control-user" id="alamat" value="<?= session()->get('user_alamat'); ?>" placeholder="Masukan Alamat" name="alamat">
                </div>
                <button class=" btn btn-primary btn-block" type="submit">Edit</button>
            </form>
            <!-- end form -->
        </div>
    </div>
</div>
<!-- end content -->
<?= $this->endSection(); ?>