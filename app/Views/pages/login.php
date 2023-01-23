<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center" style="height: calc(100vh - 59px);">
<div class="row justify-content-center align-items-center" style="height:100%">

<div class="col-6 border border-dark rounded p-4">
    <h3 class="text-center">Login</h3>
    <form action="" method="post">
    <div class="form-floating mb-3">
  <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name">
  <label for="floatingInput">Username</label>
</div>
<div class="form-floating mb-3">
  <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
  <label for="floatingPassword">Password</label>
</div>

<div class="row justify-content-center">
            <div class="col-auto">
                <button type="submit" class="btn btn-dark">Login</button>
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