<?= $this->extend('kader/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- content -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Detail Posiandu</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama anak</th>
                        <th>Nama Imunisasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach($detail as $key): ?>
                    <?php $id = $key['id']; ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $key['nama_anak']; ?></td>
                        <td><?= $key['nama_imunisasi']; ?></td>
                        <td>
                            <a href="" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editmodal<?= $id; ?>" data-whatever="@mdo">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                        <!-- Edit Modal -->
                        <div class="modal fade" id="editmodal<?= $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Keterangan <?= $key['nama_imunisasi']; ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Content -->
                                        <form action="/kader/addcatatan" method="POST">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput">Nama Anak</label>
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $key['nama_anak']; ?>">
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Id anak</label>
                                                            <input type="text"  class="form-control" id="id_anak" name="id_anak" value="<?= $key['id_anak']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">No KK</label>
                                                            <input type="text"  class="form-control" id="no_kk" name="no_kk" value="<?= $key['no_kk']; ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">Tanggal Imunisasi</label>
                                                                <input type="text"  class="form-control" id="tanggal_imunisasi" name="tanggal_imunisasi" value="<?= $key['tanggal_imunisasi']; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="formGroupExampleInput">Nama Imunisasi</label>
                                                                <input type="text"  class="form-control" id="nama_imunisasi"  name="nama_imunisasi" value="<?= $key['nama_imunisasi']; ?>">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Berat</label>
                                                            <input type="number" class="form-control" id="berat" name="berat" placeholder="masukan berat anak">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Tinggi</label>
                                                            <input type="number" class="form-control" id="tinggi" name="tinggi" placeholder="masukan tinggi anak">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Lingkar Badan</label>
                                                            <input type="number" class="form-control" id="lingkarbadan" name="lingkarbadan" placeholder="masukan linkar badan">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="formGroupExampleInput">Lingkar Kepala</label>
                                                            <input type="number" class="form-control" id="lingkarkepala" name="lingkarkepala" placeholder="masukan lingkar kepala">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Tambahkan catatan</label>
                                                    <textarea class="form-control" id="catatan" name="catatan" rows="4"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <div><button type="submit" class="btn btn-primary">Submit</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    <?php endforeach; ?>
                </tbody>
            </table>
      

            <!-- Hapus Modal -->
            <div class="modal fade" id="hapusmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

            <!-- Tambah Modal -->
            <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Content -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

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