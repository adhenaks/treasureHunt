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
      <?php 
      $flag=0;
      foreach($userDetails as $user)
      if($user['level']==0)
      $flag++;
       if($flag>0): ?>
      <div class="col-auto bg-dark rounded m-3">
        <form action="/admin" method="post" onsubmit="return confirm('Are you sure you want to start?')">
        <input class="bg-dark border-0 text-white p-3" name="submit" type="submit" value="Start Treasure Hunt">
        </form>
      </div>
      <?php 
    endif 
      ?>
      <div class="col-auto bg-dark p-3 rounded m-3 text-white">
        <a href="/logout" class="nav-link">
          Logout
        </a>
      </div>
    </div>
    <div class="col" style="height:100%">
      <?php //echo var_dump(json_decode($userDetails[0]['level_timings'],true));
      $i = 1; ?>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" rowspan="2">S.No.</th>
            <th scope="col" rowspan="2">Username</th>
            <th scope="col" rowspan="2">Participant 1</th>
            <th scope="col" rowspan="2">Participant 2</th>
            <th scope="col" colspan="5" class="text-center">Level Finish Timings</th>
          </tr>
          <tr>
            <th>Level 1</th>
            <th>Level 2</th>
            <th>Level 3</th>
            <th>Level 4</th>
            <th>Level 5</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($userDetails as $user) : ?>
            <tr>
              <td>
                <?= $i++ ?>
              </td>
              <td>
                <?= $user['uname'] ?>
              </td>
              <td>
                <?= $user['p1'] ?>
              </td>
              <td>
                <?= $user['p2'] ?>
              </td>
              <td><?= $user['l1']==null?'-':$user['l1']?></td>
              <td><?= $user['l2']==null?'-':$user['l2']?></td>
              <td><?= $user['l3']==null?'-':$user['l3']?></td>
              <td><?= $user['l4']==null?'-':$user['l4']?></td>
              <td><?= $user['l5']==null?'-':$user['l5']?></td>
            </tr>
          <?php endforeach ?>
        </tbody>

      </table>
    </div>
  </div>
  <?= $this->endSection() ?>