<?= $this->extend('admin/themplates/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Flash Data -->
            <?php
            if (!empty(session()->getFlashdata('pesan'))) { ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('pesan') ?>
                </div>
            <?php } ?>
            <!-- End Flash Data -->

            <!-- start  -->
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nik</th>
                        <th>Role</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($user as $k) : ?>
                        <?php $lv = $k['level']; ?>
                        <?php $id = $k['id'] ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $k['user_name'] ?></td>
                            <td><?= $k['user_email'] ?></td>
                            <td><?= $k['user_nik']; ?></td>
                            <td><?php if ($lv == 0) {
                                    echo "orang tua";
                                } elseif ($lv == 1) {
                                    echo "admin";
                                } elseif ($lv == 2) {
                                    echo "bidan";
                                } elseif ($lv == 3) {
                                    echo "kader";
                                } ?></td>
                            <td><?= $k['user_alamat']; ?></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editmodal" data-whatever="@mdo">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusmodal" data-whatever="@mdo">Hapus</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- end  -->
        </div>
    </div>
</div>

<!-- Hapus Modal -->
<div class="modal fade" id="hapusmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Content -->
                <p>apakan anda yakin akan menghapus user?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('auth/delete_user/' . $id) ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Content -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="#" class="btn btn-success">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable();
</script>

<?= $this->endSection(); ?>