<?= $this->extend('kader/themplates/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js">
<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data Orangtua</h6>
        </div>
        <div class="card-body">
            <!-- start  -->
            <table id="orangtua" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nik</th>
                        <th>Alamat</th>
                        <th>No Tlp</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($orangtua as $key => $value): 
                            $is_parent = $value->is_parent;
                            if ($is_parent == 1) {
                                $is_parent = "Ibu";
                            } else if($is_parent == 2) {
                                $is_parent = "Ayah";
                            }
                        ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $value->user_name; ?></td>
                        <td><?= $value->user_nik; ?></td>
                        <td><?= $value->user_alamat; ?></td>
                        <td><?= $value->user_phone; ?></td>
                        <td><?= $is_parent;  ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- end form -->
        </div>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#tambahmodal" data-whatever="@mdo">
            <i class="fas fa-plus fa-sm text-white-50">
            </i>Tambah Data Anak</button>
    </div>

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data Anak</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <!-- start  -->
            <table id="anak" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nik</th>
                        <th>tanggal lahir</th>
                        <th>umur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($detail as $key): ?>
                    <?php $id = $key['id'] ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $key['nama_anak']; ?></td>
                        <td><?= $key['nik']; ?></td>
                        <td><?= $key['tanggal_lahir']; ?></td>
                        <td><?= $key['umur']; ?></td>
                        <td>
                            <button class="btn btn-success btn-circle" data-toggle="modal"
                                data-target="#editmodal<?= $id; ?>">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editmodal<?= $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit data <?= $key['nama_anak']; ?>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Content -->
                                    <form action="<?= base_url('/kader/editanak/' . $id); ?>" action="POST">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Nama</label>
                                            <input type="text" class="form-control" id="nama" placeholder="masukan nama"
                                                name="nama" value="<?= $key['nama_anak']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="date"
                                                    placeholder="pilih tanggal" name="date">
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">Umur</label>
                                                <input type="number" class="form-control" id="umur"
                                                    placeholder="masukan umur" name="umur" value="<?= $key['umur']; ?>">
                                            </div>
                                            <div class="form-group" hidden>
                                                <label for="formGroupExampleInput2">No KK</label>
                                                <input type="text" class="form-control" id="kk"
                                                    placeholder="masukan no kk" name="no_kk"
                                                    value="<?= $key['no_kk']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="formGroupExampleInput2">NIK</label>
                                                <input type="text" class="form-control" id="nik"
                                                    placeholder="masukan nik" name="nik" value="<?= $key['nik']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true" id="hapusmodal<?= $id; ?>">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                ...
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- end form -->
        </div>
    </div>

    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data anak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Content -->
                    <form action="/kader/addanak" action="POST">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="masukan nama" name="nama">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="date" placeholder="pilih tanggal"
                                    name="date">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Umur</label>
                                <input type="number" class="form-control" id="umur" placeholder="masukan umur"
                                    name="umur">
                            </div>
                            <div class="form-group" hidden>
                                <label for="formGroupExampleInput2">No KK</label>
                                <input type="text" class="form-control" id="kk" placeholder="masukan no kk" name="no_kk"
                                    value="<?= $key['no_kk']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">NIK</label>
                                <input type="text" class="form-control" id="nik" placeholder="masukan nik" name="nik">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
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
$('#orangtua').DataTable();
</script>
<script>
$('#anak').DataTable();
</script>

<!-- end content -->
<?= $this->endSection(); ?>