<?= $this->extend('bidan/themplates/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<!-- content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-caret-down fa-sm text-white-50">
            </i>Tambah Penyuluhan</button>

        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Januari</a>
            <a class="dropdown-item" href="#">Februari</a>
        </div>
    </div>

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Laporan Bulanan Januari</h6>
        </div>
        <div class="card-body">

            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kegiatan</th>
                        <th>Anak</th>
                        <th>Dewasa</th>
                        <th>Bumil</th>
                        <th>Lansia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Penyuluhan</td>
                        <td>1</td>
                        <td>3</td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Pemeriksaan</td>
                        <td>1</td>
                        <td>3</td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Pengobatan</td>
                        <td>1</td>
                        <td>3</td>
                        <td>3</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Rujukan</td>
                        <td>1</td>
                        <td>3</td>
                        <td>2</td>
                        <td>2</td>
                    </tr>
                </tbody>
            </table>
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