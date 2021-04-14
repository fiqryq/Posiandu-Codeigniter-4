<?= $this->extend('user/themplates/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<!-- content -->
<div class="container-fluid">

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Tulis Pesan ke bidan</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <form action="/user/sendmessage" method="POST">
            <div class="form-group">
                <label for="formGroupExampleInput">Nama Pengirim</label>
                <input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" value="<?= session()->get('user_name'); ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Isi Pesan</label>
                <textarea class="form-control" id="pesan" name="pesan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Kirim pesan</button>
            </form>
            <!-- end form -->
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4 mb-6">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Pesan Masuk</h6>
                </div>
                <div class="card-body">
                    <!-- start form -->
                    <table id="pesanmasuk" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Pengirim</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($pesanmasuk as $key) : ?>
                        <?php $id = $key['id'] ?>
                            <tr>
                                <td><?= $key['tanggal']; ?></td>
                                <td><?= $key['nama_pengirim']; ?></td>
                                <td>
                                    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#pesanbaru<?= $id; ?>" data-whatever="@mdo">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="pesanbaru<?= $id; ?>" tabindex="-1" aria-labelledby="pesanbaru" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pesan baru</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <form>
                                            <div class="title">
                                                <div class="container-fluid">
                                                <label>pengirim : <?= $key['nama_pengirim']; ?></label>
                                                <p><?= $key['pesan']; ?></p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Balas pesan</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">Kirim pesan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- end form -->
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-4 mb-6">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-dark">Pesan Terkirim</h6>
                </div>
                <div class="card-body">
                    <!-- start form -->
                    <table id="pesankeluar" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Pengirim</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($pesanterkirim as $key) : ?>
                            <?php $id = $key['id'] ?>
                            <tr>
                                <td><?= $key['tanggal']; ?></td>
                                <td><?= $key['nama_pengirim']; ?></td>
                                <td>
                                    <a href="" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#pesanterkirim<?= $id; ?>" data-whatever="@mdo">
                                        <i class="fas fa-envelope-open-text"></i>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="pesanterkirim<?= $id; ?>" tabindex="-1" aria-labelledby="pesanterkirim" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Content -->
                                            <p><?= $key['pesan']; ?></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </table>
                    </tbody>
                    <!-- end form -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end content -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $('#pesanmasuk').DataTable();
</script>
<script>
    $('#pesankeluar').DataTable();
</script>
<?= $this->endSection(); ?>