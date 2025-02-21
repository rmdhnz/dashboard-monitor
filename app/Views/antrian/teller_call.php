<?= $this->extend('layout_antrian/template') ?>
<?= $this->section('content') ?>
<h1>Teller Service</h1>
<h3>Sisa Antrian : <?= $jumlah_antrian ?></h3>
<div class="container">
  <div class="row mb-3">
    <?php if (session()->getFlashdata('attention')) :  ?>
      <div class="alert text-center alert-primary" role="alert">
        <?= session()->getFlashdata('attention') ?>
      </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) :  ?>
      <div class="alert text-center alert-danger" role="alert">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4 mb-3">
      <div class="card">
        <img src="/assets/img/bri-logo.png" class="card-img-top" alt="...">
        <div class="card-body">
          <form action="<?= site_url("/antrian/antrian_call_update") ?>" method="post">
            <div class="d-grid gap-2">
              <?= csrf_field(); ?>
              <input type="hidden" name="jenis" value="call">
              <input type="hidden" class="form-control" name="tujuan_call" value="teller">
              <button class="btn btn-primary" type="submit" <?php if ($jumlah_antrian == 0) echo "disabled" ?>>Call</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-2 mb-3">
      <form action="<?= site_url('antrian/antrian_call_update') ?>" method="post">
        <div class="d-grid gap-2">
          <?= csrf_field(); ?>
          <input type="hidden" name="jenis" value="dilayani">
          <input type="hidden" class="form-control" name="tujuan_call" value="teller">
          <button class="btn btn-success" type="submit" <?php if ($dipanggil == 0) echo "disabled" ?>>Dilayani</button>
        </div>
      </form>
    </div>
    <div class="col-md-2 mb-3">
      <form action="<?= site_url('antrian/antrian_call_update') ?>" method="post">
        <div class="d-grid gap-2">
          <?= csrf_field(); ?>
          <input type="hidden" name="jenis" value="dilewati">
          <input type="hidden" class="form-control" name="tujuan_call" value="teller">
          <button class="btn btn-danger" type="submit" <?php if ($dipanggil == 0) echo "disabled" ?>>Dilewati</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>