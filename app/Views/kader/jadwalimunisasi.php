<?= $this->extend('kader/themplates/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<!-- content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#tambahmodal" data-whatever="@mdo">
            <i class="fas fa-plus fa-sm text-white-50">
            </i>Tambah Jadwal</button>
    </div>

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Jadwal Imunisasi</h6>
        </div>
        <div class="card-body">

            <!-- Flash Data -->
            <?php
            if (!empty(session()->getFlashdata('tambah'))) { ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('tambah') ?>
            </div>
            <?php } ?>
            <!-- End Flash Data -->

            <!-- Flash Data -->
            <?php
            if (!empty(session()->getFlashdata('delete'))) { ?>
            <div class="alert alert-danger">
                <?php echo session()->getFlashdata('delete') ?>
            </div>
            <?php } ?>
            <!-- End Flash Data -->

            <!-- Flash Data -->
            <?php
            if (!empty(session()->getFlashdata('update'))) { ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('update') ?>
            </div>
            <?php } ?>
            <!-- End Flash Data -->

            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Imunisasi</th>
                        <th>Nama Imunisasi</th>
                        <th>Tanggal Imunisasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php 
                    foreach ($imunisasi as $k) : 
                        $slug = $k['tanggal_imunisasi'] ?>
                    <?php $id = $k['id'] ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $id; ?></td>
                        <td><?= $k['nama_imunisasi']; ?></td>
                        <td><?= $k['tanggal_imunisasi']; ?></td>
                        <td>
                            <a href="/kader/detailImunisasi/<?= $slug; ?>" class="btn btn-primary btn-circle">
                                <i class="fas fa-list"></i>
                            </a>
                            <a href="" class="btn btn-success btn-circle" data-toggle="modal"
                                data-target="#editmodal<?= $id; ?>" data-whatever="@mdo">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-circle" data-toggle="modal"
                                data-target="#hapusmodal<?= $id; ?>" data-whatever="@mdo">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <!-- Edit Modal -->
                <div class="modal fade" id="editmodal<?= $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Imunisasi</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Content -->
                                <form action="<?= base_url('/kader/editimunisasi/' . $id); ?>" action="POST">
                                    <div class="form-group">
                                        <label for="imunisasi" class="col-form-label">Nama Imunisais</label>
                                        <input type="text" id="imunisasi" class="form-control" name="imunisasi"
                                            value="<?= $k['nama_imunisasi']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal" class="col-form-label">Tanggal kegiatan</label>
                                        <input type="date" class="form-control" id="date" placeholder="pilih tanggal"
                                            name="date">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <div><button type="submit" class="btn btn-primary">Submit</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

                <!-- Hapus Modal -->
                <div class="modal fade" id="hapusmodal<?= $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Content -->
                                <p>apakah anda akan menghapus <?= $k['nama_imunisasi']; ?></p>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <div>
                                    <a href="<?= base_url('kader/deleteImunisasi/' . $id) ?>"
                                        class="btn btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    <?php endforeach ?>
                    <!-- End Modal -->
            </table>
            <!-- Tambah Modal -->
            <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Imunisasi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Content -->
                            <form action="/kader/addimunisasi" action="POST">
                                <div class="form-group">
                                    <label for="imunisasi" class="col-form-label">Nama Imunisasi</label>
                                    <input type="text" id="kegiatan" class="form-control" name="imunisasi"
                                        placeholder="masukan nama imunisasi">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal" class="col-form-label">Tanggal kegiatan</label>
                                    <input type="date" class="form-control" id="date" placeholder="pilih tanggal"
                                        name="date">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <div><button type="submit" class="btn btn-primary">Submit</button></div>
                                </div>
                            </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>
$('#example').DataTable();
</script>

<!-- end content -->
<?= $this->endSection(); ?>