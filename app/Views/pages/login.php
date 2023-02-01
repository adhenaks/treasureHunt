<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center" style="height: calc(100vh - 102.4px);">
<div class="row justify-content-center align-items-center" style="height:100%">

<div class="col-6  p-4">
    <form action="" method="post">
    <div class="form-floating mb-3">
  <input type="text" name="username" class="form-control bg-light bg-opacity-25 handwriting" id="floatingInput" placeholder="name">
  <label class="autumn" for="floatingInput">Username</label>
</div>
<div class="form-floating mb-3">
  <input type="password" class="form-control bg-light bg-opacity-25" id="floatingPassword" name="password" placeholder="Password">
  <label class="autumn" for="floatingPassword">Password</label>
</div>

<div class="row justify-content-center">
            <div class="col-2">

                <button type="submit" class="animation-button autumn">Login</button>
            </div>
    </form>
    <?php if(isset($validation)): ?>
            <div class="text-danger">
                <?= $validation->listErrors() ?>
            </div>
            <?php endif ?>
            
</div>
</div>
</div>
<?= $this->endSection() ?>