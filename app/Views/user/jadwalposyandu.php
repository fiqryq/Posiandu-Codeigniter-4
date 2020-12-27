<?= $this->extend('user/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- content -->

<div class="container-fluid">
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Jadwal Posyandu</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Hari</th>
                        <th scope="col">Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Senin</th>
                        <td>14:00 - 15:00</td>
                    </tr>
                    <tr>
                        <th scope="row">Selasa</th>
                        <td class="bg-dark text-white">Tutup</td>
                    </tr>
                    <tr>
                        <th scope="row">Rabu</th>
                        <td class="bg-dark text-white">Tutup</td>
                    </tr>
                    <tr>
                        <th scope="row">Kamis</th>
                        <td class="bg-dark text-white">Tutup</td>
                    </tr>
                    <tr>
                        <th scope="row">Jumat</th>
                        <td class="bg-dark text-white">Tutup</td>
                    </tr>
                    <tr>
                        <th scope="row">Sabtu</th>
                        <td class="bg-dark text-white">Tutup</td>
                    </tr>
                    <tr>
                        <th scope="row">Minggu</th>
                        <td class="bg-dark text-white">Tutup</td>
                    </tr>
                </tbody>
            </table>
            <!-- end form -->
        </div>
    </div>
</div>

<!-- end content -->
<?= $this->endSection(); ?>