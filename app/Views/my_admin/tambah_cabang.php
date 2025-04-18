<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="mt-4"><?= $title ?></h1>
<div class="row">
  <div class="col-md-6">
    <?php if (session()->getFlashdata('success')) :  ?>
      <div class="alert alert-success" role="alert" id="my-alert-tambah-cabang">
        <?= session()->getFlashdata('success') ?>
      </div>
    <?php endif ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <form action="<?= route_to('save_cabang') ?>" method="post">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nama Cabang</label>
        <input value="<?= old('nama_cabang') ?>" autofocus autocomplete="off" type="text" name="nama_cabang" class="form-control <?php if (session()->getFlashdata('error')) echo "is-invalid" ?>" id="exampleFormControlInput1">
        <div id="validationServer03Feedback" class="invalid-feedback">
          <?php
          if (isset(session()->getFlashdata('error')['nama_cabang'])) echo session()->getFlashdata('error')['nama_cabang'];
          ?>
        </div>
      </div>
      <div class="mb-3">
        <button class="btn btn-primary" type="submit">Tambah</button>
        <a href="<?= site_url('cabang') ?>" class="btn btn-danger">Kembali</a>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>