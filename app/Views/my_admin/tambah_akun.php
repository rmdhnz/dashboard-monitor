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
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input value="<?= old('email') ?>" autofocus autocomplete="off" type="email" name="email" class="form-control <?php if (session()->getFlashdata('error')) echo "is-invalid" ?>" id="exampleFormControlInput1">
        <div id="validationServer03Feedback" class="invalid-feedback">
          <?php
          if (isset(session()->getFlashdata('error')['email'])) echo session()->getFlashdata('error')['email'];
          ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">username</label>
        <input value="<?= old('username') ?>" autofocus autocomplete="off" type="text" name="username" class="form-control <?php if (session()->getFlashdata('error')) echo "is-invalid" ?>" id="exampleFormControlInput1">
        <div id="validationServer03Feedback" class="invalid-feedback">
          <?php
          if (isset(session()->getFlashdata('error')['username'])) echo session()->getFlashdata('error')['username'];
          ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input value="<?= old('password') ?>" autofocus autocomplete="off" type="password" name="password" class="form-control <?php if (session()->getFlashdata('error')) echo "is-invalid" ?>" id="exampleFormControlInput1">
        <div id="validationServer03Feedback" class="invalid-feedback">
          <?php
          if (isset(session()->getFlashdata('error')['password'])) echo session()->getFlashdata('error')['password'];
          ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Repeat Password</label>
        <input value="<?= old('repeat_password') ?>" autofocus autocomplete="off" type="repeat_password" name="repeat_password" class="form-control <?php if (session()->getFlashdata('error')) echo "is-invalid" ?>" id="exampleFormControlInput1">
        <div id="validationServer03Feedback" class="invalid-feedback">
          <?php
          if (isset(session()->getFlashdata('error')['repeat_password'])) echo session()->getFlashdata('error')['repeat_password'];
          ?>
        </div>
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Role</label>
        <select class="form-select" aria-label="Default select example">
          <option selected>Open this select menu</option>
          <?php foreach ($data_akun as $akun) :  ?>
            <option value="1"><?= $akun['role'] ?></option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="mb-3">
        <button class="btn btn-primary" type="submit">Tambah</button>
        <a href="<?= site_url('akun') ?>" class="btn btn-danger">Kembali</a>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>