<?= $this->extend('kader/themplates/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js">
<!-- content -->
<div class="container-fluid">
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
            if (!empty(session()->getFlashdata('edit'))) { ?>
    <div class="alert alert-success">
        <?php echo session()->getFlashdata('edit') ?>
    </div>
    <?php } ?>
    <!-- End Flash Data -->

    <?php
            if (!empty(session()->getFlashdata('hapus'))) { ?>
    <div class="alert alert-success">
        <?php echo session()->getFlashdata('hapus') ?>
    </div>
    <?php } ?>
    <!-- End Flash Data -->

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Data Keluarga</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <!-- start  -->
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Kartu Keluarga</th>
                        <th>Action</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach($user as $key => $value) : $slug = $value->user_kk?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $value->user_kk; ?></td>
                        <td>
                            <a href="/kader/detailkeluarga/<?= $slug; ?>" class="btn btn-primary btn-circle">
                                <i class="fas fa-list"></i>
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
<script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable({
        order: [
            [2, 'asc']
        ],
        rowGroup: {
            dataSrc: 2
        }
    });
});
</script>
<!-- end content -->
<?= $this->endSection(); ?>