<?= $this->extend('admin/themplates/index'); ?>
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
            <!-- start form -->
            <form action="<?= base_url('admin/editprofile/'. $id); ?>" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control form-control-user" id="username"
                        value="<?php echo session()->get('user_name'); ?>" name="username" autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-user" id="email"
                        value="<?php echo session()->get('user_email'); ?>" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control form-control-user" id="password"
                        placeholder="***********" name="password">
                </div>
                <div class="form-group">
                    <label for="nik">NIK(Nomor induk kependudukan)</label>
                    <input type="text" class="form-control form-control-user" id="nik"
                        value="<?php echo session()->get('user_nik'); ?>" name="nik">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control form-control-user" id="alamat"
                        value="<?php echo session()->get('user_alamat'); ?>" name="alamat">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
            <!-- end form -->
        </div>
    </div>
</div>
<!-- end content -->
<?= $this->endSection(); ?>