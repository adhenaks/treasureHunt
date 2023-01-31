<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center mb-3">
  
  <div class="row justify-content-center align-items-center mt-3">

    <div class="col-auto border border-dark rounded p-4">
      <div class="row mb-2">
        <h3>Participants' Details</h3>
      </div>
      <div class="row">
        <p>Participant 1: <?= ucwords($userDetails['p1']) ?></p>
      </div>
      <div class="row">
        <p>Participant 2: <?= ucwords($userDetails['p2']) ?></p>
      </div>
    </div>
  </div>
  <div class="row justify-content-center align-items-center mt-3">
    <div class="col-auto border border-dark rounded p-2">
        <h3 class="text-center">Welcome to the Online Treasure Hunt</h3>
        <p>
          <i>
            This is an online game that consists of 5 rounds. Each round you will be given certain instructions. You as a team has to complete the tasks given in the instructions to obtain a key. This key can be entered in a box given below the instructions to complete the round and move onto the next round. You will find the treasure when you enter the key for the 5<sup>th</sup> and final round.
          </i>
        </p>
        <h5><b>Rules</b></h5>
        <ul>
          <li>You have 30 minutes to complete the Treasure Hunt.</li>
          <li>The first and second teams to complete the treasure hunt will be declared as the winner and runners up respectively.</li>
          <li>Incase the teams aren't able to finish the Treasure Hunt in the provided time, the winner and runners up will be decided based on the rounds completed and the time taken to complete rounds.</li>
          <li>External gadgets and articles such as pen and pencil are not allowed.</li>
          <li>Use of developer tools or searching the web for answers is not allowed.</li>
          <li>Sharing answers or discussion with other teams is not allowed.</li>
          <li>If any member of any team fails to follow the rules, the entire team will be disqualified.</li>
        </ul>
      </div>
    </div>
</div>
<?= $this->endSection() ?>