<?= $this->extend('layout_antrian/template') ?>
<?= $this->section('content') ?>
<?php $i = 1; ?>
<div class="row bg-danger min-vh-100 w-100">
  <div class="col-md-3 bg-primary">
    <h1>kurs</h1>
  </div>
  <div class="bg-success col-md-6">
    <div class="row bg-warning h-50">
      <h1>Video</h1>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h1>Giro</h1>
      </div>
      <div class="col-md-6">
        <h1>Suku</h1>
      </div>
    </div>
  </div>
  <div class="col-md-3 bg-light">
    <h1 class="text-center mt-3">List antrian</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nomor Antrian</th>
          <th scope="col">Tujuan</th>
          <th scope="col">Counter</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($dipanggil as $nasabah) :  ?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= $nasabah["nomor_antrian"] ?></td>
            <td><?= $nasabah["tujuan"] ?></td>
            <td><?= $random_number ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection(); ?>