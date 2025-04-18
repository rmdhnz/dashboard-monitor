<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $itr = 1; ?>
<?php if (session()->getFlashdata('success')) :  ?>
  <div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>
<h1 class="mt-4"><?= $title ?></h1>
<!-- <ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active"><?= $title ?></li>
</ol> -->
<a href="<?= url_to('tambah-cabang') ?>" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i>Tambah Cabang</a>
<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table me-1"></i>
  </div>
  <div class="card-body">
    <table id="datatablesSimple">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Cabang</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama Cabang</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($data_cabangs as $cabang) :  ?>
          <tr>
            <td><?= $itr++ ?></td>
            <td><?= $cabang["nama_cabang"] ?></td>
            <td>
              <a href="/edit/<?= $cabang['cabang_id'] ?>" class="btn btn-primary">
                <i class="fas fa-pen"></i>
                Edit
              </a>
              <form action="/delete/<?= $cabang['cabang_id'] ?>" method="post" class="d-inline">
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="btn btn-danger">
                  <i class="fas fa-trash"></i>
                  Hapus
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>