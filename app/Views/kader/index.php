<?= $this->extend('kader/themplates/index'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js">

<!-- content -->

<div class="container-fluid">
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data Kader</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
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
                                <th>NIK</th>
                                <th>Nama Kader</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $k => $value) : ?>
                                <?php $i = 1 ?>
                                <?php $id = $value->id; ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $value->user_nik; ?></td>
                                    <td><?= $value->user_name; ?></td>
                                    <td><?= $value->user_alamat; ?></td>
                                    <td>
                                        <a href="" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editmodal" data-whatever="@mdo">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapusmodal<?= $id; ?>" data-whatever="@mdo">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Hapus Modal -->
                                <div class="modal fade" id="hapusmodal<?= $id; ?>" tabindex=" -1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <p>apakan anda yakin akan menghapus kader <?= $value->user_name; ?> ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="<?= base_url('bidan/delete_penyuluhan/' . $id) ?>" class="btn btn-danger">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->

                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!-- end  -->
                </div>
            </div>
            <!-- end form -->
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable();
</script>
<!-- end content -->
<?= $this->endSection(); ?>