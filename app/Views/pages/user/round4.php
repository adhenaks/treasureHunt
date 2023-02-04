<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center mb-3">


  <div class="row justify-content-center align-items-center mt-3">
    <div class="col-6 border border-dark rounded p-4 bg-light bg-opacity-75">
      <h2 class="text-center mt-2 autumn">
        Round <span style="font-family: 'Times New Roman', Times, serif;">4</span> - Mind Games
      </h2>
      <p class="mb-0"><b>Task:</b>
        Click this <a href="/assets/order.rar" target="__blank" download>link</a> and download the compressed rar file.
        <br>
        The file is password protected and the hint for password is given below.
        <br>
        Your task is to unzip the file(using Winrar) and get the key given in <b>key.txt</b> file and submit below.
        <br>
        <br>
        <b>Note:</b> The file may contain additional compressed rar files which are password protected. The passwords hints are given in <b>hint.txt</b>. The final key will be available only after unlocking all files.
        <br>
        <br>
        <span>
          <b>Hint</b>: Solve the below riddle to obtain the password:<br>
          A,B,C,D and E started having lunch together. B finished before A but after E. D finished before B but after C. C finished before E. What is the order in which they all finished?
        </span>
      </p>
      <p style="color:#dc3545">
        <b>Caution</b>: You are entering a world of dwarf letters!!!
      </p>

    </div>
  </div>


    <div class="row justify-content-center align-items-center mt-3">
      <div class="col-auto border border-dark rounded p-4 bg-light bg-opacity-25">
        <?php if (isset($validation)) : ?>
          <div class="row">
            <div class="text-danger">
              <?= $validation->listErrors() ?>
            </div>
          </div>
        <?php endif ?>


        <form action="/user" method="post" id="keyForm" onsubmit="return submitForm()">
          <div class="row align-items-center">
          <div class="col position-relative">
          <img src="/assets/eye-slash.svg" class="key-eye">
              <div class="form-floating">
                <input name="key" type="password" class="form-control bg-light bg-opacity-75" id="key" placeholder="Answer">
                <label for="key">Keyword</label>
              </div>
            </div>
            <div class="col-auto">
              <button type="submit" class="animation-button">Submit</button>
            </div>
          </div>
        </form>


      </div>
    </div>
  </div>

  <script>
    function submitForm() {
      document.getElementById('key').value = document.getElementById('key').value.toLowerCase();
      return true;
    }
  </script>
  <?= $this->endSection() ?>