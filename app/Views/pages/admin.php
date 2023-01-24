<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center" style="height: calc(100vh - 59px);">
<div class="d-flex  flex-column" style="height:100%">
<div class="row justify-content-center">
  <div class="col-auto bg-dark p-3 rounded m-3 text-white">
  <a href="/admin/register" class="nav-link">
    Register User
  </a>  
  </div>
</div>
<div class="col" style="height:100%">
<?php //echo var_dump($userDetails);
$i=1;?>
<table class="table table-bordered">
<thead>
    <tr>
      <th scope="col">S.No.</th>
      <th scope="col">Username</th>
      <th scope="col">Participant 1</th>
      <th scope="col">Participant 2</th>
      <th scope="col">Level</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach($userDetails as $user):?>
    <tr>
      <td>
        <?= $i++?>
      </td>
      <td>
        <?= $user['uname']?>
      </td>
      <td>
        <?= $user['p1']?>
      </td>
      <td>
        <?= $user['p2']?>
      </td>
      <td>
        <?= $user['level']?>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>

</table>
</div>
</div>
<?= $this->endSection() ?>