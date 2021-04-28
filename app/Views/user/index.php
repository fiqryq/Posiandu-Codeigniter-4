<?= $this->extend('user/themplates/index'); ?>
<?= $this->section('content'); ?>
<!-- content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Artikel Panduan Posiandu</h1>
    </div>

    <!-- Content -->
    <div class="row">
        <?php foreach ($artikel as $key) : ?>
        <?php $slug = $key['judul'] ?>
        <?php $id = $key['id'] ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?= base_url() ?>/img/<?= $key['gambar']; ?>" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="<?= base_url('user/detailarticle/' . $id); ?>"><?= $key['judul']; ?></a>
                    </h4>
                    <h6 class="text-dark">penulis : <?= $key['penulis']; ?></h6>
                    <p class="card-text" style="width: 250px;  
                        white-space: nowrap;     
                        overflow: hidden;                    
                        text-overflow: ellipsis;">
                        <?= $key['body']; ?>
                    </p>
                </div>

                <div class="card-footer">
                    <small class="text-muted">
                        Di posting pada tanggal <?= $key['created_at']; ?>
                    </small>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <!-- <nav aria-label="...">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link active" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav> -->
</div>

<!-- end content -->
<?= $this->endSection(); ?>