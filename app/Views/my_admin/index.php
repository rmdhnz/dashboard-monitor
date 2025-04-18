<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>
<?php $itr = 1; ?>
<div class="container mt-5 shadow">
  <div class="row justify-content-center bg-light dashboard-admin rounded-2">
    <div class="col-md-6">
      <h1 class="text-center">Halo <?= user()->username ?> 👋</h1>
      <p class="text-center">Kelola sistem dengan bijak dan tetap semangat! 🚀</p>
    </div>
  </div>
</div>
<?= $this->endSection() ?>