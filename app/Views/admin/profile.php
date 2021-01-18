<?= $this->extend('admin/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- content -->
<div class="container-fluid">
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Profile</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td><?php echo session()->get('user_name'); ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo session()->get('user_email'); ?></td>

                    </tr>
                    <tr>
                        <td>Nik</td>
                        <td><?php echo session()->get('user_nik'); ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo session()->get('user_alamat'); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a class="btn btn-primary btn-block" href="<?= base_url('admin/edit_profile') ?>">Edit profile</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- end form -->
        </div>
    </div>
</div>

<!-- end content -->
<?= $this->endSection(); ?>