<?= $this->extend('bidan/themplates/index'); ?>
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
                        <td>Nomor NIK</td>
                        <td><?php echo session()->get('user_nik'); ?></td>
                    </tr>
                    <tr>
                        <td>No Tlp</td>
                        <td><?php echo session()->get('user_phone'); ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo session()->get('user_alamat'); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <a href="<?= base_url('bidan/edit_profile') ?>" class="btn btn-primary btn-block"> Edit Profile</a>
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