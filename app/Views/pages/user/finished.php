<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mb-3" style="min-height:80vh">
<div class="row align-items-center" style="height: 80vh;">
<div class="col">
  <h2 class="text-center autumn" style="font-size: 64px;">Treasure Hunt Completed</h2>
  <h2 class="text-center autumn" style="font-size: 48px;">Congratulations!!!</h2>
  <h2 class="text-center autumn" style="font-size: 36px;">You have finished <?php
  switch($pos)
  {
    case 1:
      echo "<span style='font-family: \'Times New Roman\', Times, serif;'>1</span><sup>st</sup>";
    break;
      case 2:
      echo "<span style='font-family: \'Times New Roman\', Times, serif;'>2</span><sup>nd</sup>";
      break;
default:
        echo "at position: <span style='font-family: \'Times New Roman\', Times, serif;'>$pos</span>";

  }
  ?></h2>
  
</div>
</div>

</div>

<?= $this->endSection() ?>