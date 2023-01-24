<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center" style="height: calc(100vh - 59px);">
<div class="row justify-content-center align-items-center" style="height:100%">

<div class="col-auto border border-dark rounded p-4">
<?php if(session()->get('regSuccess')):?>
        <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p class="text-center">
                    Registration Successful
                </p>
        </div>
        <?php endif?>
    <h3 class="text-center">Register User</h3>
    <form action="adminpanel" method="post">
    <div class="form-floating mb-3">
  <input type="text" name="user1" class="form-control" id="p1" placeholder="name">
  <label for="p1">Participant 1</label>
</div>
    <div class="form-floating mb-3">
  <input type="text" name="user2" class="form-control" id="p2" placeholder="name">
  <label for="p2">Participant 2</label>
</div>
    <div class="form-floating mb-3">
  <input type="text" name="phone" class="form-control" id="phone" placeholder="name">
  <label for="phone">Phone Number</label>
</div>
  

<div class="row justify-content-center">
            <div class="col-auto">
                <button type="submit" class="btn btn-dark">Register</button>
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