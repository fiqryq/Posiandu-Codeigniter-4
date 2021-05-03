<?= $this->extend('user/themplates/index'); ?>
<?= $this->section('content'); ?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<!-- content -->
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-7 col-xl-12">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Grafis Perkembangan Anak</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                            <?php
                            //Inisialisasi nilai variabel awal
                            $nama = "";
                            $berat = "";
                            $tinggi ="";
                            $lingkarkepala ="";
                            $lingkarbadan ="";
                            $tanggal = "";
                            foreach ($detail as $key)
                            {
                                $nama = $key['nama_anak'];
                                $berat = $key['berat'];
                                $tinggi = $key['tinggi'];
                                $lingkarbadan = $key['lingkarbadan'];
                                $lingkarkepala = $key['lingkarkepala'];
                                $tanggal = $key['tanggal_posiandu'];
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4 mb-6">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-dark">Perkembangan anak</h6>
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
                        <th>Tinggi Badan</th>
                        <th>Lingkar Badan</th>
                        <th>Lingkar Kepala</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($detail as $key) :
                        $i = 1;
                        ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $key['nama_anak']; ?></td>
                        <td><?= $key['berat']; ?> KG</td>
                        <td><?= $key['tinggi']; ?> CM</td>
                        <td><?= $key['lingkarbadan']; ?> CM</td>
                        <td><?= $key['lingkarkepala']; ?> CM</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- end table -->
        </div>
    </div>
</div>
<!-- end content -->

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
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
</script>
<script>
$('#example').DataTable();
</script>

<script>
var config = {
    type: 'line',
    data: {
        datasets: [{
                label: 'Berat Badan',
                data: <?php echo json_encode($berat);?>,
                fill: "false",
                "borderColor": "rgb(75, 192, 192)",
                "lineTension": 0
            },
            {
                label: 'Tinggi Badan',
                data: <?php echo json_encode($tinggi);?>,
                fill: "false",
                "borderColor": "rgb(255, 0, 0)",
                "lineTension": 0
            },
            {
                label: 'Lingkar Badan',
                data: <?php echo json_encode($lingkarbadan);?>,
                fill: "false",
                "borderColor": "rgb(255, 255, 0)",
                "lineTension": 0
            },
            {
                label: 'Lingkar Kepala',
                data: <?php echo json_encode($lingkarkepala);?>,
                fill: "false",
                "borderColor": "rgb(255, 100, 0)",
                "lineTension": 0
            }
        ],
        labels: <?php 
            echo json_encode($tanggal);
        ?>
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: 'Grafik Perkembangan anak'
        }
    }
};

window.onload = function() {
    var ctx = document.getElementById("myChart").getContext("2d");
    window.myLine = new Chart(ctx, config);
};
</script>

<?= $this->endSection(); ?>