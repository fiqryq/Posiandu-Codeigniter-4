<?= $this->extend('kader/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- content -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<!-- content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambahmodal" data-whatever="@mdo">
            <i class="fas fa-plus fa-sm text-white-50">
            </i>Tambah Jadwal</button>
    </div>

    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Jadwal Posyandu</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Senin</td>
                        <td>11/12/2020</td>
                        <td>14:00 - 15:00</td>
                        <td>
                            <a href="" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editmodal" data-whatever="@mdo">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapusmodal" data-whatever="@mdo">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Selasa</td>
                        <td>11/12/2020</td>
                        <td>14:00 - 15:00</td>
                        <td>
                            <a href="" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editmodal" data-whatever="@mdo">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapusmodal" data-whatever="@mdo">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Rabu</td>
                        <td>11/12/2020</td>
                        <td>14:00 - 15:00</td>
                        <td>
                            <a href="" class="btn btn-success btn-circle" data-toggle="modal" data-target="#editmodal" data-whatever="@mdo">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#hapusmodal" data-whatever="@mdo">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- Edit Modal -->
            <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Buka & Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Content -->
                            <form action="/bidan/addpenyuluhan" action="POST">
                                <div class="form-group">
                                    <label for="kegiatan" class="col-form-label">Nama kegiatan</label>
                                    <input type="text" id="kegiatan" class="form-control" name="kegiatan">
                                </div>
                                    <div class="form-group">
                                        <label for="tanggal" class="col-form-label">Tanggal kegiatan</label>
                                            <div class="input-group date" data-provide="datepicker">
                                                <input type="text" class="form-control" name="date">
                                                    <div class="input-group-addon">
                                                        <span class="glyphicon glyphicon-th"></span>
                                                    </div>
                                            </div>
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