<?= $this->extend('user/themplates/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

<!-- content -->
<div class="container-fluid">
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Jadwal Posiandu</h6>
        </div>
        <div class="card-body">
            <!-- start  -->
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1  ?>
                    <?php foreach ($posiandu as $key) : ?>
                    <?php 
                          $mulairaw = $key['waktu_mulai'];
                          $mulai = date('H:i', strtotime($mulairaw));
                          $selesairaw = $key['waktu_selesai'];
                          $selesai = date('H:i', strtotime($selesairaw));
                        ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $key['hari']; ?></td>
                        <td><?= $key['tanggal_posiandu']; ?></td>
                        <td><?= $mulai ?> - <?= $selesai ?></td>
                    </tr>
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

<!-- end content -->
<?= $this->endSection(); ?>