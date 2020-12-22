<?= $this->extend('bidan/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- content -->
<div class="container-fluid">
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Artikel</h6>
        </div>
        <div class="card-body">
            <!-- Flash Data -->
            <?php
            if (!empty(session()->getFlashdata('berhasil'))) { ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('berhasil') ?>
                </div>
            <?php } ?>
            <!-- End Flash Data -->

            <!-- start form -->
            <form action="/bidan/createarticle" method="POST">
                <div class="form-group">
                    <label for="Judul Artikel">Judul Artikel</label>
                    <input name="judul" type="text" class="form-control" id="judul" autofocus placeholder="masukan judul artikel">
                </div>
                <div class="form-group">
                    <label for="isiartikel">Artikel</label>
                    <textarea name="isiartikel" class="form-control" id="isiartikel" rows="3" placeholder="masukan isi artikel"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit Artikel</button>
            </form>
            <!-- end form -->
        </div>
    </div>
</div>
<!-- end content -->
<?= $this->endSection(); ?>