<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center mb-3">


  <div class="row justify-content-center align-items-center mt-3">
    <div class="col-auto border border-dark rounded p-4">
      <h3 class="text-center mt-2">
        Round 3 - Dino Puzzle
      </h3>
      <p><b>Task:</b>
        Solve the given puzzle to obtain the keyword.
        <br>
        Enter the keyword below and submit.
      </p>
    </div>
  </div>

  <div class="row my-3">
    <div class="col">
      <div id="puzzle">
      </div>
    </div>
    <div class="col">
      <img src="/assets/dino.jpg" alt="none"  width="450px" height="450px">
    </div>
  </div>

  <div class="row justify-content-center align-items-center mt-3">
    <div class="col-auto border border-dark rounded p-4">
      <?php if (isset($validation)) : ?>
        <div class="row">
          <div class="text-danger">
            <?= $validation->listErrors() ?>
          </div>
        </div>
      <?php endif ?>


      <form action="/user" method="post" id="keyForm" onsubmit="return submitForm()">
        <div class="row align-items-center">
          <div class="col">
            <div class="form-floating">
              <input name="key" type="text" class="form-control" id="key" placeholder="Answer">
              <label for="key">Keyword</label>
            </div>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-dark">Submit</button>
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
<script src="/assets/js/PicturePuzzle.js"></script>
<script src="/assets/js/isSolvable.js"></script>
<?= $this->endSection() ?>