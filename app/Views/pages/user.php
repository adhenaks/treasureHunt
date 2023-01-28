<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center">
  <div class="row justify-content-center align-items-center mt-3">

    <div class="col-auto border border-dark rounded p-4">
      <?php
      // var_dump($userDetails)
      ?>
      <h3>Participants' Details</h3>
      <div class="col">
        <p>Participant 1: <?=ucwords($userDetails['p1'])?></p>
        <p>Participant 2: <?=ucwords($userDetails['p2'])?></p>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>