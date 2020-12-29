<?= $this->extend('user/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- Page Content -->
<div class="container">

    <?php foreach ($artikel as $key => $row) : ?>
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg">
                <!-- Title -->
                <h1 class="mt-4"> <?= $row->judul ?> </h1>
                <!-- Author -->
                <p class="lead">
                    penulis
                    <a class="text-primary"><?= $row->penulis; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>Di posting pada tanggal <?= $row->created_at; ?> </p>

                <hr>

                <!-- Preview Image -->
                <img class="card-img-top" src="<?= base_url() ?>/img/artikel.jpg" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?= $row->body; ?></p>

                <hr>

            </div>

        </div>
        <!-- /.row -->
    <?php endforeach; ?>
</div>
<!-- /.container -->
<?= $this->endSection(); ?>