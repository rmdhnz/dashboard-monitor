<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $itr = 1; ?>
<h1 class="mt-4"><?= $title ?></h1>
<!-- <ol class="breadcrumb mb-4">
  <li class="breadcrumb-item active"><?= $title ?></li>
</ol> -->
<a href="<?= url_to('tambah-akun') ?>" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i>Tambah Akun</a>
<div class="card mb-4">
  <div class="card-header">
    <i class="fas fa-table me-1"></i>

  </div>
  <div class="card-body">
    <table id="datatablesSimple">
      <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Email</th>
          <th>Role</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
      <tbody>
        <?php foreach ($data_akun as $akun) :  ?>
          <tr>
            <td><?= $itr++ ?></td>
            <td><?= $akun["username"] ?></td>
            <td><?= $akun["email"] ?></td>
            <td><?= $akun['role'] ?></td>
            <td>
              <a href="/edit" class="btn btn-primary">
                <i class="fas fa-pen"></i>
                Edit
              </a>
              <form action="" method="post" class="d-inline">
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