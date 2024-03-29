<?= $this->extend('user/themplates/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<!-- content -->
<!-- content -->
<div class="container-fluid">
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Jadwal Imunisasi</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <!-- start  -->
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Imunisasi</th>
                        <th>Tanggal Imunisasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($imunisasi as $key) : ?>
                    <tr>
                        <td><?= $key['nama_imunisasi']; ?></td>
                        <td><?= $key['tanggal_imunisasi']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- end form -->
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">History Imunisasi Anak</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <!-- start  -->
            <table id="example2" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Tanggal Imunisasi</th>
                        <th>Nama Imunisasi</th>
                        <th>Jenis Vitamin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($pemeriksaan as $key): ?>
                    <?php $id = $key['id'] ?>
                    <tr>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $key['id_anak']; ?></td>
                        <td><?= $key['nama_anak']; ?></td>
                        <td><?= $key['tanggal_imunisasi']; ?></td>
                        <td><?= $key['nama_imunisasi']; ?></td>
                        <td><?= $key['vitamin']; ?></td>
                        <td>
                            <a href="" class="btn btn-warning btn-circle" data-toggle="modal"
                                data-target="#detail<?= $id; ?>" data-whatever="@mdo">
                                <i class="fas fa-sticky-note"></i>
                            </a>
                        </td>
                    </tr>
                    <div class="modal fade" id="detail<?= $id; ?>" tabindex="-1" aria-labelledby="detail"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Content -->
                                    <p><?= $key['catatan']; ?></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                </tbody>
            </table>
            <!-- end form -->
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

<script>
$('#example2').DataTable();
</script>


<!-- end content -->
<?= $this->endSection(); ?>