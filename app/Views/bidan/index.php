<?= $this->extend('bidan/themplates/index'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">


<!-- content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahmodal" data-whatever="@mdo">
            <i class="fas fa-plus fa-sm text-white-50">
            </i>Tambah Penyuluhan</button>
    </div>

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Penyuluhan</h6>
        </div>
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
                        <th>Id</th>
                        <th>Kegiatan Penyuluhan</th>
                        <th>Tanggal Penyluhan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($penyuluhan as $k) : ?>
                        <?php $id = $k['id'] ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $k['id']; ?></td>
                            <td><?= $k['kegiatan']; ?></td>
                            <td><?= $k['date']; ?></td>
                            <td>
                                <a href="" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editmodal" data-whatever="@mdo">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapusmodal" data-whatever="@mdo">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
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
                <p>apakan anda yakin akan menghapus penyuluhan?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('bidan/delete_penyuluhan/' . $id) ?>" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Edit Modal -->
<div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Penyuluhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Content -->
                <form action="/bidan/addpenyuluhan" action="POST">
                    <div class="form-group">
                        <label for="kegiatan" class="col-form-label">Nama kegiatan</label>
                        <input type="text" id="kegiatan" class="form-control" name="kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="tanggal" class="col-form-label">Tanggal kegiatan</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" class="form-control" name="date">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <div><button type="submit" class="btn btn-primary">Submit</button></div>
                    </div>
                </form>
                <!-- end content -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- end content -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/vendor/date/dist/js/bootstrap-datepicker.js"></script>

<script>
    $('#example').DataTable();
</script>

<script>
    $('.datepicker').datepicker({
        format: 'yyy/mm/dd',
        startDate: '-3d'
    });
</script>

<?= $this->endSection(); ?>