<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center mb-3">
  <div class="row mt-3 justify-content-center">
    <div class="col-6 border border-dark">
      <h3 class="text-center mt-2">
        Round 1 - Find the Word
      </h3>
      <p><b>Task:</b>
        Go to this <a href="https://unbounce.com/landing-page-articles/what-is-a-landing-page/" target="__blank">link</a> and find the word that corresponds to the clue given below.
        <br>
        Submit the word below to move to the next round.
        <br>
        <span>
          <b>Clue</b>: Rhymes with paper, related to money, also has something that we do on a computer.
            <br>
            <b>Hint</b>: The required word is styled different from normal text.
        </span>
      </p>
    </div>
  </div>


  <div class="row justify-content-center mt-3">
    <div class="col-auto border border-dark p-3">
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