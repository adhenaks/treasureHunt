<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center mb-3">
  <div class="row">
    <?php if (session()->get('roundPassed')) : ?>
      <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <p class="text-center">
          Round Passed
        </p>
      </div>
    <?php endif ?>
  </div>
  <div class="row mt-3 justify-content-center">
    <div class="col-6 border border-dark">
      <h3 class="text-center">
        Round 1
      </h3>
      <p><b>Task:</b>
        Find the correct spelling of the given word.
      <ul>
        When you click on the correct spelling a popup box will appear that contains a key. You have to enter the key below and submit.
      </ul>
      </p>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-auto">
      <div class="row justify-content-center border border-dark p-5 mt-3" style="gap:2px;">
        <?php for ($j = 0; $j < 12; $j++) : ?>
          <div class="col-auto p-0">
            <div class="d-flex flex-column">
              <?php for ($k = 0; $k < 18; $k++) : ?>
                <div class="col-auto key" style="line-height: 13px; cursor:pointer">
                  <img class="m-0 p-0" src="/assets/<?= $j == 7 && $k == 11 ? "tomorrow" : "tomrorow" ?>.png" width="50px" height="21px" alt="tommorrow" data-value="<?php echo $j . $k ?>">
                </div>
              <?php endfor ?>
            </div>
          </div>
        <?php endfor ?>
      </div>
    </div>
  </div>


  <div class="row justify-content-center mt-3">
    <div class="col-auto border border-dark p-3">

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

  document.querySelectorAll('.key').forEach((div) => {
    div.addEventListener('click', (e) => {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          alert(this.responseText.split('\n')[0]);
        }
      };
      xmlhttp.open("GET", "/key?q=" + e.target.dataset.value, true);
      xmlhttp.send();
      // document.getElementById()();
    })
  })
</script>
<?= $this->endSection() ?>