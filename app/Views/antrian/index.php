<?= $this->extend('layout_antrian/template') ?>
<?= $this->section('content') ?>
<h1 class="text-center mb-3">Selamat Datang di BRI</h1>
<div class="container">
  <div class="row mb-3">
    <?php if (session()->getFlashdata('success')) :  ?>
      <div class="alert text-center alert-primary" role="alert">
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif ?>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/assets/img/bri-logo.png" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Teller</h5>
              <form action="<?= site_url('/antrian/antrian_save') ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" class="form-control" name="tujuan" value="teller">
                <div class="d-grid gap-2">
                  <button class="btn btn-primary" type="submit">Click</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md mb-3">
      <div class="card mb-3">
        <div class="row g-0 ">
          <div class="col-md-4 h-100">
            <img src="/assets/img/bri-logo.png" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8 d-block h-100">
            <div class="card-body d-flex justify-content-beetween flex-column">
              <h5 class="card-title">Customer Service</h5>
              <form action="<?= site_url('/antrian/antrian_save') ?>" method="post">
                <div class="d-grid gap-2">
                  <?= csrf_field(); ?>
                  <input type="hidden" class="form-control" name="tujuan" value="CS">
                  <button class="btn btn-primary" type="submit">Click</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>