<?= $this->extend('admin/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- content -->
<div class="container-fluid">
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Edit Profile</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control form-control-user" id="username" placeholder="Masukan Username" name="username" autofocus>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-control-user" id="email" placeholder="Masukan Email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control form-control-user" id="password" placeholder="Masukan Password" name="password">
                </div>
                <div class="form-group">
                    <label for="nik">NIK(Nomor induk kependudukan)</label>
                    <input type="text" class="form-control form-control-user" id="nik" placeholder="Masukan Nik" name="nik">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control form-control-user" id="alamat" placeholder="Masukan Alamat" name="alamat">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
            <!-- end form -->
        </div>
    </div>
</div>
<!-- end content -->
<?= $this->endSection(); ?>