<?= $this->extend('bidan/themplates/index'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js">

<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Daftar Artikel</h6>
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

            <!-- Flash Data -->
            <?php
            if (!empty(session()->getFlashdata('update'))) { ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('update') ?>
                </div>
            <?php } ?>
            <!-- End Flash Data -->

            <!-- start  -->
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Artikel</th>
                        <th>Penulis</th>
                        <th>Tanggal Publikasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($artikel as $key) : ?>
                        <?php $id = $key['id'] ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $key['judul']; ?></td>
                            <td><?= $key['penulis']; ?></td>
                            <td><?= $key['created_at']; ?></td>
                            <td>
                                <a href="" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editmodal<?= $id; ?>" data-whatever="@mdo">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapusmodal<?= $id; ?>" data-whatever="@mdo">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <!-- Hapus Modal -->
                        <div class="modal fade" id="hapusmodal<?= $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <p>Apakan anda yakin akan menghapus artikel <?= $key['judul']; ?>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('bidan/delete_artikel/' . $id) ?>" class=" btn btn-danger">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editmodal<?= $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('/bidan/editarticle/' . $id); ?>" method="POST">
                                            <div class="form-group">
                                                <label for="Judul Artikel">Judul Artikel</label>
                                                <input name="judul" type="text" class="form-control" id="judul" autofocus placeholder="masukan judul artikel" value="<?= $key['judul']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="isiartikel">Artikel</label>
                                                <textarea name="isiartikel" class="form-control" id="isiartikel" rows="3" placeholder="masukan isi artikel"><?= $key['body']; ?></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">Edit Article</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Buat Artikel</h6>
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
            <form action="/bidan/createarticle" method="POST">
                <div class="form-group">
                    <label for="Judul Artikel">Judul Artikel</label>
                    <input name="judul" type="text" class="form-control" id="judul" autofocus placeholder="masukan judul artikel">
                </div>
                <div class="form-group">
                    <label for="isiartikel">Artikel</label>
                    <textarea name="isiartikel" class="form-control" id="isiartikel" rows="5" placeholder="masukan isi artikel"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit Artikel</button>
            </form>
            <!-- end form -->
        </div>
    </div>
</div>

<!-- end content -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable();
</script>
<!-- end content -->
<?= $this->endSection(); ?>