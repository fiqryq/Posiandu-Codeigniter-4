<?= $this->extend('kader/themplates/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

<!-- content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Laporan bulanan</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <table id="laporan" class="display" style="width:100%">
                <thead>
                    <tr id="filters">
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Berat</th>
                        <th>Tinggi</th>
                        <th>Lingkar Badan</th>
                        <th>Lingkar Kepala</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach($laporan as $key) : ?>
                    <?php 
                            $oridate = $key['tanggal_kegiatan'];
                            $timestamp = strtotime($oridate);
                            $month = date('M',$timestamp);

                            if ($month == "Jan") {
                                $month = "Januari";
                            } else if ($month == "Feb") {
                                $month = "Februari";
                            } else if ($month == "Mar") {
                                $month = "Maret";
                            } else if ($month == "Apr") {
                                $month = "April";
                            } else if ($month == "May") {
                                $month = "Mei";
                            } else if ($month == "Jun") {
                                $month = "Juni";
                            } else if ($month == "Jul") {
                                $month = "Juli";
                            } else if ($month == "Aug") {
                                $month = "Agustus";
                            } else if ($month == "Sep") {
                                $month = "September";
                            } else if ($month == "Oct") {
                                $month = "Oktober";
                            } else if ($month == "Nov") {
                                $month = "November";
                            } else if ($month == "Dec") {
                                $month = "Desember";
                            }
                        ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $key['jenis_kegiatan']; ?></td>
                        <td><?= $month ?></td>
                        <td><?= $key['tanggal_kegiatan']; ?></td>
                        <td><?= $key['nama_anak']; ?></td>
                        <td><?= $key['berat']; ?> kg</td>
                        <td><?= $key['tinggi']; ?> cm</td>
                        <td><?= $key['lingkarbadan']; ?> cm</td>
                        <td><?= $key['lingkarkepala']; ?> cm</td>
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
<!-- Data tables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>


<script>
$('#laporan').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'pdf'
    ],
    initComplete: function() {
        this.api().columns().every(function() {
            var column = this;
            if (column.index() == 0) {
                input = $('<input type="text" placeholder="cari nomor"/ hidden>').appendTo($(column
                    .header())).on(
                    'keyup change',
                    function() {
                        if (column.search() !== this.value) {
                            column.search(this.value)
                                .draw();
                        }
                    });
                return;
            }

            var select = $('<select><option value="">Filter Data</option></select>')
                .appendTo($("#filters").find("th").eq(column.index()))
                .on('change', function() {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val());

                    column.search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });

            console.log(select);
            column.data().unique().sort().each(function(d, j) {
                select.append('<option value="' + d + '">' + d + '</option>')
            });
        });
    }
});
</script>

<!-- end content -->
<?= $this->endSection(); ?>