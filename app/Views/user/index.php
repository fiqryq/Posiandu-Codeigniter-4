<?= $this->extend('user/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- content -->
<div class="container-fluid">
    <div class="card shadow mb-4 mb-6">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Artikel</h6>
        </div>
        <div class="card-body">
            <!-- start form -->
            <div class="list-group">
                <?php foreach ($artikel as $key) : ?>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?= $key['judul']; ?></h5>
                            <small><?= $key['created_at']; ?></small>
                        </div>
                        <p class="mb-1"><?= $key['body']; ?></p>
                        <small><?= $key['penulis']; ?></small>
                    </a>
                <?php endforeach; ?>
            </div>
            <!-- end form -->
        </div>
    </div>
</div>
<!-- end content -->
<?= $this->endSection(); ?>