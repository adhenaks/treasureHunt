<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
  .grid-container {
  display: grid;
  width: 600px;
  grid-template-columns: auto auto auto;
  gap: 10px;
  padding:5px;
}
.grid-container  > div{
  border: solid black 1px;
}
</style>
<div class="container align-items-center justify-content -center mb-3">
  <div class="grid-container mt-2" style="background: white;">
  <?php
  $ar=array(
    0=>1,
    1=>2,
    2=>3,
    3=>4,
    4=>5,
    5=>6,
    6=>7,
    7=>8,
  );
  shuffle($ar);
  foreach( $ar as $val):
  ?>
  <div>
    <img src="/assets/dino_cutouts/part<?=$val ?>.jpg" alt="" height="100%" width="100%">
  </div>
  <?php endforeach ?>
  </div>
</div>
<?= $this->endSection() ?>