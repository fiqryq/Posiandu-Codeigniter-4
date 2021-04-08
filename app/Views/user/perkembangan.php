<?= $this->extend('user/themplates/index'); ?>
<?= $this->section('content'); ?>

<!-- content -->
<div class="container-fluid">
  <!-- Add button -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahmodal" data-whatever="@mdo">
            <i class="fas fa-plus fa-sm text-white-50">
            </i>Tambah Anak</button>
    </div>

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Perkembangan Anak</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <!-- start  -->
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anak</th>
                        <th>Berat Badan</th>
                        <th>Umur Anak</th>
                        <th>Tinggi Badan</th>
                        <th>Jenis Kelamin</th>
                        <th>Lingkar Kepala</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($anak as $data) :
                        $id = $data['id'];
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama_anak'] ?></td>
                            <td><?= $data['berat_anak'] ?> Kg</td>
                            <td><?= $data['umur_anak'] ?></td>
                            <td><?= $data['tinggi_anak'] ?> cm</td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= $data['lingkar_kepala'] ?> cm</td>
                            <td>
                                <a href="<?= base_url('user/detail/' . $id); ?>" class="btn btn-primary btn-circle">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- end form -->
        </div>
    </div>
</div>

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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script>
    $('#example').DataTable();
</script>

<!-- end content -->
<?= $this->endSection(); ?>