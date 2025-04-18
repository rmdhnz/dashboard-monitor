<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $itr = 1; ?>
<h1 class="mt-4"><?= $title ?></h1>
<!-- <ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active"><?= $title ?></li>
</ol> -->
<div class="card mb-4">
  <div class="card-header">
    <div class="dropdown">
      <i class="fas fa-table me-1"></i>
      <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Pilih Cabang
      </button>
      <ul class="dropdown-menu">
        <?php foreach ($data_cabang as $cabang) :  ?>
          <li><a class="dropdown-item" href="#"><?= $cabang['nama_cabang'] ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <div class="card-body">
    <table id="datatablesSimple">
      <thead>
        <tr>
          <th>No</th>
          <th>Nomor Antrian</th>
          <th>Tujuan</th>
          <th>Timestamp</th>
          <th>Status</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Nomor Antrian</th>
          <th>Tujuan</th>
          <th>Timestamp</th>
          <th>Status</th>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($data_antrian as $antrian) :  ?>
          <tr>
            <td><?= $itr++ ?></td>
            <td><?= $antrian["nomor_antrian"] ?></td>
            <td><?= $antrian["tujuan"] ?></td>
            <td><?= $antrian['timestamp'] ?></td>
            <td>
              <span class="badge text-bg-<?= ($antrian['status'] == 'dilayani' ? "primary" : "danger") ?>"> <i class="fas fa-<?= $antrian['status'] == 'dilayani' ? 'check' : 'times' ?>"></i> <?= $antrian["status"] ?></span>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>